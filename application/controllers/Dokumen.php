<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_dokumen');
	}

	function index($id) {
		$data['isi'] = "dokumen/index";
		$data['data']['pengajuan'] = $this->m_dokumen->ambil_pengajuan($id);
		$data['data']['standar'] = $this->m_dokumen->ambil_standar($data['data']['pengajuan']->versi_id);
		
		$this->load->view("template/template", $data);
	}

	function upload() {
		$id_pengajuan = $this->input->post('id_pengajuan');
		$pengajuan = $this->m_dokumen->ambil_pengajuan($id_pengajuan);
		$list_dokumen = $this->m_dokumen->ambil_listdokumen($pengajuan->versi_id);
		$versi = $this->m_dokumen->ambil_versi($pengajuan->versi_id);
		$user = $this->m_dokumen->ambil_user($pengajuan->user_id);
		$dokumen = $_FILES['dokumen'];

		foreach ($list_dokumen as $item) {
			if ($dokumen['size'][$item->id_listdokumen] != 0){
				
				if ($user->level == 3) {
					$prodi = $this->m_dokumen->ambil_prodi($user->prodi_id);
					$fakultas = $this->m_dokumen->ambil_fakultas($prodi->fakultas_id);
					$awal = $fakultas->kode . '/' . $prodi->kode; 
				} elseif ($user->level == 2) {
					$awal = 'univ'; 
				} else {
					$awal = "ERROR !!!";
				}

				@mkdir(
					'upload'
					. '/' . $awal
					. '/' . $pengajuan->tahun_borang 
					. '/' . $versi->nama 
					. '/standar_' . $item->nomor_standar 
					. '/substandar_' . $item->nomor_substandar
					. '/butir_' . $item->nomor_butir . '/'
				, 0755, true);
				$cek_dokumen = $this->m_dokumen->cek_dokumen($item->id_listdokumen, $pengajuan->id);
				if ($cek_dokumen != null) {
					$this->m_dokumen->hapus_dokumen($item->id_listdokumen, $pengajuan->id);
					unlink($cek_dokumen->url);
				} 
				
				$dokumen_upload = $this->m_dokumen->tambah_dokumen(
					'_' . $dokumen['name'][$item->id_listdokumen],
					$dokumen['name'][$item->id_listdokumen],
					$dokumen['type'][$item->id_listdokumen],
					'upload'
					. '/' . $awal
					. '/' . $pengajuan->tahun_borang 
					. '/' . $versi->nama 
					. '/standar_' . $item->nomor_standar 
					. '/substandar_' . $item->nomor_substandar
					. '/butir_' . $item->nomor_butir
					. '/',
					$item->id_listdokumen,
					$pengajuan->id
				);	

				move_uploaded_file($dokumen['tmp_name'][$item->id_listdokumen], $dokumen_upload->url);
			}
		}
		redirect(base_url('dokumen/index/'.$pengajuan->id.'?tab='.$this->input->post('last_tab')));
	}

}
