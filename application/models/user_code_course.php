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
				return $this->db->order_by('username')->get_where('user_code_course', array('graduate' => 0, 'id_user_role <>' => 1));
			}

		function user_code_course($username, $id_course)
			{
				return $this->db->get_where('user_code_course', array('username' => $username, 'id_course' => $id_course));
			}

		function user_grad_course($username, $graduate)
			{
				return $this->db->get_where('user_code_course', array('username' => $username, 'graduate' => $graduate));
			}

		function grad_course($id_course, $id_user_role, $graduate)
			{
				return $this->db->get_where('user_code_course', array('id_course' => $id_course, 'graduate' => $graduate, 'id_user_role' => $id_user_role));
			}

//UPDATE
		function update_user_c_activate($username, $id_course, $activate)
			{
				return $this->db->where(array('username' => $username, 'id_course' => $id_course))->update('user_code_course', array('activate' => $activate));
			}

		function update_user_c_graduate($username, $id_course, $graduate)
			{
				return $this->db->where(array('username' => $username, 'id_course' => $id_course))->update('user_code_course', array('graduate' => $graduate));
			}

//INSERT
		function insert_user_course($username, $id_course, $id_user_role, $activate, $graduate)
			{
				return $this->db->insert('user_code_course', array('username' => $username, 'id_course' => $id_course, 'id_user_role' => $id_user_role, 'activate' => $activate, 'graduate' => $graduate));
			}

//DELETE
		function delete_user_course($id)
			{
				return $this->db->delete('user_code_course', array('id' => $id));
			}
	}
?>