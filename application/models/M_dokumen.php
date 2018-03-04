<?php
class M_dokumen extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function cek_dokumen($id_listdokumen, $id_pengajuan){
		$sql = "SELECT *
				FROM dokumen
				WHERE listdokumen_id = ?
				AND pengajuan_id = ?";
		$query = $this->db->query($sql, array($id_listdokumen, $id_pengajuan));
		$row = $query->row();

		return $row;
	}

	function hapus_dokumen($id_listdokumen, $id_pengajuan){
		$sql = "DELETE FROM dokumen
				WHERE listdokumen_id = ?
				AND pengajuan_id = ?";
		$query = $this->db->query($sql, array($id_listdokumen, $id_pengajuan));
	}

	function ambil_pengajuan($id_pengajuan){
		$sql = "SELECT *
				FROM pengajuan
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_pengajuan));
		$row = $query->row();

		return $row;
	}

	function tambah_dokumen($nama, $nama_asli, $mime, $url, $id_listdokumen, $id_pengajuan){
		$sql = "INSERT INTO dokumen
				SET nama_file = ?,
				nama_file_asli = ?,
				mime = ?,
				url = ?,
				listdokumen_id = ?,
				pengajuan_id = ?";
		$query = $this->db->query($sql, array($nama, $nama_asli, $mime, $url, $id_listdokumen, $id_pengajuan));

		$insert_id = $this->db->insert_id();

		$nama_file_fix = $insert_id . $nama;
		$url_fix = $url . $nama_file_fix;

		$sql = "UPDATE dokumen
				SET nama_file = ?,
				url = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($nama_file_fix, $url_fix, $insert_id));

		$sql = "SELECT *
				FROM dokumen
				WHERE id = ?";
		$query = $this->db->query($sql, array($insert_id));
		return $query->row();
	}

	function ambil_user($id_user){
		$sql = "SELECT *
				FROM user
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->row();

		return $row;
	}

	function ambil_prodi($id_prodi){
		$sql = "SELECT *
				FROM prodi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_prodi));
		$row = $query->row();

		return $row;
	}

	function ambil_fakultas($id_fakultas){
		$sql = "SELECT *
				FROM fakultas
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_fakultas));
		$row = $query->row();

		return $row;
	}

	function ambil_versi($id_versi){
		$sql = "SELECT *
				FROM versi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->row();

		return $row;
	}

	function ambil_listdokumen($id_versi){
		$sql = "SELECT *
				FROM v_pengajuan_dokumen
				WHERE versi_id = ?";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->result();

		return $row;
	}

	function ambil_standar($id_versi){
		$sql = "SELECT *
				FROM standar
				WHERE versi_id = ?
				ORDER BY nomor";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->result();

		return $row;
	}

	function ambil_dokumen($id_pengajuan, $id_listdokumen){
		$sql = "SELECT *
				FROM dokumen
				WHERE pengajuan_id = ?
				AND listdokumen_id = ?";
		$query = $this->db->query($sql, array($id_pengajuan, $id_listdokumen));
		$row = $query->row();

		return $row;
	}

	function ambil_detail($id_standar){
		$sql = "SELECT *
				FROM v_pengajuan_dokumen
				WHERE id_standar = ?
				ORDER BY nomor_standar, nomor_substandar, nomor_butir, id_listdokumen";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->result();

		return $row;
	}

}
?>