<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for course table

//SELECT
		function bank()
			{
				return $this->db->order_by('id')->get_where('course', array('id <>' => 1));
			}

		function bank_id($id)
			{
				return $this->db->get_where('bank', array('id' => $id));
			}

//UPDATE

//INSERT

//DELETE

	}
?>