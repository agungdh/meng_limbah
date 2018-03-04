<?php
class M_fakultas extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_fakultas(){
		$sql = "SELECT *
				FROM fakultas";
		$query = $this->db->query($sql, array());
		$row = $query->result();

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

	function tambah_fakultas($kode, $nama){
		$sql = "INSERT INTO fakultas
				SET kode = ?,
				nama = ?";
		$query = $this->db->query($sql, array($kode, $nama));
	}

	function ubah_fakultas($kode, $nama, $id){
		$sql = "UPDATE fakultas
				SET kode = ?,
				nama = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($kode, $nama, $id));
	}

	function hapus_fakultas($id){
		$sql = "DELETE FROM fakultas
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}

}
?>