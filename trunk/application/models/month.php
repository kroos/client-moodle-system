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
				//must add 1 to the month
				$y = $this->db->query("SELECT PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM '$date_end'), EXTRACT(YEAR_MONTH FROM '$date_start')) AS month");
				return $y;
			}

		function month_day($date_start, $month, $day)
			{
				return $this->db->query("SELECT DATE_ADD(DATE_ADD('$date_start', interval $month MONTH), interval $day day) AS nmp");
			}

		function month_end($date)
			{
				return $this->db->query("SELECT LAST_DAY('$date') AS me");
			}

		function month_start($date)
			{
				return $this->db->query("SELECT DATE_ADD(LAST_DAY(DATE_SUB('$date', interval 1 month)), interval 1 day) AS ms");
			}
	}
?>