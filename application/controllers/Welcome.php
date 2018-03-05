<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_welcome');
	}

	function index() {
		$this->session->login != true ? $this->load->view("template/halaman_login") : $this->load->view('template/template',array("isi" => "template/halaman_utama"));;
	}

	function aksi_login() {
		$data_user = $this->m_welcome->cek_login($this->input->post('username'), hash('sha512', $this->input->post('password')));
		if ($data_user != null) {
			
			$array_data_user = array(
				'id'  => $data_user->id,
				'username'  => $data_user->username,
				'nama'  => $data_user->nama,
				'level'  => $data_user->level,
				'login'  => true
			);

			$this->session->set_userdata($array_data_user);

			redirect(base_url());
		} else {
			redirect(base_url('?error=1'));
		}
	}
}
