<?php
class M_universal extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function get($tabel) {
		return $this->db->get($tabel)->result();
	}

	function get_id($tabel, $id) {
		return $this->db->get_where($tabel, array('id' => $id))->row();
	}

	function insert($tabel, $data) {
		$this->db->insert($tabel, $data);
		return $this->db->insert_id();
	}

	function update($tabel, $data, $id) {
		$this->db->where('id', $id);
		$this->db->update($tabel, $data);
	}
	
	function delete($tabel, $id) {
		$this->db->delete($tabel, array('id' => $id));
	}

}
?>