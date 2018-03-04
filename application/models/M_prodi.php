<?php
class M_prodi extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_fakultas_dari_id_prodi($id_prodi){
		$sql = "SELECT *
				FROM v_prodi
				WHERE id_prodi = ?";
		$query = $this->db->query($sql, array($id_prodi));
		$row = $query->row();

		return $row;
	}

	function ambil_fakultas_id($id_fakultas){
		$sql = "SELECT *
				FROM fakultas
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_fakultas));
		$row = $query->row();

		return $row;
	}

	function ambil_prodi($id_fakultas){
		$sql = "SELECT *
				FROM prodi
				WHERE fakultas_id = ?";
		$query = $this->db->query($sql, array($id_fakultas));
		$row = $query->result();

		return $row;
	}

	function ambil_prodi_id($id_prodi){
		$sql = "SELECT *
				FROM prodi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_prodi));
		$row = $query->row();

		return $row;
	}

	function tambah_prodi($kode, $nama, $id_fakultas){
		$sql = "INSERT INTO prodi
				SET kode = ?,
				nama = ?,
				fakultas_id = ?";
		$query = $this->db->query($sql, array($kode, $nama, $id_fakultas));
	}

	function ubah_prodi($kode, $nama, $id){
		$sql = "UPDATE prodi
				SET kode = ?,
				nama = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($kode, $nama, $id));
	}

	function hapus_prodi($id){
		$sql = "DELETE FROM prodi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}


}
?>