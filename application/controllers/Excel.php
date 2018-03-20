<?php

/**
* 
*/
class Excel extends CI_Controller

{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_excel');
	}

	function export_masuk()
	{

	}	
}