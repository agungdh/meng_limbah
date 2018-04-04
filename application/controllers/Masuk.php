<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_masuk');	
		$this->load->library('pustaka');
	}

	function index() {
		$data['isi'] = "masuk/index";
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
		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($this->session->id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "masuk/tambah";
		$data['data']['sub_limbah'] = $this->m_masuk->ambil_sub_limbah();
		$data['data']['sumber'] = $this->m_masuk->ambil_sumber();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$masuk =  $this->m_masuk->tambah_limbah_masuk(
			$this->session->id_unit,
			$this->input->post('sub_limbah'),
			$this->input->post('tanggal'),
			$this->input->post('sumber'),
			$this->input->post('jumlah')
		);

		move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/masuk/' . $masuk);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($this->input->post('tanggal'));
		$tahun = date('Y', strtotime($this->input->post('tanggal')));
		redirect(base_url('masuk?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function ubah($id_masuk) {
		$data['isi'] = "masuk/ubah";
		$data['data']['sub_limbah'] = $this->m_masuk->ambil_sub_limbah();
		$data['data']['sumber'] = $this->m_masuk->ambil_sumber();
		$data['data']['masuk'] = $this->m_masuk->ambil_masuk_id($id_masuk);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_masuk->ubah_limbah_masuk(
			$this->input->post('id'),
			$this->input->post('sub_limbah'),
			$this->input->post('tanggal'),
			$this->input->post('sumber'),
			$this->input->post('jumlah')
		);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($this->input->post('tanggal'));
		$tahun = date('Y', strtotime($this->input->post('tanggal')));
		redirect(base_url('masuk?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function aksi_hapus($id) {
		$tanggal = $this->m_masuk->ambil_masuk_id($id)->tanggal;

		$this->m_masuk->hapus_limbah_masuk(
			$id
		);
		
		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($tanggal);
		$tahun = date('Y', strtotime($tanggal));
		redirect(base_url('masuk?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function upload(){
		if ($_FILES['file']['size']==0) {
			redirect(base_url('?file_kosong=1'));	
		}
				
			$ekstensi_diperbolehkan	= array('jpg','bmp','png');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			//awal
			//tengah
			//akhir
			//end() -> akhir

			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5242880){			
					if(move_uploaded_file($file_tmp, 'uploads/masuk/'.$this->input->post('id_masuk').'.jpg')){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						// echo 'GAGAL MENGUPLOAD FILE';
						redirect(base_url('?upload_gagal=1'));
					}
				}else{
					redirect(base_url('?file_kebesaran=1'));	
					// echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				redirect(base_url('?ekstensi_salah=1'));	
				// echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

		redirect(base_url());	
	}

	function export() {
		
		$data['data']['triwulan'] = $this->input->get('triwulan');
		$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		$data['data']['tahun'] = $this->input->get('tahun');

		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($this->session->id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);

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

		$this->excel->getActiveSheet()->setCellValue('A2', 'UNIT ' . strtoupper($this->session->unit));
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

		    foreach ($this->m_masuk->ambil_child_limbah($item->id_limbah, $this->session->id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']) as $item2) {
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

}
