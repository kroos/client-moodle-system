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
//UPDATE
		function update_user_c_activate($username, $code_course, $activate)
			{
				return $this->db->where(array('username' => $username, 'code_course' => $code_course))->update('user_code_course', array('activate' => $activate));
			}

		function update_user_course_a($username, $code_course, $activate)
			{
				return $this->db->where(array('username' => $username, 'activate' => $activate))->update('user_code_course', array('code_course' => $code_course));
			}

//INSERT
		function insert_user_course($username, $code_course, $activate)
			{
				return $this->db->insert('user_code_course', array('user_role' => $user_role, 'description' => $description, 'description' => $description));
			}

//DELETE
		function delete_user_course($username)
			{
				return $this->db->delete('user_code_course', array('id' => $id));
			}
	}
?>