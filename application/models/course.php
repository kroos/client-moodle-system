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
				return $this->db->order_by('id')->get_where('course', array('id <>' => 1));
			}

		function course_avail()
			{
				return $this->db->query('SELECT * FROM course WHERE course.id <> 1 AND now() BETWEEN course.registration_date_start AND  course.registration_date_end ORDER BY course.id ASC');
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
		function insert_course($code_course, $course, $description, $cost, $id_payment_type, $registration_date_start, $registration_date_end, $date_start, $date_end)
			{
				return $this->db->insert('course', array('code_course' => $code_course, 'course' => $course, 'description' => $description, 'cost' => $cost, 'id_payment_type' => $id_payment_type, 'registration_date_start' => $registration_date_start, 'registration_date_end' => $registration_date_end, 'date_start' => $date_start, 'date_end' => $date_end));
			}

//DELETE
		function delete_course($id)
			{
				return $this->db->delete('course', array('id' => $id));
			}
	}
?>