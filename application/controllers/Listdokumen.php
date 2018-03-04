<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listdokumen extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_listdokumen');	
	}

	function index($id_butir) {
		$data['isi'] = "listdokumen/index";
		$data['data']['butir'] = $this->m_listdokumen->ambil_butir_id($id_butir);
		$data['data']['substandar'] = $this->m_listdokumen->ambil_substandar_id($data['data']['butir']->substandar_id);
		$data['data']['standar'] = $this->m_listdokumen->ambil_standar_id($data['data']['substandar']->standar_id);
		$data['data']['versi'] = $this->m_listdokumen->ambil_versi_id($data['data']['standar']->versi_id);
		$data['data']['listdokumen'] = $this->m_listdokumen->ambil_listdokumen($id_butir);

		$this->load->view("template/template", $data);
	}

	function tambah($id_butir) {
		$data['isi'] = "listdokumen/tambah";
		$data['data']['butir'] = $this->m_listdokumen->ambil_butir_id($id_butir);

		$this->load->view("template/template", $data);
	}

	function aksi_tambah($id_butir) {
		$this->m_listdokumen->tambah_listdokumen(
			$this->input->post('keterangan'),
			$this->input->post('tipe'),
			$id_butir
		);

		redirect(base_url('listdokumen/index/'.$id_butir));
	}

	function ubah($id_listdokumen) {
		$data['isi'] = "listdokumen/ubah";
		$data['data']['data_listdokumen'] = $this->m_listdokumen->ambil_listdokumen_id($id_listdokumen);
		$data['data']['butir'] = $this->m_listdokumen->ambil_butir_id($data['data']['data_listdokumen']->butir_id);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$versi = $this->m_listdokumen->ambil_data_butir_dari_id_listdokumen($this->input->post('id'));
		
		$this->m_listdokumen->ubah_listdokumen(
			$this->input->post('keterangan'),
			$this->input->post('tipe'),
			$this->input->post('id')
		);
		
		redirect(base_url('listdokumen/index/'.$versi->id_butir));
	}

	function aksi_hapus($id_listdokumen) {
		$versi = $this->m_listdokumen->ambil_data_butir_dari_id_listdokumen($id_listdokumen);

		$this->m_listdokumen->hapus_listdokumen(
			$id_listdokumen
		);

		redirect(base_url('listdokumen/index/'.$versi->id_butir));
	}

}
