<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Versi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_versi');	
	}

	function index() {
		$data['isi'] = "versi/index";
		$data['data']['versi'] = $this->m_versi->ambil_versi();

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "versi/tambah";

		$this->load->view("template/template", $data);
	}

	function aksi_tambah() {
		$this->m_versi->tambah_versi(
			$this->input->post('nama'),
			$this->input->post('versi'),
			$this->input->post('tahun')
		);

		redirect(base_url('versi'));
	}

	function ubah($id_versi) {
		$data['isi'] = "versi/ubah";
		$data['data']['data_versi'] = $this->m_versi->ambil_versi_id($id_versi);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_versi->ubah_versi(
			$this->input->post('nama'),
			$this->input->post('versi'),
			$this->input->post('tahun'),
			$this->input->post('id')
		);
		
		redirect(base_url('versi'));
	}

	function aksi_hapus($id_versi) {
		$this->m_versi->hapus_versi(
			$id_versi
		);

		redirect(base_url('versi'));
	}

}
