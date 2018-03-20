<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sublimbah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_sublimbah');	
	}

	function index($id_limbah) {
		$data['isi'] = "sublimbah/index";
		$data['data']['sublimbah'] = $this->m_sublimbah->ambil_sublimbah($id_limbah);
		$data['data']['limbah'] = $this->m_sublimbah->ambil_limbah($id_limbah);
		
		$this->load->view("template/template", $data);
	}

	function tambah($id_limbah) {
		$data['isi'] = "sublimbah/tambah";
		$data['data']['limbah'] = $this->m_sublimbah->ambil_limbah($id_limbah);
		
		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		$this->m_universal->insert('sub_limbah', $data);

		redirect(base_url('sublimbah/index/' . $data['id_limbah']));
	}

	function ubah($id_sublimbah) {
		$data['isi'] = "sublimbah/ubah";
		$data['data']['sublimbah'] = $this->m_sublimbah->ambil_sublimbah_id($id_sublimbah);
		$data['data']['limbah'] = $this->m_sublimbah->ambil_limbah($data['data']['sublimbah']->id_limbah);
		
		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			if ($key != 'id') {
				$data[$key] = $value;	
			} else {
				$id = $value;
			}
		}
		$this->m_universal->update('sub_limbah', $data, $id);
		$id_limbah = $this->m_universal->get_id('sub_limbah', $id)->id_limbah;

		redirect(base_url('sublimbah/index/' . $id_limbah));
	}

	function aksi_hapus($id) {
		$id_limbah = $this->m_universal->get_id('sub_limbah', $id)->id_limbah;
		$this->m_universal->delete(
			'sub_limbah', $id
		);

		redirect(base_url('sublimbah/index/' . $id_limbah));
	}

}
