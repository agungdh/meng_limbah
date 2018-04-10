<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['isi'] = "profil/index";
		$data['data']['user'] = $this->db->get_where("user", array("id" => $this->session->id))->row();

		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		$where['id'] = $this->input->post('id');
		$this->db->update('user', $data, $where);
		$this->session->set_userdata('nama', $data['nama']);
		redirect(base_url());
	}

	function aksi_ubah_password() {
		// $this->m_profil->ubah_profil(
		// 	hash("sha512", $this->input->post('password')),
		// 	$this->input->post('id')
		// );

		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		$where['id'] = $this->input->post('id');
		$data['password'] = hash('sha512', $data['password']); 
		$this->db->update('user', $data, $where);

		redirect(base_url());

		// var_dump($this->input->post('data'));
	}

}
