<?php

class Pustaka {

	function tanggal_indo($tanggal) {
		return date("d-m-Y", strtotime($tanggal));
	}	
	 
	function tanggal_indo_string($param_tanggal) {
		$tanggal = date("d", strtotime($param_tanggal));
		$bulan = date("n", strtotime($param_tanggal));
		$tahun = date("Y", strtotime($param_tanggal));
		
		switch ($bulan) {
			case 1:
				$bulan_jadi = "Januari";
				break;
			
			case 2:
				$bulan_jadi = "Februari";
				break;
			
			case 3:
				$bulan_jadi = "Maret";
				break;
			
			case 4:
				$bulan_jadi = "April";
				break;
			
			case 5:
				$bulan_jadi = "Mei";
				break;
			
			case 6:
				$bulan_jadi = "Juni";
				break;
			
			case 7:
				$bulan_jadi = "Juli";
				break;
			
			case 8:
				$bulan_jadi = "Agustus";
				break;
			
			case 9:
				$bulan_jadi = "September";
				break;
			
			case 10:
				$bulan_jadi = "Oktober";
				break;
			
			case 11:
				$bulan_jadi = "November";
				break;
			
			case 12:
				$bulan_jadi = "Desember";
				break;
						
			default:
				$bulan_jadi = "ERROR !!!";
				break;
		}

		return $tanggal . ' ' . $bulan_jadi . ' ' . $tahun;
	}	
	 
}

?>