<?php
class M_limbah extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ambil_limbah(){
		$sql = "SELECT l.id, l.id_sifat, l.id_kategori, l.kode, l.limbah, j.sifat, g.kategori, g.masa_berlaku_hari
				FROM limbah l, sifat j, kategori g
				WHERE l.id_sifat = j.id
				AND l.id_kategori = g.id";
		$query = $this->db->query($sql, array());
		$row = $query->result();
		return $row;
	}

}
?>