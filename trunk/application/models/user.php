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
				return $this->db->order_by('id')->get_where('user', array('id <>' => 1));
			}

		function user_username($username)
			{
				return $this->db->get_where('user', array('username' => $username));
			}

		function user_id($id)
			{
				return $this->db->get_where('user', array('id' => $id));
			}

		function user_ic($ic)
			{
				return $this->db->get_where('user', array('IC' => $ic));
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
				return $this->db->where(array('username' => $user, 'IC' => $ic))->update('user', array('password' => $password));
			}

		function update_pass($user, $password)
			{
				return $this->db->where(array('username' => $user))->update('user', array('password' => $password));
			}

		function update_profile($username, $name, $ic, $address, $postal_code, $city, $state, $phone, $skype)
			{
				return $this->db->where(array('username' => $username))->update('user', array('name' => $name,'IC' => $ic, 'address' => $address, 'postal_code' => $postal_code, 'city' => $city, 'state' => $state, 'phone' => $phone, 'skype' => $skype));
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