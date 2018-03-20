<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Limbah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_limbah');	
	}

	function index() {
		$data['isi'] = "limbah/index";
		$data['data']['limbah'] = $this->m_limbah->ambil_limbah();
		
		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "limbah/tambah";
		$data['data']['jenis'] = $this->m_universal->get('jenis');
		$data['data']['golongan'] = $this->m_universal->get('golongan');

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		$this->m_universal->insert('limbah', $data);

		redirect(base_url('limbah'));
	}

	function ubah($id_limbah) {
		$data['isi'] = "limbah/ubah";
		$data['data']['jenis'] = $this->m_universal->get('jenis');
		$data['data']['golongan'] = $this->m_universal->get('golongan');
		$data['data']['limbah'] = $this->m_universal->get_id('limbah', $id_limbah);
		
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
		$this->m_universal->update('limbah', $data, $id);

		redirect(base_url('limbah'));
	}

	function aksi_hapus($id) {
		$this->m_universal->delete(
			'limbah', $id
		);

		redirect(base_url('limbah'));
	}

}
