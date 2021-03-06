<?php
class M_masuk extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_parent_limbah_semuasemua($b1, $b2, $thn){
		$sql = "SELECT id_limbah, limbah
				FROM sub_limbah sl, limbah l, kategori g, sifat j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				GROUP BY id_limbah";
		$query = $this->db->query($sql, array($b1, $b2, $thn));
		$row = $query->result();
		return $row;
	}

	function ambil_parent_limbah($id_unit, $b1, $b2, $thn){
		$sql = "SELECT id_limbah, limbah
				FROM sub_limbah sl, limbah l, kategori g, sifat j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND m.id_unit = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				GROUP BY id_limbah";
		$query = $this->db->query($sql, array($id_unit, $b1, $b2, $thn));
		$row = $query->result();
		return $row;
	}

	function ambil_child_limbah_semuasemua($id_limbah, $b1, $b2, $thn){
		$sql = "SELECT *, m.id id_masuk
				FROM sub_limbah sl, limbah l, kategori g, sifat j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND l.id = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				ORDER BY sl.id, m.tanggal";
		$query = $this->db->query($sql, array($id_limbah, $b1, $b2, $thn));
		$row = $query->result();

		return $row;
	}

	function ambil_child_limbah($id_limbah, $id_unit, $b1, $b2, $thn){
		$sql = "SELECT *, m.id id_masuk
				FROM sub_limbah sl, limbah l, kategori g, sifat j, masuk m, sumber s
				WHERE sl.id_limbah = l.id
				AND l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND m.id_sub_limbah = sl.id
				AND m.id_sumber = s.id
				AND l.id = ?
				AND m.id_unit = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				ORDER BY sl.id, m.tanggal";
		$query = $this->db->query($sql, array($id_limbah, $id_unit, $b1, $b2, $thn));
		$row = $query->result();

		return $row;
	}

	function ambil_sub_limbah(){
		$sql = "SELECT *
				FROM sub_limbah";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_sumber(){
		$sql = "SELECT *
				FROM sumber";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function ambil_masuk_id($id_masuk){
		$sql = "SELECT *
				FROM masuk
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_masuk));
		$row = $query->row();

		return $row;
	}

	function tambah_limbah_masuk($id_unit, $sub_limbah, $tanggal, $sumber, $jumlah){
		$sql = "INSERT INTO masuk
				SET id_unit = ?,
				id_sub_limbah = ?,
				tanggal = ?,
				id_sumber = ?,
				jumlah = ?";
		$query = $this->db->query($sql, array($id_unit, $sub_limbah, $tanggal, $sumber, $jumlah));

		return $this->db->insert_id();
	}

	function ubah_limbah_masuk($id_masuk, $sub_limbah, $tanggal, $sumber, $jumlah){
		$sql = "UPDATE masuk
				SET id_sub_limbah = ?,
				tanggal = ?,
				id_sumber = ?,
				jumlah = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($sub_limbah, $tanggal, $sumber, $jumlah, $id_masuk));
	}

	function hapus_limbah_masuk($id_masuk){
		$sql = "DELETE FROM masuk
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_masuk));
	}

}
?>