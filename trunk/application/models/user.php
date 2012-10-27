<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user table

//SELECT
		function user()
			{
				return $this->db->order_by('id')->get('user');
			}

		function login($username, $password)
			{
				return $this->db->get_where('user', array('username' => $username, 'password' => $password));
			}
//UPDATE


//INSERT
		function insert_course($username, $password, $name, $address, $postal_code, $city, $state, $phone)
			{
				return $this->db->insert('user', array('username' => $username, 'password' => $password, 'name' => $name, 'address' => $address, 'postal_code' => $postal_code, 'city' => $city, 'state' => $state, 'phone' => $phone));
			}

//DELETE
		function delete_course($id)
			{
				return $this->db->delete('user', array('id' => $id));
			}
	}
?>