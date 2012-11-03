<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_payment_bank extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user table

//SELECT
		function user_payment($username)
			{
				return $this->db->get_where('user_payment_bank', array('username' => $username));
			}

		function user_payment_course($username, $id_course)
			{
				return $this->db->get_where('user_payment_bank', array('username' => $username, 'id_course' => $id_course));
			}

//UPDATE
		function update_user_payment_paid($id, $id_bank, $date, $paid)
			{
				return $this->db->where(array('id' => $id))->update('user_payment_bank', array('id_bank' => $id_bank, 'date' => $date, 'paid' => $paid));
			}

//INSERT
		function insert_user_payment($username, $id_course, $payment, $reference, $date, $id_bank, $paid, $remarks)
			{
				return $this->db->insert('user_payment_bank', array('username' => $username, 'id_course' => $id_course, 'payment' => $payment, 'reference' => $reference, 'date' => $date, 'id_bank' => $id_bank, 'paid' => $paid, 'remarks' => $remarks));
			}

//DELETE
		function delete_user_course($id)
			{
				return $this->db->delete('user_payment_bank', array('id' => $id));
			}
	}
?>