<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Butir extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_butir');	
	}

	function index($id_substandar) {
		$data['isi'] = "butir/index";
		$data['data']['substandar'] = $this->m_butir->ambil_substandar_id($id_substandar);
		$data['data']['standar'] = $this->m_butir->ambil_standar_id($data['data']['substandar']->standar_id);
		$data['data']['versi'] = $this->m_butir->ambil_versi_id($data['data']['standar']->versi_id);
		$data['data']['butir'] = $this->m_butir->ambil_butir($id_substandar);
		
		$this->load->view("template/template", $data);
	}

	function tambah($id_substandar) {
		$data['isi'] = "butir/tambah";
		$data['data']['substandar'] = $this->m_butir->ambil_substandar_id($id_substandar);

		$this->load->view("template/template", $data);
	}

	function aksi_tambah($id_substandar) {
		$this->m_butir->tambah_butir(
			$this->input->post('nomor'),
			$this->input->post('nama'),
			$id_substandar
		);

		redirect(base_url('butir/index/'.$id_substandar));
	}

	function ubah($id_butir) {
		$data['isi'] = "butir/ubah";
		$data['data']['data_butir'] = $this->m_butir->ambil_butir_id($id_butir);
		$data['data']['substandar'] = $this->m_butir->ambil_substandar_id($data['data']['data_butir']->substandar_id);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$versi = $this->m_butir->ambil_data_substandar_dari_id_butir($this->input->post('id'));
		
		$this->m_butir->ubah_butir(
			$this->input->post('nomor'),
			$this->input->post('nama'),
			$this->input->post('id')
		);
		
		redirect(base_url('butir/index/'.$versi->id_substandar));
	}

	function aksi_hapus($id_butir) {
		$versi = $this->m_butir->ambil_data_substandar_dari_id_butir($id_butir);

		$this->m_butir->hapus_butir(
			$id_butir
		);

		redirect(base_url('butir/index/'.$versi->id_substandar));
	}

}
