<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_neraca');	
	}

	function index() {
		$data['isi'] = "neraca/index";
		if ($this->input->get('tahun') == null) {
			$data['data']['tahun'] = date('Y');
		} else {
			$data['data']['tahun'] = $this->input->get('tahun');
		}
		if ($this->input->get('bulan') == null) {
			$data['data']['bulan'] = date('n');
		} else {
			$data['data']['bulan'] = $this->input->get('bulan');
		}
		$data['data']['limbah'] = $this->m_neraca->ambil_limbah();
		
		$this->load->view("template/template", $data);
	}

}
