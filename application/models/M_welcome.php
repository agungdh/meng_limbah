<?php
class M_welcome extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function cek_login($username, $password){
		$sql = "SELECT *
				FROM user
				WHERE username = ?
				AND password = ?";
		$query = $this->db->query($sql, array($username, $password));
		$row = $query->row();

		return $row;
	}

}
?>