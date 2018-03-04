<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_standar');	
	}

	function index($id_versi) {
		$data['isi'] = "standar/index";
		$data['data']['versi'] = $this->m_standar->ambil_versi_id($id_versi);
		$data['data']['standar'] = $this->m_standar->ambil_standar($id_versi);

		$this->load->view("template/template", $data);
	}

	function tambah($id_versi) {
		$data['isi'] = "standar/tambah";
		$data['data']['versi'] = $this->m_standar->ambil_versi_id($id_versi);

		$this->load->view("template/template", $data);
	}

	function aksi_tambah($id_versi) {
		$this->m_standar->tambah_standar(
			$this->input->post('nomor'),
			$this->input->post('nama'),
			$id_versi
		);

		redirect(base_url('standar/index/'.$id_versi));
	}

	function ubah($id_standar) {
		$data['isi'] = "standar/ubah";
		$data['data']['data_standar'] = $this->m_standar->ambil_standar_id($id_standar);
		$data['data']['versi'] = $this->m_standar->ambil_versi_id($data['data']['data_standar']->versi_id);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$versi = $this->m_standar->ambil_data_versi_dari_id_standar($this->input->post('id'));
		
		$this->m_standar->ubah_standar(
			$this->input->post('nomor'),
			$this->input->post('nama'),
			$this->input->post('id')
		);
		
		redirect(base_url('standar/index/'.$versi->id_versi));
	}

	function aksi_hapus($id_standar) {
		$versi = $this->m_standar->ambil_data_versi_dari_id_standar($id_standar);

		$this->m_standar->hapus_standar(
			$id_standar
		);

		redirect(base_url('standar/index/'.$versi->id_versi));
	}

}
