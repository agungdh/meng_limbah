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
		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($this->session->id, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
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
			$this->session->id,
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

}
