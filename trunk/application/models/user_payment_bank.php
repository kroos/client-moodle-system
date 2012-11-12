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

		function getuser_payment_course($id_course, $paid)
			{
				return $this->db->order_by('username')-> get_where('user_payment_bank', array('id_course' => $id_course, 'paid' => $paid));
			}

//UPDATE
		function update_user_payment_paid($id, $id_bank, $date_payment, $paid, $payment, $remarks)
			{
				return $this->db->where(array('id' => $id))->update('user_payment_bank', array('id_bank' => $id_bank, 'date_payment' => $date_payment, 'paid' => $paid, 'payment' => $payment, 'remarks' => $remarks));
			}

//INSERT
		function insert_user_payment($username, $id_course, $payment, $reference, $date_payment, $date_due, $id_bank, $paid, $remarks)
			{
				return $this->db->insert('user_payment_bank', array('username' => $username, 'id_course' => $id_course, 'payment' => $payment, 'reference' => $reference, 'date_due' => $date_due, 'id_bank' => $id_bank, 'paid' => $paid, 'remarks' => $remarks));
			}

//DELETE
		function delete_user_course($id)
			{
				return $this->db->delete('user_payment_bank', array('id' => $id));
			}
	}
?>