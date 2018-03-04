<?php

class Pustaka {

	function tanggal_indo($tanggal) {
		return date("d-m-Y", strtotime($tanggal));
	}	
	 
}

?>