<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_keluar');	
		$this->load->library('pustaka');
	}

	function index() {
		$data['isi'] = "keluar/index";
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
		$data['data']['masuk'] = $this->m_keluar->ambil_parent_limbah($this->session->id, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		// var_dump($data['data']['masuk']); exit();
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "keluar/tambah";
		$data['data']['sub_limbah'] = $this->m_keluar->ambil_sub_limbah();
		$data['data']['sumber'] = $this->m_keluar->ambil_sumber();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$this->m_keluar->tambah_limbah_masuk(
			$this->session->id,
			$this->input->post('sub_limbah'),
			$this->input->post('tanggal'),
			$this->input->post('sumber'),
			$this->input->post('jumlah')
		);

		redirect(base_url('masuk'));
	}

	function ubah($id_masuk) {
		$data['isi'] = "keluar/ubah";
		$data['data']['sub_limbah'] = $this->m_keluar->ambil_sub_limbah();
		$data['data']['sumber'] = $this->m_keluar->ambil_sumber();
		$data['data']['masuk'] = $this->m_keluar->ambil_masuk_id($id_masuk);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_keluar->ubah_limbah_masuk(
			$this->input->post('id'),
			$this->input->post('sub_limbah'),
			$this->input->post('tanggal'),
			$this->input->post('sumber'),
			$this->input->post('jumlah')
		);

		redirect(base_url('masuk'));
	}

	function aksi_hapus($id) {
		$this->m_keluar->hapus_limbah_masuk(
			$id
		);

		redirect(base_url('masuk'));
	}

}
