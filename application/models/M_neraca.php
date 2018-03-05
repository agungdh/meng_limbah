<?php
class M_neraca extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_limbah(){
		$sql = "SELECT *
				FROM limbah";
		$query = $this->db->query($sql, array());
		$row = $query->result();
		return $row;
	}

	function ambil_masuk_dari_limbah($id_limbah){
		$sql = "SELECT *
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				LIMIT 1";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_keluar_dari_limbah($id_limbah){
		$sql = "SELECT *
				FROM keluar k, pengangkut p
				WHERE k.id_pengangkut = p.id
				LIMIT 1";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah($id_limbah, $bulan, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND month(tanggal) = ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_limbah, $bulan, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah($id_limbah, $bulan, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_limbah = ?
				AND month(tanggal) = ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_limbah, $bulan, $tahun));
		$row = $query->row();
		return $row;
	}

	// function ambil_limbah_masuk($id_user, $bulan, $tahun){
	// 	$sql = "SELECT id_limbah, limbah, sumber
	// 			FROM masuk m, sub_limbah sl, limbah l
	// 			WHERE m.id_sub_limbah = sl.id
	// 			AND sl.id_limbah = l.id
	// 			AND id_user = ?
	// 			AND month(tanggal) = ?
	// 			AND year(tanggal) = ?
	// 			GROUP BY id_limbah";
	// 	$query = $this->db->query($sql, array($id_user, $bulan, $tahun));
	// 	$row = $query->result();
	// 	return $row;
	// }

	// function ambil_limbah_masuk($id_user, $bulan, $tahun){
	// 	$sql = "SELECT *
	// 			FROM masuk
	// 			WHERE id_user = ?
	// 			AND month(tanggal) = ?
	// 			AND year(tanggal) = ?";
	// 	$query = $this->db->query($sql, array($id_user, $bulan, $tahun));
	// 	$row = $query->result();
	// 	return $row;
	// }

	// function ambil_keluar($id_user, $bulan, $tahun){
	// 	$sql = "SELECT *
	// 			FROM keluar
	// 			WHERE id_user = ?
	// 			AND month(tanggal) = ?
	// 			AND year(tanggal) = ?";
	// 	$query = $this->db->query($sql, array($id_user, $bulan, $tahun));
	// 	$row = $query->result();
	// 	return $row;
	// }

}
?>