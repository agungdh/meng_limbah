<?php
class M_masuk extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_parent_limbah($id_user){
		$sql = "SELECT id_limbah, limbah
				FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_jenis = j.id
				AND l.id_golongan = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND m.id_user = ?
				GROUP BY id_limbah";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->result();

		return $row;
	}

	function ambil_child_limbah($id_limbah, $id_user){
		$sql = "SELECT *
				FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_jenis = j.id
				AND l.id_golongan = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND l.id = ?
				AND m.id_user = ?
				ORDER BY sl.id, m.tanggal";
		$query = $this->db->query($sql, array($id_limbah, $id_user));
		$row = $query->result();

		return $row;
	}

}
?>