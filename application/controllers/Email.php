<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index() {
		$data['isi'] = "email/index";
		$data['data']['email'] = $this->db->get('email')->row();
		
		$this->load->view("template/template", $data);
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			$data[$key] = $value;
		}
		$this->db->update('email', $data, null);
		redirect(base_url());
	}

}
