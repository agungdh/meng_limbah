<?php
class M_substandar extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_standar_dari_id_substandar($id_substandar){
		$sql = "SELECT *
				FROM v_substandar
				WHERE id_substandar = ?";
		$query = $this->db->query($sql, array($id_substandar));
		$row = $query->row();

		return $row;
	}

	function ambil_substandar($id_standar){
		$sql = "SELECT *
				FROM substandar
				WHERE standar_id = ?";
		$query = $this->db->query($sql, array($id_standar));
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

	function ambil_standar_id($id_standar){
		$sql = "SELECT *
				FROM standar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->row();

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

	function ambil_substandar_id($id_substandar){
		$sql = "SELECT *
				FROM substandar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_substandar));
		$row = $query->row();

		return $row;
	}

	function tambah_substandar($nomor, $nama, $id_standar){
		$sql = "INSERT INTO substandar
				SET nomor = ?,
				nama = ?,
				standar_id = ?";
		$query = $this->db->query($sql, array($nomor, $nama, $id_standar));
	}	

	function ubah_substandar($nomor, $nama, $id){
		$sql = "UPDATE substandar
				SET nomor = ?,
				nama = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($nomor, $nama, $id));
	}	

	function hapus_substandar($id){
		$sql = "DELETE FROM substandar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}	

}
?>