<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_fakultas');	
	}

	function index() {
		$data['isi'] = "fakultas/index";
		$data['data']['fakultas'] = $this->m_fakultas->ambil_fakultas();

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "fakultas/tambah";

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$this->m_fakultas->tambah_fakultas(
			$this->input->post('kode'),
			$this->input->post('nama')
		);

		redirect(base_url('fakultas'));
	}

	function ubah($id_fakultas) {
		$data['isi'] = "fakultas/ubah";
		$data['data']['fakultas'] = $this->m_fakultas->ambil_fakultas_id($id_fakultas);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_fakultas->ubah_fakultas(
			$this->input->post('kode'),
			$this->input->post('nama'),
			$this->input->post('id')
		);

		redirect(base_url('fakultas'));
	}

	function aksi_hapus($id) {
		$this->m_fakultas->hapus_fakultas(
			$id
		);

		redirect(base_url('fakultas'));
	}

}
