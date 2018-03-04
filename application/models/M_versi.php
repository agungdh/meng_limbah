<?php
class M_versi extends CI_Model{	
	function __construct(){
		parent::__construct();		
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

	function tambah_versi($nama, $versi, $tahun){
		$sql = "INSERT INTO versi
				SET nama = ?,
				versi = ?,
				tahun = ?";
		$query = $this->db->query($sql, array($nama, $versi, $tahun));
	}	

	function ubah_versi($nama, $versi, $tahun, $id){
		$sql = "UPDATE versi
				SET nama = ?,
				versi = ?,
				tahun = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($nama, $versi, $tahun, $id));
	}	

	function hapus_versi($id){
		$sql = "DELETE FROM versi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}	

}
?>