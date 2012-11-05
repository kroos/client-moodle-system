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
				return $this->db->get('bank');
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