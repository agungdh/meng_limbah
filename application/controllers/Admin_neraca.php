<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_neraca extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('m_neraca'); 
    $this->load->library('pustaka');
  }

  function index($unit_id) {
    $data['isi'] = "admin_neraca/index";
    $data['data']['unit_id'] = $unit_id;
    if ($this->input->get('tahun') == null) {
      $data['data']['tahun'] = date('Y');
    } else {
      $data['data']['tahun'] = $this->input->get('tahun');
    }
    if ($this->input->get('triwulan') == null) {
      $triwulan = $this->pustaka->ambil_triwulan_dari_tanggal(date('Y-m-d'));
      $data['data']['triwulan'] = $triwulan;
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($triwulan);
    } else {
      $data['data']['triwulan'] = $this->input->get('triwulan');
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
    }
    $data['data']['limbah'] = $this->m_neraca->ambil_limbah();
    
    $this->load->view("template/template", $data);
  }

  function semuasemua() {
    $data['isi'] = "admin_neraca/indexsemuasemua";
    if ($this->input->get('tahun') == null) {
      $data['data']['tahun'] = date('Y');
    } else {
      $data['data']['tahun'] = $this->input->get('tahun');
    }
    if ($this->input->get('triwulan') == null) {
      $triwulan = $this->pustaka->ambil_triwulan_dari_tanggal(date('Y-m-d'));
      $data['data']['triwulan'] = $triwulan;
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($triwulan);
    } else {
      $data['data']['triwulan'] = $this->input->get('triwulan');
      $data['data']['awal_akhir_triwulan'] = $this->pustaka->ambil_awal_dan_akhir_triwulan($this->input->get('triwulan'));
    }
    $data['data']['limbah'] = $this->m_neraca->ambil_limbah();
    
    $this->load->view("template/template", $data);
  }

}
