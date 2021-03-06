<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_limbah_keluar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_keluar');	
		$this->load->library('pustaka');
	}

	function index($unit_id) {
		$data['isi'] = "admin_limbah_keluar/index";
		$data['data']['unit_id'] = $unit_id;
		if ($this->input->get('triwulan') == null) {
			$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal(date('Y-m-d'));
			$data['data']['triwulan'] = $triwulan;
			$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($triwulan);	
		} else {
			$data['data']['triwulan'] = $this->input->get('triwulan');
			$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		}
		if ($this->input->get('tahun') == null) {
			$data['data']['tahun'] = date('Y');
		} else {
			$data['data']['tahun'] = $this->input->get('tahun');
		}
		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar($unit_id, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function semuasemua() {
		$data['isi'] = "admin_limbah_keluar/indexsemuasemua";
		if ($this->input->get('triwulan') == null) {
			$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal(date('Y-m-d'));
			$data['data']['triwulan'] = $triwulan;
			$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($triwulan);	
		} else {
			$data['data']['triwulan'] = $this->input->get('triwulan');
			$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		}
		if ($this->input->get('tahun') == null) {
			$data['data']['tahun'] = date('Y');
		} else {
			$data['data']['tahun'] = $this->input->get('tahun');
		}
		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar_semuasemua($data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}


	function export($id_unit) {
		$jumlah = 0;
		$unit = $this->db->get_where('unit', array('id' => $id_unit))->row()->unit;
		$data['data']['triwulan'] = $this->input->get('triwulan');
		$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		$data['data']['tahun'] = $this->input->get('tahun');

		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar($id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);

		switch ($data['data']['triwulan']) {
			case 1:
				$triwulan = 'I';
				break;
			
			case 2:
				$triwulan = 'II';
				break;
			
			case 3:
				$triwulan = 'III';
				break;
			
			case 4:
				$triwulan = 'IV';
				break;
			
			default:
				$triwulan = 'ERROR !!!';
				break;
		}

		$this->load->library('excel');
		
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		
		$this->excel->getActiveSheet()->setTitle('Sheet 1');

		foreach(range('A','C') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
		foreach(range('E','G') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
		
		$this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG KELUAR DARI TPS');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->setCellValue('A2', 'UNIT ' . strtoupper($unit));
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A2:G2');
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A3', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['data']['tahun']);
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(15);
		$this->excel->getActiveSheet()->mergeCells('A3:G3');
		$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->getStyle('A5:G5')->getFont()->setBold(true); 
		$this->excel->getActiveSheet()->setCellValue('A5', 'NO');
		$this->excel->getActiveSheet()->setCellValue('B5', 'TANGGAL KELUAR');
		$this->excel->getActiveSheet()->setCellValue('C5', 'LIMBAH');
		$this->excel->getActiveSheet()->setCellValue('D5', 'FOTO MANIFEST');
		$this->excel->getActiveSheet()->setCellValue('E5', 'JUMLAH (KG)');
		$this->excel->getActiveSheet()->setCellValue('F5', 'TUJUAN PENYERAHAN');
		$this->excel->getActiveSheet()->setCellValue('G5', 'NO DOKUMEN');

		$i = 1;
		$a = 6;
		$styleArray = array(
		      'borders' => array(
		          'allborders' => array(
		              'style' => PHPExcel_Style_Border::BORDER_THIN
		          )
		      )
		  );
		  $styleArrayBold = array(
		      'borders' => array(
		          'allborders' => array(
		              'style' => PHPExcel_Style_Border::BORDER_MEDIUM
		          )
		      )
		  );
		foreach ($data['data']['keluar'] as $item) {
			$this->excel->getActiveSheet()->getStyle('A' . $a . ':'. 'G' . $a)->applyFromArray($styleArray);
            $this->excel->getActiveSheet()->getStyle('A' . $a . ':' . 'G' . $a)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

			$this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
			$this->excel->getActiveSheet()->setCellValue('B' . $a, $this->pustaka->tanggal_indo_string($item->tanggal));
			$this->excel->getActiveSheet()->setCellValue('C' . $a, $item->limbah);
			
			if (file_exists('uploads/keluar/' . $item->id_keluar)) {
				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setPath('uploads/keluar/' . $item->id_keluar);
				$objDrawing->setCoordinates('D' . $a);                      
				$objDrawing->setWidth(100); 
				$objDrawing->setHeight(100); 
				$objDrawing->setWorksheet($this->excel->getActiveSheet());
			}
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(19);
			$this->excel->getActiveSheet()->getRowDimension($a)->setRowHeight(75);

			$this->excel->getActiveSheet()->setCellValue('E' . $a, $item->jumlah);
			$this->excel->getActiveSheet()->setCellValue('F' . $a, $item->pengangkut);
			$this->excel->getActiveSheet()->setCellValue('G' . $a, $item->no_dokumen);

			$i++;
			$a++;
			$jumlah += $item->jumlah;
		}
		$this->excel->getActiveSheet()->getStyle('D' . $a . ':'. 'E' . $a)->applyFromArray($styleArray);

		$this->excel->getActiveSheet()->mergeCells('A' . $a . ':C' . $a);
		$this->excel->getActiveSheet()->setCellValue('D' . $a, 'Total');
		$this->excel->getActiveSheet()->getStyle('D' . $a)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$this->excel->getActiveSheet()->setCellValue('E' . $a, $jumlah);
		$this->excel->getActiveSheet()->getStyle('D' . $a . ':' . 'E' . $a)->getFont()->setBold(true);

		$this->excel->getActiveSheet()->getStyle('A5:G5')->applyFromArray($styleArrayBold);

		$filename='DATA LIMBAH KELUAR.xlsx'; 
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		
		$objWriter->save('php://output');
	}

	function export_semuasemua() {
		$jumlah = 0;
		$data['data']['triwulan'] = $this->input->get('triwulan');
		$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		$data['data']['tahun'] = $this->input->get('tahun');

		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar_semuasemua($data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);

		switch ($data['data']['triwulan']) {
			case 1:
				$triwulan = 'I';
				break;
			
			case 2:
				$triwulan = 'II';
				break;
			
			case 3:
				$triwulan = 'III';
				break;
			
			case 4:
				$triwulan = 'IV';
				break;
			
			default:
				$triwulan = 'ERROR !!!';
				break;
		}

		$this->load->library('excel');
		
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$this->excel->getActiveSheet()->setTitle('Sheet 1');

		foreach(range('A','D') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
		foreach(range('F','H') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
		
		$this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG KELUAR DARI TPS');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:H1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A2', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['data']['tahun']);
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
		$this->excel->getActiveSheet()->mergeCells('A2:H2');
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->getStyle('A4:H4')->getFont()->setBold(true); 
		$this->excel->getActiveSheet()->setCellValue('A4', 'NO');
		$this->excel->getActiveSheet()->setCellValue('B4', 'TANGGAL KELUAR');
		$this->excel->getActiveSheet()->setCellValue('C4', 'UNIT');
		$this->excel->getActiveSheet()->setCellValue('D4', 'LIMBAH');
		$this->excel->getActiveSheet()->setCellValue('E4', 'FOTO MANIFEST');
		$this->excel->getActiveSheet()->setCellValue('F4', 'JUMLAH (KG)');
		$this->excel->getActiveSheet()->setCellValue('G4', 'TUJUAN PENYERAHAN');
		$this->excel->getActiveSheet()->setCellValue('H4', 'NO DOKUMEN');

		$i = 1;
		$a = 5;
		$styleArray = array(
		      'borders' => array(
		          'allborders' => array(
		              'style' => PHPExcel_Style_Border::BORDER_THIN
		          )
		      )
		  );
		  $styleArrayBold = array(
		      'borders' => array(
		          'allborders' => array(
		              'style' => PHPExcel_Style_Border::BORDER_MEDIUM
		          )
		      )
		  );
		foreach ($data['data']['keluar'] as $item) {
			$this->excel->getActiveSheet()->getStyle('A' . $a . ':'. 'H' . $a)->applyFromArray($styleArray);
            $this->excel->getActiveSheet()->getStyle('A' . $a . ':' . 'H' . $a)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			
			$this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
			$this->excel->getActiveSheet()->setCellValue('B' . $a, $this->pustaka->tanggal_indo_string($item->tanggal));
			$this->excel->getActiveSheet()->setCellValue('C' . $a, $this->db->get_where('unit', array('id' => $item->id_unit))->row()->unit);
			$this->excel->getActiveSheet()->setCellValue('D' . $a, $item->limbah);
			
			if (file_exists('uploads/keluar/' . $item->id_keluar)) {
				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setPath('uploads/keluar/' . $item->id_keluar);
				$objDrawing->setCoordinates('E' . $a);                      
				$objDrawing->setWidth(100); 
				$objDrawing->setHeight(100); 
				$objDrawing->setWorksheet($this->excel->getActiveSheet());
			}
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(19);
			$this->excel->getActiveSheet()->getRowDimension($a)->setRowHeight(75);

			$this->excel->getActiveSheet()->setCellValue('F' . $a, $item->jumlah);
			$this->excel->getActiveSheet()->setCellValue('G' . $a, $item->pengangkut);
			$this->excel->getActiveSheet()->setCellValue('H' . $a, $item->no_dokumen);

			$i++;
			$a++;

			$jumlah += $item->jumlah;
		}
		$this->excel->getActiveSheet()->getStyle('E' . $a . ':'. 'F' . $a)->applyFromArray($styleArray);

		$this->excel->getActiveSheet()->mergeCells('A' . $a . ':D' . $a);
		$this->excel->getActiveSheet()->setCellValue('E' . $a, 'Total');
		$this->excel->getActiveSheet()->getStyle('E' . $a)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$this->excel->getActiveSheet()->setCellValue('F' . $a, $jumlah);
		$this->excel->getActiveSheet()->getStyle('E' . $a . ':' . 'F' . $a)->getFont()->setBold(true);

		$this->excel->getActiveSheet()->getStyle('A4:H4')->applyFromArray($styleArrayBold);

		$filename='DATA LIMBAH KELUAR.xlsx'; 
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		
		$objWriter->save('php://output');
	}

}
