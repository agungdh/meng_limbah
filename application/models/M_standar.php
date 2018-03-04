<?php
class M_standar extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_versi_dari_id_standar($id_standar){
		$sql = "SELECT *
				FROM v_standar
				WHERE id_standar = ?";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->row();

		return $row;
	}

	function ambil_standar($id_versi){
		$sql = "SELECT *
				FROM standar
				WHERE versi_id = ?";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->result();

		return $row;
	}

	function ambil_versi(){
		$sql = "SELECT *
				FROM versi";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_versi_id($id_versi){
		$sql = "SELECT *
				FROM versi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->row();

		return $row;
	}

	function ambil_standar_id($id_standar){
		$sql = "SELECT *
				FROM standar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->row();

		return $row;
	}

	function tambah_standar($nomor, $nama, $id_versi){
		$sql = "INSERT INTO standar
				SET nomor = ?,
				nama = ?,
				versi_id = ?";
		$query = $this->db->query($sql, array($nomor, $nama, $id_versi));
	}	

	function ubah_standar($nomor, $nama, $id){
		$sql = "UPDATE standar
				SET nomor = ?,
				nama = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($nomor, $nama, $id));
	}	

	function hapus_standar($id){
		$sql = "DELETE FROM standar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}	

}
?>