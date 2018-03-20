<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_excel extends CI_Model {
 
    //constructor untuk class M_excel
    function __construct(){
        //load constructor CI_Model
        parent::__construct();
 
        //load database
        $this->load->database();
    }
 
    // ambil data dari tabel 'tbl_buku'
    function getAll() {
        $this->db->select('*');
        $this->db->from('unit');
        $query = $this->db->get();
        return $query->result();
    }
}
 
 /* End of file M_excel.php */
 /* Location: ./application/models/M_excel.php */

// class M_export extends CI_Model{	
// 	function __construct(){
// 		parent::__construct();		
// 	}

// 	function ambil_parent_limbah($id_user, $b1, $b2, $thn){
// 		$sql = "SELECT id_limbah, limbah
// 				FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
// 				WHERE sl.id_limbah = l.id
// 				AND l.id_jenis = j.id
// 				AND l.id_golongan = g.id
// 				AND m.id_sub_limbah = sl.id
// 				AND m.id_sumber = s.id
// 				AND m.id_user = ?
// 				AND month(tanggal) BETWEEN ? AND ?
// 				AND year(tanggal) = ?
// 				GROUP BY id_limbah";
// 		$query = $this->db->query($sql, array($id_user, $b1, $b2, $thn));
// 		$row = $query->result();
// 		return $row;
// 	}

// 	function ambil_child_limbah($id_limbah, $id_user, $b1, $b2, $thn){
// 		$sql = "SELECT *, m.id id_masuk
// 				FROM sub_limbah sl, limbah l, golongan g, jenis j, masuk m, sumber s
// 				WHERE sl.id_limbah = l.id
// 				AND l.id_jenis = j.id
// 				AND l.id_golongan = g.id
// 				AND m.id_sub_limbah = sl.id
// 				AND m.id_sumber = s.id
// 				AND l.id = ?
// 				AND m.id_user = ?
// 				AND month(tanggal) BETWEEN ? AND ?
// 				AND year(tanggal) = ?
// 				ORDER BY sl.id, m.tanggal";
// 		$query = $this->db->query($sql, array($id_limbah, $id_user, $b1, $b2, $thn));
// 		$row = $query->result();

// 		return $row;
// 	}

// 	function ambil_sub_limbah(){
// 		$sql = "SELECT *
// 				FROM sub_limbah";
// 		$query = $this->db->query($sql, array());
// 		$row = $query->result();

// 		return $row;
// 	}

// 	function ambil_sumber(){
// 		$sql = "SELECT *
// 				FROM sumber";
// 		$query = $this->db->query($sql, array());
// 		$row = $query->result();

// 		return $row;
// 	}

// 	function ambil_masuk_id($id_masuk){
// 		$sql = "SELECT *
// 				FROM masuk
// 				WHERE id = ?";
// 		$query = $this->db->query($sql, array($id_masuk));
// 		$row = $query->row();

// 		return $row;
// 	}

// }
// ?>