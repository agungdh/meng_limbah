<?php
class M_butir extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_data_substandar_dari_id_butir($id_butir){
		$sql = "SELECT *
				FROM v_butir
				WHERE id_butir = ?";
		$query = $this->db->query($sql, array($id_butir));
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

	function ambil_butir($id_substandar){
		$sql = "SELECT *
				FROM butir
				WHERE substandar_id = ?";
		$query = $this->db->query($sql, array($id_substandar));
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

	function ambil_substandar_id($id_substandar){
		$sql = "SELECT *
				FROM substandar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_substandar));
		$row = $query->row();

		return $row;
	}

	function ambil_butir_id($id_butir){
		$sql = "SELECT *
				FROM butir
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_butir));
		$row = $query->row();

		return $row;
	}

	function tambah_butir($nomor, $nama, $id_substandar){
		$sql = "INSERT INTO butir
				SET nomor = ?,
				nama = ?,
				substandar_id = ?";
		$query = $this->db->query($sql, array($nomor, $nama, $id_substandar));
	}	

	function ubah_butir($nomor, $nama, $id){
		$sql = "UPDATE butir
				SET nomor = ?,
				nama = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($nomor, $nama, $id));
	}	

	function hapus_butir($id){
		$sql = "DELETE FROM butir
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}	

}
?>