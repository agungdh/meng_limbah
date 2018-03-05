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
		$data['data']['keluar'] = $this->m_keluar->ambil_limbah_keluar($this->session->id, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "keluar/tambah";
		$data['data']['limbah'] = $this->m_keluar->ambil_limbah();
		$data['data']['pengangkut'] = $this->m_keluar->ambil_pengangkut();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$this->m_keluar->tambah_limbah_keluar(
			$this->session->id,
			$this->input->post('limbah'),
			$this->input->post('tanggal'),
			$this->input->post('pengangkut'),
			$this->input->post('jumlah'),
			$this->input->post('no_dokumen')
		);

		redirect(base_url('keluar'));
	}

	function ubah($id_keluar) {
		$data['isi'] = "keluar/ubah";
		$data['data']['limbah'] = $this->m_keluar->ambil_limbah();
		$data['data']['pengangkut'] = $this->m_keluar->ambil_pengangkut();
		$data['data']['keluar'] = $this->m_keluar->ambil_keluar_id($id_keluar);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_keluar->ubah_limbah_keluar(
			$this->input->post('id'),
			$this->input->post('limbah'),
			$this->input->post('tanggal'),
			$this->input->post('pengangkut'),
			$this->input->post('jumlah'),
			$this->input->post('no_dokumen')
		);

		redirect(base_url('keluar'));
	}

	function aksi_hapus($id) {
		$this->m_keluar->hapus_limbah_keluar(
			$id
		);

		redirect(base_url('keluar'));
	}

}
