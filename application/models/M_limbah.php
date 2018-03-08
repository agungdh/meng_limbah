<?php
class M_limbah extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_limbah_id($id_limbah){
		$sql = "SELECT l.id, l.id_jenis, l.id_golongan, l.kode, l.limbah, j.jenis, g.golongan, g.masa_berlaku_hari
				FROM limbah l, jenis j, golongan g
				WHERE l.id_jenis = j.id
				AND l.id_golongan = g.id
				AND l.id = ?";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->result();
		return $row;
	}

	function ambil_limbah(){
		$sql = "SELECT l.id, l.id_jenis, l.id_golongan, l.kode, l.limbah, j.jenis, g.golongan, g.masa_berlaku_hari
				FROM limbah l, jenis j, golongan g
				WHERE l.id_jenis = j.id
				AND l.id_golongan = g.id";
		$query = $this->db->query($sql, array());
		$row = $query->result();
		return $row;
	}

}
?>