<?php
class M_user extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_user(){
		$sql = "SELECT *
				FROM user";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_prodi_dari_id_user($id_user){
		$sql = "SELECT p.nama
				FROM user u, prodi p
				WHERE u.prodi_id = p.id
				AND u.id = ?";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->row();

		return $row;
	}

	function ambil_prodi(){
		$sql = "SELECT *
				FROM v_prodi";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_user_id($id_user){
		$sql = "SELECT *
				FROM user
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->row();

		return $row;
	}

	function tambah_user($username, $password, $level, $id_prodi){
		$sql = "INSERT INTO user
				SET username = ?,
				password = ?,
				level = ?,
				prodi_id = ?";
		$query = $this->db->query($sql, array($username, $password, $level, $id_prodi));
	}

	function ubah_user($password, $id){
		$sql = "UPDATE user
				SET password = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($password, $id));
	}

	function hapus_user($id){
		$sql = "DELETE FROM user
				WHERE id = ?";
		$query = $this->db->query($sql, array($id));
	}

}
?>