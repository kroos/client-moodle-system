<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_type extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user table

//SELECT
		function payment($id)
			{
				return $this->db->get_where('payment_type', array('id' => $id));
			}

		function tpayment()
			{
				return $this->db->get('payment_type');
			}

//UPDATE

//INSERT
		function insert_payment($id, $payment_recurring)
			{
				return $this->db->insert('payment_type', array('id' => $id, 'payment_recurring' => $payment_recurring));
			}

//DELETE
		function delete_payment($id)
			{
				return $this->db->delete('payment_type', array('id' => $id));
			}
	}
?>