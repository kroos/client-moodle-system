<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_code_course extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for User_code_course table

//SELECT
		function user_course($username)
			{
				return $this->db->get_where('user_code_course', array('username' => $username));
			}

		function Getuser_course()
			{
				return $this->db->order_by('paid ASC, date_reg DESC')->get_where('user_code_course', array('id_user_role' => 5));
			}

		function Getuser_course_page($num, $offset)
			{
				return $this->db->order_by('paid ASC, date_reg DESC')->limit($num, $offset)->get_where('user_code_course', array('id_user_role' => 5));
			}

		function user_code_course($username, $id_course)
			{
				return $this->db->get_where('user_code_course', array('username' => $username, 'id_course' => $id_course));
			}

		/*function user_grad_course($username, $paid)
			{
				//return $this->db->get_where('user_code_course', array('username' => $username, 'paid' => $paid, 'date_start <=' => '(SELECT curdate())', 'date_end >=' => '(SELECT curdate())'));
			}
		//*/

		function grad_course($id_course, $id_user_role, $graduate)
			{
				return $this->db->get_where('user_code_course', array('id_course' => $id_course, 'graduate' => $graduate, 'id_user_role' => $id_user_role));
			}

//UPDATE
		function update_user_pay($id, $paid, $date_pay, $date_start, $date_end)
			{
				return $this->db->where(array('id' => $id))->update('user_code_course', array('paid' => $paid, 'date_pay' => $date_pay, 'date_start' => $date_start, 'date_end' => $date_end));
			}

//INSERT
		function insert_user_course($username, $id_course, $id_user_role, $date_reg, $paid, $date_pay, $date_start, $date_end)
			{
				return $this->db->insert('user_code_course', array('username' => $username, 'id_course' => $id_course, 'id_user_role' => $id_user_role, 'date_reg' => $date_reg, 'paid' => $paid, 'date_pay' => $date_pay, 'date_start' => $date_start, 'date_end' => $date_end));
			}

//DELETE
		function delete_user_course($id)
			{
				return $this->db->delete('user_code_course', array('id' => $id));
			}
	}
?>