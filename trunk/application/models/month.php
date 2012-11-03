<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Month extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for view table

//SELECT
		function month($date_start, $date_end)
			{
				//must add 1 to te month
				return $this->db->query("SELECT PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM '$date_end'), EXTRACT(YEAR_MONTH FROM '$date_start')) AS month");
			}
	}
?>