<?php
class M_keluar extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_limbah_keluar($id_unit, $b1, $b2, $thn){
		$sql = "SELECT *, k.id id_keluar
				FROM keluar k, limbah l, pengangkut p
				WHERE k.id_limbah = l.id
				AND k.id_pengangkut = p.id
				AND k.id_unit = ?
				AND month(tanggal) BETWEEN ? AND ?
				AND year(tanggal) = ?";
		$query = $this->db->query($sql, array($id_unit, $b1, $b2, $thn));
		$row = $query->result();
		return $row;
	}

	function ambil_limbah(){
		$sql = "SELECT *
				FROM limbah";
		$query = $this->db->query($sql, array());
		$row = $query->result();
		return $row;
	}

	function ambil_pengangkut(){
		$sql = "SELECT *
				FROM pengangkut";
		$query = $this->db->query($sql, array());
		$row = $query->result();
		return $row;
	}

	function ambil_keluar_id($id_keluar){
		$sql = "SELECT *
				FROM keluar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_keluar));
		$row = $query->row();
		
		return $row;
	}

	function tambah_limbah_keluar($id_unit, $id_limbah, $tanggal, $id_pengangkut, $jumlah, $no_dokumen){
		$sql = "INSERT INTO keluar
				SET id_unit = ?,
				id_limbah = ?,
				tanggal = ?,
				id_pengangkut = ?,
				jumlah = ?,
				no_dokumen = ?";
		$query = $this->db->query($sql, array($id_unit, $id_limbah, $tanggal, $id_pengangkut, $jumlah, $no_dokumen));

		return $this->db->insert_id();
	}

	function ubah_limbah_keluar($id_keluar, $id_limbah, $tanggal, $id_pengangkut, $jumlah, $no_dokumen){
		$sql = "UPDATE keluar
				SET id_limbah = ?,
				tanggal = ?,
				id_pengangkut = ?,
				jumlah = ?,
				no_dokumen = ?
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_limbah, $tanggal, $id_pengangkut, $jumlah, $no_dokumen, $id_keluar));
	}

	function hapus_limbah_keluar($id_keluar){
		$sql = "DELETE FROM keluar
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_keluar));
	}

}
?>