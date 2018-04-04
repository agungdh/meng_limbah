<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_keluar');	
		$this->load->library('pustaka');
	}

	function index() {
		$data['isi'] = "keluar/index";
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
		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar($this->session->id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "keluar/tambah";
		$data['data']['limbah'] = $this->m_keluar->ambil_limbah();
		$data['data']['pengangkut'] = $this->m_keluar->ambil_pengangkut();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$keluar = $this->m_keluar->tambah_limbah_keluar(
			$this->session->id_unit,
			$this->input->post('limbah'),
			$this->input->post('tanggal'),
			$this->input->post('pengangkut'),
			$this->input->post('jumlah'),
			$this->input->post('no_dokumen')
		);

		move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/keluar/' . $keluar);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($this->input->post('tanggal'));
		$tahun = date('Y', strtotime($this->input->post('tanggal')));
		redirect(base_url('keluar?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function ubah($id_keluar) {
		$data['isi'] = "keluar/ubah";
		$data['data']['limbah'] = $this->m_keluar->ambil_limbah();
		$data['data']['pengangkut'] = $this->m_keluar->ambil_pengangkut();
		$data['data']['keluar'] = $this->m_keluar->ambil_keluar_id($id_keluar);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_keluar->ubah_limbah_keluar(
			$this->input->post('id'),
			$this->input->post('limbah'),
			$this->input->post('tanggal'),
			$this->input->post('pengangkut'),
			$this->input->post('jumlah'),
			$this->input->post('no_dokumen')
		);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($this->input->post('tanggal'));
		$tahun = date('Y', strtotime($this->input->post('tanggal')));
		redirect(base_url('keluar?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function aksi_hapus($id) {
		$tanggal = $this->m_keluar->ambil_keluar_id($id)->tanggal;

		$this->m_keluar->hapus_limbah_keluar(
			$id
		);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($tanggal);
		$tahun = date('Y', strtotime($tanggal));
		redirect(base_url('keluar?tahun=' . $tahun . '&triwulan=' . $triwulan));
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
					if(move_uploaded_file($file_tmp, 'uploads/keluar/'.$this->input->post('id_keluar').'.jpg')){
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
		$jumlah = 0;
		$data['data']['triwulan'] = $this->input->get('triwulan');
		$data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
		$data['data']['tahun'] = $this->input->get('tahun');

		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar($this->session->id_unit, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);

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
		
		$this->excel->getActiveSheet()->setCellValue('A1', 'DATA LIMBAH B3 YANG KELUAR DARI TPS');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->setCellValue('A2', 'UNIT ' . strtoupper($this->session->unit));
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A2:G2');
		$this->excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A3', 'TRIWULAN-' . $triwulan . ' TAHUN ' . $data['data']['tahun']);
		$this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(15);
		$this->excel->getActiveSheet()->mergeCells('A3:G3');
		$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$this->excel->getActiveSheet()->setCellValue('A5', 'NO');
		$this->excel->getActiveSheet()->setCellValue('B5', 'TANGGAL KELUAR');
		$this->excel->getActiveSheet()->setCellValue('C5', 'LIMBAH');
		$this->excel->getActiveSheet()->setCellValue('D5', 'FOTO');
		$this->excel->getActiveSheet()->setCellValue('E5', 'JUMLAH (KG)');
		$this->excel->getActiveSheet()->setCellValue('F5', 'TUJUAN PENYERAHAN');
		$this->excel->getActiveSheet()->setCellValue('G5', 'NO DOKUMEN');

		$i = 1;
		$a = 6;
		foreach ($data['data']['keluar'] as $item) {
			$this->excel->getActiveSheet()->setCellValue('A' . $a, $i);
			$this->excel->getActiveSheet()->setCellValue('B' . $a, $this->pustaka->tanggal_indo_string($item->tanggal));
			$this->excel->getActiveSheet()->setCellValue('C' . $a, $item->limbah);
			
			if (file_exists('uploads/keluar/' . $item->id_keluar)) {
				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setPath('uploads/keluar/' . $item->id_keluar);
				$objDrawing->setCoordinates('D' . $a);                      
				$objDrawing->setWidth(100); 
				$objDrawing->setHeight(35); 
				$objDrawing->setWorksheet($this->excel->getActiveSheet());
			}

			$this->excel->getActiveSheet()->setCellValue('E' . $a, $item->jumlah);
			$this->excel->getActiveSheet()->setCellValue('F' . $a, $item->pengangkut);
			$this->excel->getActiveSheet()->setCellValue('G' . $a, $item->no_dokumen);

			$i++;
			$a++;
			$jumlah += $item->jumlah;
		}
		$this->excel->getActiveSheet()->setCellValue('A' . $a, 'Total');
		$this->excel->getActiveSheet()->mergeCells('A' . $a . ':D' . $a);
		$this->excel->getActiveSheet()->getStyle('A' . $a)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$this->excel->getActiveSheet()->setCellValue('E' . $a, $jumlah);

		$filename='DATA LIMBAH KELUAR.xlsx'; 
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
		
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		
		$objWriter->save('php://output');
	}

}
