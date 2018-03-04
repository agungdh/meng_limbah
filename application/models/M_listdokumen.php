<?php
class M_listdokumen extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_versi_id($id_versi){
		$sql = "SELECT *
				FROM versi
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->row();

		return $row;
	}

	function ambil_data_butir_dari_id_listdokumen($id_listdokumen){
		$sql = "SELECT *
				FROM v_listdokumen
				WHERE id_listdokumen = ?";
		$query = $this->db->query($sql, array($id_listdokumen));
		$row = $query->row();

		return $row;
	}

	function ambil_listdokumen($id_butir){
		$sql = "SELECT *
				FROM listdokumen
				WHERE butir_id = ?";
		$query = $this->db->query($sql, array($id_butir));
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

	function ambil_butir_id($id_butir){
		$sql = "SELECT *
				FROM butir
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_butir));
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

	function ambil_standar_id($id_standar){
		$sql = "SELECT *
				FROM standar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->row();

		return $row;
	}

	function ambil_listdokumen_id($id_listdokumen){
		$sql = "SELECT *
				FROM listdokumen
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_listdokumen));
		$row = $query->row();

		return $row;
	}

	function tambah_listdokumen($keterangan, $tipe, $id_butir){
		$sql = "INSERT INTO listdokumen
				SET keterangan = ?,
				tipe = ?,
				butir_id = ?";
		$query = $this->db->query($sql, array($keterangan, $tipe, $id_butir));
	}	

	function ubah_listdokumen($keterangan, $tipe, $id){
		$sql = "UPDATE listdokumen
				SET keterangan = ?,
				tipe = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($keterangan, $tipe, $id));
	}	

	function hapus_listdokumen($id){
		$sql = "DELETE FROM listdokumen
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}	

}
?>