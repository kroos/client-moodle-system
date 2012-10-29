<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_user_role extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user table

//SELECT
		function user_role($username)
			{
				return $this->db->get_where('user_user_role', array('username' => $username));
			}
//UPDATE
//		function update_resetp($user, $ic, $password)
//			{
//				return $this->db->where(array('username' => $user, 'IC' => $ic))->update('user_user_role', array('password' => md5($password)));
//			}

//INSERT
		function insert_user_role($username, $id_user_role)
			{
				return $this->db->insert('user_user_role', array('username' => $username, 'id_user_role' => $id_user_role));
			}

//DELETE
		function delete_user_role($username)
			{
				return $this->db->delete('user_user_role', array('username' => $username));
			}
	}
?>