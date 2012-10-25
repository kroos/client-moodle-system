<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for course db

//SELECT
		function bank()
			{
				return $this->db->order_by('bil')->get('course');
			}

//UPDATE


//INSERT
		function insert_bank($course)
			{
				return $this->db->insert('course', $course);
			}

//DELETE
		function delete_bank($id)
			{
				return $this->db->delete('course', array('bil' => $id));
			}
	}
?>