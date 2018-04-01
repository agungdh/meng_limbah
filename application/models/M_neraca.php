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

	function ambil_masuk_dari_limbah($id_unit, $id_limbah){
		$sql = "SELECT *
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE m.id_unit = ?
				AND l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				LIMIT 1";
		$query = $this->db->query($sql, array($id_unit, $id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_masuk_dari_limbah_semuasemua($id_limbah){
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

	function ambil_keluar_dari_limbah($id_unit, $id_limbah){
		$sql = "SELECT *
				FROM keluar k, pengangkut p
				WHERE k.id_unit = ?
				AND k.id_pengangkut = p.id
				AND k.id_limbah = ?
				LIMIT 1";
		$query = $this->db->query($sql, array($id_unit, $id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_keluar_dari_limbah_semuasemua($id_limbah){
		$sql = "SELECT *
				FROM keluar k, pengangkut p
				WHERE k.id_pengangkut = p.id
				AND k.id_limbah = ?
				LIMIT 1";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah_semuasemua($id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE m.id_unit = ?
				AND l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah_semuasemua($id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_limbah = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_unit = ?
				AND id_limbah = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah_lalu($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE m.id_unit = ?
				AND l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				";
		$query = $this->db->query($sql, array($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_masuk_dari_limbah_lalu_semuasemua($id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM masuk m, sub_limbah sl, limbah l, sumber s
				WHERE l.id = ?
				AND m.id_sub_limbah = sl.id
				AND sl.id_limbah = l.id
				AND m.id_sumber = s.id
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				";
		$query = $this->db->query($sql, array($id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah_lalu($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_unit = ?
				AND id_limbah = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				";
		$query = $this->db->query($sql, array($id_unit, $id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

	function ambil_jumlah_keluar_dari_limbah_lalu_semuasemua($id_limbah, $bulan_awal, $bulan_akhir, $tahun){
		$sql = "SELECT sum(jumlah) total
				FROM keluar
				WHERE id_limbah = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?
				";
		$query = $this->db->query($sql, array($id_limbah, $bulan_awal, $bulan_akhir, $tahun));
		$row = $query->row();
		return $row;
	}

}
?>