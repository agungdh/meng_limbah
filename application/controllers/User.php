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
		$data['data']['unit'] = $this->m_user->ambil_unit();

		$this->load->view("template/template", $data);	
	}

	function aksi_tambah() {
		if ($this->input->post('email') == '') {
			$email = null;
		} else {
			$email = $this->input->post('email');
		}
		$this->m_user->tambah_user(
			$this->input->post('nama'),
			$this->input->post('username'),
			hash('sha512', $this->input->post('password')),
			$this->input->post('level'),
			$this->input->post('unit'),
			$email
		);

		redirect(base_url('user'));
	}

	function ubah($id_user) {
		$data['isi'] = "user/ubah";
		$data['data']['user'] = $this->m_user->ambil_user_id($id_user);
		$data['data']['unit'] = $this->m_user->ambil_unit();

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		if ($data['email'] == '') {
			$data['email'] = null;
		}
		$where['id'] = $this->input->post('id');
		$this->db->update('user', $data, $where);

		redirect(base_url('user'));
	}

	function aksi_ubah_password() {
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
