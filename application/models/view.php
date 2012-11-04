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
		function user_unpaid_view($username)
			{
				return $this->db->query("
											SELECT *
											FROM
											user_payment_bank
											INNER JOIN course ON course.id = user_payment_bank.id_course
											WHERE
											user_payment_bank.username = '$username' AND
											user_payment_bank.date_due <= (SELECT LAST_DAY(CURDATE())) AND
											user_payment_bank.paid = 0
											ORDER BY
											user_payment_bank.id_course ASC,
											user_payment_bank.date_due DESC
										");
			}

		function user_paid_view($username)
			{
				return $this->db->query("
											SELECT *
											FROM
											user_payment_bank
											INNER JOIN course ON course.id = user_payment_bank.id_course
											WHERE
											user_payment_bank.username = '$username' AND
											user_payment_bank.date_due <= (SELECT LAST_DAY(CURDATE())) AND
											user_payment_bank.paid = 1
											ORDER BY
											user_payment_bank.id_course ASC,
											user_payment_bank.date_due DESC
										");
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

		/*function user_payment_type ()
			{
				return $this->db->query("
										
										");
			}//*/
	}
?>