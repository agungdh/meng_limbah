<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_welcome');
	}

	function index() {
		$halaman_utama = $this->session->level == 1 ? "template/halaman_utama_admin" : "template/halaman_utama_user";
		$data['tahun'] = $this->input->get('tahun') ?: date('Y');
	
		if ($this->input->get('tahun_masuk') != null) {
			$where_masuk['year(tanggal)'] = $this->input->get('tahun_masuk');
		}

		if ($this->input->get('tahun_keluar') != null) {
			$where_keluar['year(tanggal)'] = $this->input->get('tahun_keluar');
		}

		if ($this->input->get('unit_masuk') != null) {
			$where_masuk['id_unit'] = $this->input->get('unit_masuk');
		}

		if ($this->input->get('unit_keluar') != null) {
			$where_keluar['id_unit'] = $this->input->get('unit_keluar');
		}

		$triwulan[]['antara'] = "BETWEEN 1 AND 3";
		$triwulan[]['antara'] = "BETWEEN 4 AND 6";
		$triwulan[]['antara'] = "BETWEEN 7 AND 9";
		$triwulan[]['antara'] = "BETWEEN 10 AND 2";
		// var_dump($triwulan);
		foreach ($triwulan as $item) {
			// $where_masuk_unprotect['month(tanggal)'] = $item['antara'];
			$this->db->select_sum('jumlah');
			$this->db->where($where_masuk);
			$this->db->where("month(tanggal) " . $item['antara'], null, false);
			$data['masuk'][] = $this->db->get('masuk')->row();
			// echo "<p>" . $this->db->last_query() . "</p>";

			$this->db->select_sum('jumlah');
			$this->db->where($where_keluar);
			$this->db->where("month(tanggal) " . $item['antara'], null, false);
			$data['keluar'][] = $this->db->get('keluar')->row();
		}
		
		// $this->db->select_sum('jumlah');
		// $this->db->where($where_keluar);		
		// $data['keluar'] = $this->db->get('keluar')->row();

		var_dump($data);
		exit();

		$this->session->login != true ? $this->load->view("template/halaman_login") : $this->load->view('template/template',array("isi" => $halaman_utama, "data" => $data));
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

			if ($data_user->id_unit != null) {
				$array_data_user['id_unit'] = $data_user->id_unit;
				$array_data_user['unit'] = $this->m_welcome->ambil_unit_id($data_user->id_unit)->unit;			
			}

			$this->session->set_userdata($array_data_user);

			redirect(base_url());
		} else {
			redirect(base_url('?error=1'));
		}
	}
}
