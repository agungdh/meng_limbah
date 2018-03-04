<?php
class M_test extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	// function ambil_limbah_masuk(){
	// 	$sql = "SELECT *
	// 			FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
	// 			WHERE sl.id_limbah = l.id
	// 			AND l.id_jenis = j.id
	// 			AND l.id_golongan = g.id
	// 			AND m.id_sub_limbah = sl.id
	// 			AND m.id_sumber = s.id";
	// 	$query = $this->db->query($sql, array());
	// 	$row = $query->result();

	// 	return $row;
	// }

	function ambil_parent_limbah(){
		$sql = "SELECT id_limbah, limbah
				FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_jenis = j.id
				AND l.id_golongan = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				GROUP BY id_limbah";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_child_limbah($id_limbah){
		$sql = "SELECT *
				FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_jenis = j.id
				AND l.id_golongan = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND l.id = ?";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->result();

		return $row;
	}

}
?>