<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_prodi');	
	}

	function index($id_fakultas) {
		$data['isi'] = "prodi/index";
		$data['data']['fakultas'] = $this->m_prodi->ambil_fakultas_id($id_fakultas);
		$data['data']['prodi'] = $this->m_prodi->ambil_prodi($id_fakultas);

		$this->load->view("template/template", $data);
	}

	function tambah($id_fakultas) {
		$data['isi'] = "prodi/tambah";
		$data['data']['fakultas'] = $this->m_prodi->ambil_fakultas_id($id_fakultas);

		$this->load->view("template/template", $data);
	}
	
	function aksi_tambah($id_fakultas) {
		$this->m_prodi->tambah_prodi(
			$this->input->post('kode'),
			$this->input->post('nama'),
			$id_fakultas
		);

		redirect(base_url('prodi/index/' . $id_fakultas)); 
	}

	function ubah($id_prodi) {
		$data['isi'] = "prodi/ubah";
		$data['data']['fakultas'] = $this->m_prodi->ambil_data_fakultas_dari_id_prodi($id_prodi);
		$data['data']['prodi'] = $this->m_prodi->ambil_prodi_id($id_prodi);
		
		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$versi = $this->m_prodi->ambil_data_fakultas_dari_id_prodi($this->input->post('id'));

		$this->m_prodi->ubah_prodi(
			$this->input->post('kode'),
			$this->input->post('nama'),
			$this->input->post('id')
		);

		redirect(base_url('prodi/index/' . $versi->id_fakultas)); 
	}

	function aksi_hapus($id_prodi) {
		$versi = $this->m_prodi->ambil_data_fakultas_dari_id_prodi($id_prodi);

		$this->m_prodi->hapus_prodi(
			$id_prodi
		);

		redirect(base_url('prodi/index/' . $versi->id_fakultas)); 
	}

}
