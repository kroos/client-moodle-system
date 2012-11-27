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

		function user_course()
			{
				return $this->db->query("
											select
											*
											from
											(((`user`
											inner join `user_code_course` on((`user_code_course`.`username` = `user`.`username`)))
											inner join `course` on((`user_code_course`.`id_course` = `course`.`id`)))
											inner join `user_role` on((`user_code_course`.`id_user_role` = `user_role`.`id`)))
											where
											(`user`.`id` <> 1)
											order by
											`user_role`.`id`,
											`user_code_course`.`paid` desc,
											`user_code_course`.`date_pay`
										");
			}

		function user_course_page($num, $offset)
			{
				return $this->db->query("
											select
											*
											from
											(((`user`
											inner join `user_code_course` on((`user_code_course`.`username` = `user`.`username`)))
											inner join `course` on((`user_code_course`.`id_course` = `course`.`id`)))
											inner join `user_role` on((`user_code_course`.`id_user_role` = `user_role`.`id`)))
											where
											(`user`.`id` <> 1)
											order by
											`user_role`.`id`,
											`user_code_course`.`paid` desc,
											`user_code_course`.`date_pay`
											limit $offset, $num
										");
			}

		/*function user_payment_type ()
			{
				return $this->db->query("
										
										");
			}//*/
	}
?>