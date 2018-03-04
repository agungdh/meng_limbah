<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengajuan');	
		$this->load->library('pustaka');
	}

	function index() {
		$data['isi'] = "pengajuan/index";
		$data['data']['pengajuan'] = $this->m_pengajuan->ambil_pengajuan($this->session->id);

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "pengajuan/tambah";
		$data['data']['versi'] = $this->m_pengajuan->ambil_versi();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$this->m_pengajuan->tambah_pengajuan(
			$this->input->post('tanggal'),
			$this->input->post('versi'),
			$this->input->post('tahun'),
			$this->session->id
		);

		redirect(base_url('pengajuan'));
	}

	function ubah($id_pengajuan) {
		$data['isi'] = "pengajuan/ubah";
		$data['data']['versi'] = $this->m_pengajuan->ambil_versi();
		$data['data']['pengajuan'] = $this->m_pengajuan->ambil_pengajuan_id($id_pengajuan);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_pengajuan->ubah_pengajuan(
			$this->input->post('tanggal'),
			$this->input->post('versi'),
			$this->input->post('tahun'),
			$this->input->post('id')
		);

		redirect(base_url('pengajuan'));
	}

	function aksi_hapus($id) {
		$this->m_pengajuan->hapus_pengajuan(
			$id
		);

		redirect(base_url('pengajuan'));
	}

}
