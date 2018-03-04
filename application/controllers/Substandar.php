<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Substandar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_substandar');	
	}

	function index($id_standar) {
		$data['isi'] = "substandar/index";
		$data['data']['standar'] = $this->m_substandar->ambil_standar_id($id_standar);
		$data['data']['versi'] = $this->m_substandar->ambil_versi_id($data['data']['standar']->versi_id);
		$data['data']['substandar'] = $this->m_substandar->ambil_substandar($id_standar);

		$this->load->view("template/template", $data);
	}

	function tambah($id_standar) {
		$data['isi'] = "substandar/tambah";
		$data['data']['standar'] = $this->m_substandar->ambil_standar_id($id_standar);

		$this->load->view("template/template", $data);
	}

	function aksi_tambah($id_standar) {
		$this->m_substandar->tambah_substandar(
			$this->input->post('nomor'),
			$this->input->post('nama'),
			$id_standar
		);

		redirect(base_url('substandar/index/'.$id_standar));
	}

	function ubah($id_substandar) {
		$data['isi'] = "substandar/ubah";
		$data['data']['data_substandar'] = $this->m_substandar->ambil_substandar_id($id_substandar);
		$data['data']['standar'] = $this->m_substandar->ambil_standar_id($data['data']['data_substandar']->standar_id);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$versi = $this->m_substandar->ambil_data_standar_dari_id_substandar($this->input->post('id'));
		
		$this->m_substandar->ubah_substandar(
			$this->input->post('nomor'),
			$this->input->post('nama'),
			$this->input->post('id')
		);
		
		redirect(base_url('substandar/index/'.$versi->id_standar));
	}

	function aksi_hapus($id_substandar) {
		$versi = $this->m_substandar->ambil_data_standar_dari_id_substandar($id_substandar);

		$this->m_substandar->hapus_substandar(
			$id_substandar
		);

		redirect(base_url('substandar/index/'.$versi->id_standar));
	}

}
