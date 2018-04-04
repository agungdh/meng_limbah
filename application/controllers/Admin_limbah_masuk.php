<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_limbah_masuk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_masuk');	
		$this->load->library('pustaka');
	}

	function index($unit_id) {
		$data['isi'] = "admin_limbah_masuk/index";
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
		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($unit_id, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function semuasemua() {
		$data['isi'] = "admin_limbah_masuk/indexsemuasemua";
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
		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah_semuasemua($data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function export($id_unit) {
		$unit = $this->db->get_where('unit', array('id' => $id_unit))->row()->unit;

		$data['data']['triwulan'] = $this->input->get('triwulan');
		$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		$data['data']['tahun'] = $this->input->get('tahun');

		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);

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
		
		$this->excel->getActiveSheet()->setTitle('Sheet 1');
		
		$this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG MASUK DARI TPS');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->setCellValue('A2', 'UNIT ' . strtoupper($unit));
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A2:F2');
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A3', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['data']['tahun']);
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(15);
		$this->excel->getActiveSheet()->mergeCells('A3:F3');
		$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A5', 'NO');
		$this->excel->getActiveSheet()->setCellValue('B5', 'LIMBAH');
		$this->excel->getActiveSheet()->setCellValue('C5', 'FOTO');
		$this->excel->getActiveSheet()->setCellValue('D5', 'TANGGAL MASUK');
		$this->excel->getActiveSheet()->setCellValue('E5', 'SUMBER');
		$this->excel->getActiveSheet()->setCellValue('F5', 'JUMLAH (KG)');;

		$a = 6;

		$grandtotal = 0;
      	$jumlah = 0;

		foreach ($data['data']['masuk'] as $item) {
			$this->excel->getActiveSheet()->setCellValue('A' . $a, $item->limbah);
			$this->excel->getActiveSheet()->mergeCells('A' . $a . ':F' . $a);

			$a++;

			$i = 0;
			$last_i = 0;
			$id = 0;
			$sub_limbah = null;

		    foreach ($this->m_masuk->ambil_child_limbah($item->id_limbah, $id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']) as $item2) {
	            $i = $last_i++;
	            if ($id != $item2->id_sub_limbah) {
	              $i++;
	              $sub_limbah = $item2->sub_limbah;
	            } else {
	              $last_i = $i;
	              $i = null;
	              $sub_limbah = null;
	            }
	            $id = $item2->id_sub_limbah;
	            $jumlah += $item2->jumlah;
	            $item_jumlah = explode('.', $item2->jumlah);
	            if ($item_jumlah[1] == 0) {
	              $item_jumlah = $item_jumlah[0];
	            } else {
	              $item_jumlah = $item2->jumlah;
	            }

				$this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
				$this->excel->getActiveSheet()->setCellValue('B' . $a, $sub_limbah);
				
				if (file_exists('uploads/masuk/' . $item2->id_masuk)) {
					$objDrawing = new PHPExcel_Worksheet_Drawing();
					$objDrawing->setPath('uploads/masuk/' . $item2->id_masuk);
					$objDrawing->setCoordinates('C' . $a);                      
					$objDrawing->setWidth(100); 
					$objDrawing->setHeight(35); 
					$objDrawing->setWorksheet($this->excel->getActiveSheet());
				}

				$this->excel->getActiveSheet()->setCellValue('D' . $a, $this->pustaka->tanggal_indo_string($item2->tanggal));
				$this->excel->getActiveSheet()->setCellValue('E' . $a, $item2->sumber);
				$this->excel->getActiveSheet()->setCellValue('F' . $a, $item_jumlah);

				$i++;
				$a++;

			}
			$this->excel->getActiveSheet()->setCellValue('A' . $a, 'Total');
			$this->excel->getActiveSheet()->mergeCells('A' . $a . ':E' . $a);
			$this->excel->getActiveSheet()->getStyle('A' . $a)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$this->excel->getActiveSheet()->setCellValue('F' . $a, $jumlah);

			$grandtotal += $jumlah;
    		$jumlah = 0;
			$a++;

    		
		}

		$filename='DATA LIMBAH MASUK.xlsx'; 
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		
		$objWriter->save('php://output');
	}

	function export_semuasemua() {
		$data['data']['triwulan'] = $this->input->get('triwulan');
		$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		$data['data']['tahun'] = $this->input->get('tahun');

		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah_semuasemua($data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);

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
		
		$this->excel->getActiveSheet()->setTitle('Sheet 1');
		
		$this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG MASUK DARI TPS');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A2', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['data']['tahun']);
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(15);
		$this->excel->getActiveSheet()->mergeCells('A2:G2');
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A4', 'NO');
		$this->excel->getActiveSheet()->setCellValue('B4', 'UNIT');
		$this->excel->getActiveSheet()->setCellValue('C4', 'LIMBAH');
		$this->excel->getActiveSheet()->setCellValue('D4', 'FOTO');
		$this->excel->getActiveSheet()->setCellValue('E4', 'TANGGAL MASUK');
		$this->excel->getActiveSheet()->setCellValue('F4', 'SUMBER');
		$this->excel->getActiveSheet()->setCellValue('G4', 'JUMLAH (KG)');;

		$a = 5;

		$grandtotal = 0;
      	$jumlah = 0;

		foreach ($data['data']['masuk'] as $item) {
			$this->excel->getActiveSheet()->setCellValue('A' . $a, $item->limbah);
			$this->excel->getActiveSheet()->mergeCells('A' . $a . ':G' . $a);

			$a++;

			$i = 0;
			$last_i = 0;
			$id = 0;
			$sub_limbah = null;

		    foreach ($this->m_masuk->ambil_child_limbah_semuasemua($item->id_limbah, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']) as $item2) {
	            $i = $last_i++;
	            if ($id != $item2->id_sub_limbah) {
	              $i++;
	              $sub_limbah = $item2->sub_limbah;
	            } else {
	              $last_i = $i;
	              $i = null;
	              $sub_limbah = null;
	            }
	            $id = $item2->id_sub_limbah;
	            $jumlah += $item2->jumlah;
	            $item_jumlah = explode('.', $item2->jumlah);
	            if ($item_jumlah[1] == 0) {
	              $item_jumlah = $item_jumlah[0];
	            } else {
	              $item_jumlah = $item2->jumlah;
	            }

				$this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
				$this->excel->getActiveSheet()->setCellValue('B' . $a, $this->db->get_where('unit', array('id' => $item2->id_unit))->row()->unit);
				$this->excel->getActiveSheet()->setCellValue('C' . $a, $sub_limbah);
				
				if (file_exists('uploads/masuk/' . $item2->id_masuk)) {
					$objDrawing = new PHPExcel_Worksheet_Drawing();
					$objDrawing->setPath('uploads/masuk/' . $item2->id_masuk);
					$objDrawing->setCoordinates('D' . $a);                      
					$objDrawing->setWidth(100); 
					$objDrawing->setHeight(35); 
					$objDrawing->setWorksheet($this->excel->getActiveSheet());
				}

				$this->excel->getActiveSheet()->setCellValue('E' . $a, $this->pustaka->tanggal_indo_string($item2->tanggal));
				$this->excel->getActiveSheet()->setCellValue('F' . $a, $item2->sumber);
				$this->excel->getActiveSheet()->setCellValue('G' . $a, $item_jumlah);

				$i++;
				$a++;

			}
			$this->excel->getActiveSheet()->setCellValue('A' . $a, 'Total');
			$this->excel->getActiveSheet()->mergeCells('A' . $a . ':F' . $a);
			$this->excel->getActiveSheet()->getStyle('A' . $a)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

			$this->excel->getActiveSheet()->setCellValue('G' . $a, $jumlah);

			$grandtotal += $jumlah;
    		$jumlah = 0;
			$a++;

    		
		}

		$filename='DATA LIMBAH MASUK.xlsx'; 
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		
		$objWriter->save('php://output');
	}

}

?>