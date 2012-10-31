<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for course table

//SELECT
		function course()
			{
				return $this->db->order_by('id')->get_where('course', array('id <>' => 5));
			}

		function course_id($id)
			{
				return $this->db->get_where('course', array('id' => $id));
			}

		function course_code($code)
			{
				return $this->db->get_where('course', array('code_course' => $code));
			}

//UPDATE


//INSERT
		function insert_course($code_course, $course, $description, $cost, $week)
			{
				return $this->db->insert('course', array('code_course' => $code_course, 'course' => $course, 'description' => $description, 'cost' => $cost, 'week' => $week));
			}

//DELETE
		function delete_course($id)
			{
				return $this->db->delete('course', array('id' => $id));
			}
	}
?>