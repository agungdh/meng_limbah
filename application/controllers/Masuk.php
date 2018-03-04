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
		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($this->session->id);

		$this->load->view("template/template", $data);
	}

	// function tambah() {
	// 	$data['isi'] = "masuk/tambah";
	// 	$data['data']['prodi'] = $this->m_masuk->ambil_prodi();

	// 	$this->load->view("template/template", $data);	
	// }

	// function aksi_tambah() {
	// 	$this->m_masuk->tambah_masuk(
	// 		$this->input->post('masukname'),
	// 		hash('sha512', $this->input->post('password')),
	// 		$this->input->post('level'),
	// 		$this->input->post('prodi')
	// 	);

	// 	redirect(base_url('masuk'));
	// }

	// function ubah($id_masuk) {
	// 	$data['isi'] = "masuk/ubah";
	// 	$data['data']['masuk'] = $this->m_masuk->ambil_masuk_id($id_masuk);

	// 	$this->load->view("template/template", $data);
	// }

	// function aksi_ubah() {
	// 	$this->m_masuk->ubah_masuk(
	// 		hash("sha512", $this->input->post('password')),
	// 		$this->input->post('id')
	// 	);

	// 	redirect(base_url('masuk'));
	// }

	// function aksi_hapus($id) {
	// 	$this->m_masuk->hapus_masuk(
	// 		$id
	// 	);

	// 	redirect(base_url('masuk'));
	// }

}
