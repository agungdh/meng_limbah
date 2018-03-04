<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');	
	}

	function index() {
		$data['isi'] = "user/index";
		$data['data']['user'] = $this->m_user->ambil_user();

		$this->load->view("template/template", $data);
	}

	function tambah() {
		$data['isi'] = "user/tambah";
		$data['data']['prodi'] = $this->m_user->ambil_prodi();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		$this->m_user->tambah_user(
			$this->input->post('username'),
			hash('sha512', $this->input->post('password')),
			$this->input->post('level'),
			$this->input->post('prodi')
		);

		redirect(base_url('user'));
	}

	function ubah($id_user) {
		$data['isi'] = "user/ubah";
		$data['data']['user'] = $this->m_user->ambil_user_id($id_user);

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		$this->m_user->ubah_user(
			hash("sha512", $this->input->post('password')),
			$this->input->post('id')
		);

		redirect(base_url('user'));
	}

	function aksi_hapus($id) {
		$this->m_user->hapus_user(
			$id
		);

		redirect(base_url('user'));
	}

}
