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

			function user_username($username)
			{
				return $this->db->get_where('user', array('username' => $username));
			}

		function login($username, $password)
			{
				return $this->db->get_where('user', array('username' => $username, 'password' => $password));
			}

		function forgot_pass($user, $ic)
			{
				return $this->db->get_where('user', array('username' => $user, 'IC' => $ic));
			}
//UPDATE
		function update_resetp($user, $ic, $password)
			{
				return $this->db->where(array('username' => $user, 'IC' => $ic))->update('user', array('password' => md5($password)));
			}

		function update_profile($username, $name, $address, $postal_code, $city, $state, $phone, $skype)
			{
				return $this->db->where(array('username' => $username))->update('user', array('name' => $name, 'address' => $address, 'postal_code' => $postal_code, 'city' => $city, 'state' => $state, 'phone' => $phone, 'skype' => $skype));
			}

//INSERT
		function insert_user($username, $password, $name, $ic, $address, $postal_code, $city, $state, $phone, $skype)
			{
				return $this->db->insert('user', array('username' => $username, 'password' => $password, 'name' => $name, 'ic' => $ic, 'address' => $address, 'postal_code' => $postal_code, 'city' => $city, 'state' => $state, 'phone' => $phone, 'skype' => $skype));
			}

//DELETE
		function delete_user($id)
			{
				return $this->db->delete('user', array('id' => $id));
			}
	}
?>