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
		function GetAll($lim, $offset)
			{
				return $this->db->get('user_code_course', $lim, $offset);
			}

		function GetWhere($where, $lim, $offset)
			{
				return $this->db->get('user_code_course', $lim, $offset);
			}

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

		function ucc_id($id)
			{
				return $this->db->get_where('user_code_course', array('id' => $id));
			}

		function grad_course($id_course, $id_user_role, $paid)
			{
				return $this->db->get_where('user_code_course', array('id_course' => $id_course, 'id_user_role' => $id_user_role, 'paid' => $paid));
			}

//UPDATE
		function update_user_pay($id, $paid, $date_pay, $date_start, $date_end)
			{
				return $this->db->where(array('id' => $id))->update('user_code_course', array('paid' => $paid, 'date_pay' => $date_pay, 'date_start' => $date_start, 'date_end' => $date_end));
			}

		function update_paid($username, $paid, $date_end)
			{
				return $this->db->where(array('username' => $username, 'paid' => $paid))->update('user_code_course', array('date_end' => $date_end));
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
			
		function delete($delete)
			{
				return $this->db->delete('user_code_course', $delete);
			}
	}
?>