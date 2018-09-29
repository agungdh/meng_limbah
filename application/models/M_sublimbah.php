<?php
class M_sublimbah extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_sublimbah($id_limbah){
		$sql = "SELECT sl.id, sl.id_limbah, sl.sub_limbah, l.id_sifat, l.id_kategori, l.kode, l.limbah, j.sifat, g.kategori, g.masa_berlaku_hari
				FROM limbah l, sifat j, kategori g, sub_limbah sl
				WHERE l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND sl.id_limbah= l.id
				AND l.id = ?";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->result();
		return $row;
	}

	function ambil_sublimbah_id($id){
		$sql = "SELECT sl.id, sl.id_limbah, sl.sub_limbah, l.id_sifat, l.id_kategori, l.kode, l.limbah, j.sifat, g.kategori, g.masa_berlaku_hari
				FROM limbah l, sifat j, kategori g, sub_limbah sl
				WHERE l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND sl.id_limbah= l.id
				AND sl.id = ?";
		$query = $this->db->query($sql, array($id));
		$row = $query->row();
		return $row;
	}

	function ambil_limbah($id_limbah){
		$sql = "SELECT l.id, l.id_sifat, l.id_kategori, l.kode, l.limbah, j.sifat, g.kategori, g.masa_berlaku_hari
				FROM limbah l, sifat j, kategori g
				WHERE l.id_sifat = j.id
				AND l.id_kategori = g.id
				AND l.id = ?";
		$query = $this->db->query($sql, array($id_limbah));
		$row = $query->row();
		return $row;
	}

}
?>