<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_code_course extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user table

//SELECT
		function user_course($username)
			{
				return $this->db->get_where('user_code_course', array('username' => $username));
			}

		function user_code_course($username, $code_course)
			{
				return $this->db->get_where('user_code_course', array('username' => $username, 'code_course' => $code_course));
			}

//UPDATE
		function update_user_c_activate($username, $code_course, $activate)
			{
				return $this->db->where(array('username' => $username, 'code_course' => $code_course))->update('user_code_course', array('activate' => $activate));
			}

		function update_user_course_a($username, $code_course, $activate)
			{
				return $this->db->where(array('username' => $username, 'activate' => $activate))->update('user_code_course', array('code_course' => $code_course));
			}

		function update_user_course_graduate($username, $code_course, $graduate)
			{
				return $this->db->where(array('username' => $username, 'code_course' => $code_course))->update('user_code_course', array('graduate' => $graduate));
			}

//INSERT
		function insert_user_course($username, $code_course, $activate, $graduate)
			{
				return $this->db->insert('user_code_course', array('username' => $username, 'code_course' => $code_course, 'activate' => $activate, 'graduate' => $graduate));
			}

//DELETE
		function delete_user_course($username)
			{
				return $this->db->delete('user_code_course', array('username' => $username));
			}
	}
?>