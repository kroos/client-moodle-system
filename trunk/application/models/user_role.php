<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_role extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user table

//SELECT
		function user_roles($id)
			{
				return $this->db->get_where('user_role', array('id' => $id));
			}

			function Getuser_roles()
			{
				return $this->db->get_where('user_role');
			}

//UPDATE
//		function update_resetp($user, $ic, $password)
//			{
//				return $this->db->where(array('username' => $user, 'IC' => $ic))->update('user_user_role', array('password' => md5($password)));
//			}

//INSERT
		function insert_user_roles($user_role, $description)
			{
				return $this->db->insert('user_role', array('user_role' => $user_role, 'description' => $description));
			}

//DELETE
		function delete_user_roles($id)
			{
				return $this->db->delete('user_role', array('id' => $id));
			}
	}
?>