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
		$data['data']['masuk'] = $this->m_masuk->ambil_parent_limbah($this->session->id, $data['data']['awal_akhir_triwulan'][0], $data['data']['awal_akhir_triwulan'][1], $data['data']['tahun']);
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "masuk/tambah";
		$data['data']['sub_limbah'] = $this->m_masuk->ambil_sub_limbah();
		$data['data']['sumber'] = $this->m_masuk->ambil_sumber();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$this->m_masuk->tambah_limbah_masuk(
			$this->session->id,
			$this->input->post('sub_limbah'),
			$this->input->post('tanggal'),
			$this->input->post('sumber'),
			$this->input->post('jumlah')
		);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($this->input->post('tanggal'));
		$tahun = date('Y', strtotime($this->input->post('tanggal')));
		redirect(base_url('masuk?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function ubah($id_masuk) {
		$data['isi'] = "masuk/ubah";
		$data['data']['sub_limbah'] = $this->m_masuk->ambil_sub_limbah();
		$data['data']['sumber'] = $this->m_masuk->ambil_sumber();
		$data['data']['masuk'] = $this->m_masuk->ambil_masuk_id($id_masuk);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_masuk->ubah_limbah_masuk(
			$this->input->post('id'),
			$this->input->post('sub_limbah'),
			$this->input->post('tanggal'),
			$this->input->post('sumber'),
			$this->input->post('jumlah')
		);

		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($this->input->post('tanggal'));
		$tahun = date('Y', strtotime($this->input->post('tanggal')));
		redirect(base_url('masuk?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

	function aksi_hapus($id) {
		$tanggal = $this->m_masuk->ambil_masuk_id($id)->tanggal;

		$this->m_masuk->hapus_limbah_masuk(
			$id
		);
		
		$triwulan = $this->pustaka->ambil_triwulan_dari_tanggal($tanggal);
		$tahun = date('Y', strtotime($tanggal));
		redirect(base_url('masuk?tahun=' . $tahun . '&triwulan=' . $triwulan));
	}

}
