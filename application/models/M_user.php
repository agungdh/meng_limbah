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

	function ambil_unit_dari_id_user($id_user){
		$sql = "SELECT p.unit
				FROM user u, unit p
				WHERE u.id = p.id
				AND u.id = ?";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->row();

		return $row;
	}

	function ambil_unit(){
		$sql = "SELECT *
				FROM unit";
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

	function tambah_user($username, $password, $level, $id){
		$sql = "INSERT INTO user
				SET username = ?,
				password = ?,
				level = ?,
				id = ?";
		$query = $this->db->query($sql, array($username, $password, $level, $id));
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