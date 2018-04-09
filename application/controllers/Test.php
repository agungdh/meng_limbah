<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index($id_unit) {
		$where['id_unit'] = $id_unit;
		$this->db->where($where);
		$this->db->order_by('tanggal', 'asc');
		$db = $this->db->get('keluar')->result();
		foreach ($db as $item) {
			$this->paragraf_awal();

			echo $item->id;
			$this->ganti_baris();
			echo $item->tanggal;
			$this->ganti_baris();
			echo $item->jumlah;
			$this->ganti_baris();

			$this->paragraf_akhir();

			$this->paragraf_awal();
			$where['tanggal <='] = $item->tanggal;
			$this->db->where($where);
			$jumlah = 0;
			foreach ($this->db->get('masuk')->result() as $item2) {
				echo $item2->id;
				$this->ganti_baris();
				echo $item2->tanggal;
				$this->ganti_baris();
				echo $item2->jumlah;
				$this->ganti_baris();				
				$jumlah += $item2->jumlah;
			}
			$this->paragraf_akhir();
			
			$total = $jumlah - $item->jumlah;
			echo $jumlah . ' - ' . $item->jumlah . ' = ' . $total;

			$this->buat_garis();
		}
	}

	function paragraf_awal() {
		echo "<p>";
	}

	function paragraf_akhir() {
		echo "</p>";
	}

	function ganti_baris() {
		echo "<br>";
	}

	function buat_garis() {
		echo "<hr>";
	}

}