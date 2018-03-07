<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {
	var $data;

	function __construct(){
		parent::__construct();	
		$this->data['modul'] = 'golongan';
	}

	function index() {
		$this->data['isi'] = $this->data['modul'] . "/index";
		$this->data['data'][$this->data['modul']] = $this->m_universal->get($this->data['modul']);

		$this->load->view("template/template", $this->data);
	}

	function tambah() {
		$this->data['isi'] = $this->data['modul'] . "/tambah";

		$this->load->view("template/template", $this->data);	
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		$this->m_universal->insert($this->data['modul'], $data);

		redirect(base_url($this->data['modul']));
	}

	function ubah($id) {
		$this->data['isi'] = $this->data['modul'] . "/ubah";
		$this->data['data'][$this->data['modul']] = $this->m_universal->get_id($this->data['modul'], $id);
		
		$this->load->view("template/template", $this->data);
	}

	function aksi_ubah() {
		$this->m_universal->update(
			array(
				$this->input->post('golongsan'),
				$this->input->post('masa_berlaku_hari')
			), $this->input->post('id')
		);

		redirect(base_url($this->data['modul']));
	}

	function aksi_hapus($id) {
		$this->m_universal->delete(
			$this->data['modul'], $id
		);
		
		redirect(base_url($this->data['modul']));
	}

}
