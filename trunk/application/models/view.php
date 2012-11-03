<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for view table

//SELECT
		function user_cost_view($username)
			{
				return $this->db->query("SELECT
										user_code_course.code_course,
										course.course,
										course.cost
										FROM
										user_code_course
										INNER JOIN course ON user_code_course.code_course = course.code_course
										WHERE
										user_code_course.username = '$username'");
			}

		function user_payment_view($username)
			{
				return $this->db->query("SELECT
										user_payment_bank.username,
										user_payment_bank.payment,
										user_payment_bank.reference,
										user_payment_bank.date,
										bank.bank
										FROM
										user_payment_bank
										INNER JOIN bank ON user_payment_bank.id_bank = bank.id
										WHERE
										user_payment_bank.username = '$username'");
			}

		function user_course($username, $id_course)
			{
				return $this->db->query("
											SELECT *
											FROM
											course
											INNER JOIN user_code_course ON user_code_course.id_course = course.id
											WHERE
											user_code_course.username = '$username' AND
											curdate() < course.date_end AND
											user_code_course.id_course = $id_course AND
											user_code_course.graduate = 0 AND
											(SELECT curdate()) < course.date_end
										");
			}
	}
?>