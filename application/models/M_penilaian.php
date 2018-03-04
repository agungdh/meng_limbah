<?php
class M_penilaian extends CI_Model{	
	function __construct(){
		parent::__construct();		
	}

	function ubah_penilaian($tanggal, $id_pengajuan){
		$sql = "UPDATE penilaian
				SET tanggal = ?,
				pengajuan_id = ?";
		$query = $this->db->query($sql, array($tanggal, $id_pengajuan));
	}

	function tambah_penilaian($tanggal, $id_pengajuan){
		$sql = "INSERT INTO penilaian
				SET tanggal = ?,
				pengajuan_id = ?";
		$query = $this->db->query($sql, array($tanggal, $id_pengajuan));
		
		return $this->db->insert_id();
	}

	function tambah_detil_penilaian($id_penilaian, $id_butir, $nilai){
		$sql = "INSERT INTO detilpenilaian
				SET penilaian_id = ?,
				butir_id = ?,
				nilai = ?";
		$query = $this->db->query($sql, array($id_penilaian, $id_butir, $nilai));
	}

	function ubah_detil_penilaian($id_penilaian, $id_butir, $nilai){
		$sql = "UPDATE detilpenilaian
				SET nilai = ?
				WHERE butir_id = ?
				AND penilaian_id = ?";
		$query = $this->db->query($sql, array($nilai, $id_butir, $id_penilaian));
	}

	function hapus_penilaian($id_penilaian){
		$sql = "DELETE FROM detilpenilaian
				WHERE penilaian_id = ?";
		$query = $this->db->query($sql, array($id_penilaian));

		$sql = "DELETE FROM penilaian
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_penilaian));
	}

	function ambil_pengajuan(){
		$sql = "SELECT *
				FROM v_pengajuan";
		$query = $this->db->query($sql, array());
		$row = $query->result();

		return $row;
	}

	function cek_detil_penilaian($id_butir, $id_penilaian){
		$sql = "SELECT *
				FROM detilpenilaian
				WHERE butir_id = ?
				AND penilaian_id = ?";
		$query = $this->db->query($sql, array($id_butir, $id_penilaian));
		$row = $query->row();

		return $row;
	}

	function ambil_penilaian_id_pengajuan($id_pengajuan){
		$sql = "SELECT *
				FROM penilaian
				WHERE pengajuan_id = ?";
		$query = $this->db->query($sql, array($id_pengajuan));
		$row = $query->result();

		return $row;
	}

	function ambil_jumlah_butir($id_versi){
		$sql = "SELECT count(*) total
				FROM standar st, substandar ss, butir b
				WHERE b.substandar_id = ss.id
				AND ss.standar_id = st.id
				AND st.versi_id=?";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->row();

		return $row->total;
	}

	function ambil_nilai($id_penilaian){
		$sql = "SELECT sum(nilai) nilai
				FROM detilpenilaian
				WHERE penilaian_id = ?";
		$query = $this->db->query($sql, array($id_penilaian));
		$row = $query->row();

		return $row->nilai;
	}

	function ambil_pengajuan_id($id_pengajuan){
		$sql = "SELECT *
				FROM v_pengajuan
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_pengajuan));
		$row = $query->row();

		return $row;
	}

	function ambil_nilai_butir($id_penilaian, $id_butir){
		$sql = "SELECT *
				FROM detilpenilaian
				WHERE penilaian_id = ?
				AND butir_id = ?";
		$query = $this->db->query($sql, array($id_penilaian, $id_butir));
		$row = $query->row();

		return $row;
	}

	function ambil_penilaian_id($id_penilaian){
		$sql = "SELECT *
				FROM penilaian
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_penilaian));
		$row = $query->row();

		return $row;
	}

	function ambil_data_user($id_user){
		$sql = "SELECT *
				FROM user
				WHERE id = ?";
		$query = $this->db->query($sql, array($id_user));
		$row = $query->row();

		return $row;
	}

	function ambil_standar($id_versi){
		$sql = "SELECT *
				FROM standar
				WHERE versi_id = ?
				ORDER BY nomor";
		$query = $this->db->query($sql, array($id_versi));
		$row = $query->result();

		return $row;
	}

	function ambil_detail($id_standar){
		$sql = "SELECT *
				FROM v_pengajuan_dokumen
				WHERE id_standar = ?
				ORDER BY nomor_standar, nomor_substandar, nomor_butir, id_listdokumen";
		$query = $this->db->query($sql, array($id_standar));
		$row = $query->result();

		return $row;
	}

	function ambil_dokumen($id_pengajuan, $id_listdokumen){
		$sql = "SELECT *
				FROM dokumen
				WHERE pengajuan_id = ?
				AND listdokumen_id = ?";
		$query = $this->db->query($sql, array($id_pengajuan, $id_listdokumen));
		$row = $query->row();

		return $row;
	}



}
?>