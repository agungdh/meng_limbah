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

	function ambil_masuk_dari_limbah($id_user, $id_limbah){
		$sql = "SELECT *
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE m.id_user = ?
				AND l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				LIMIT 1";
		$query = $this->db->query($sql, array($id_user, $id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_keluar_dari_limbah($id_user, $id_limbah){
		$sql = "SELECT *
				FROM keluar k, pengangkut p
				WHERE k.id_user = ?
				AND k.id_pengangkut = p.id
				AND k.id_limbah = ?
				LIMIT 1";
		$query = $this->db->query($sql, array($id_user, $id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah($id_user, $id_limbah, $bulan, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE m.id_user = ?
				AND l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND month(tanggal) = ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_user, $id_limbah, $bulan, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah($id_user, $id_limbah, $bulan, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_user = ?
				AND id_limbah = ?
				AND month(tanggal) = ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_user, $id_limbah, $bulan, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah_lalu($id_user, $id_limbah, $tanggal){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE m.id_user = ?
				AND l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND tanggal < ?";
		$query = $this->db->query($sql, array($id_user, $id_limbah, $tanggal));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah_lalu($id_user, $id_limbah, $tanggal){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_user = ?
				AND id_limbah = ?
				AND tanggal < ?";
		$query = $this->db->query($sql, array($id_user, $id_limbah, $tanggal));
		$row = $query->row();
		return $row;
	}

}
?>