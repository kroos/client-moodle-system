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
				return $this->db->order_by('code_course')->get_where('course', array('id <>' => 1));
			}

		function courseadmin()
			{
				return $this->db->order_by('code_course')->get('course');
			}

		function course_page($num, $offset)
			{
				return $this->db->order_by('code_course')->limit($offset, $num)->get_where('course', array('id <>' => 1));
			}

		function course_avail_page($num, $offset)
			{
				return $this->db->query("SELECT * FROM course WHERE course.id <> 1 ORDER BY course.code_course ASC limit $offset, $num");
			}

		function course_avail()
			{
				return $this->db->query('SELECT * FROM course WHERE course.id <> 1 ORDER BY course.code_course ASC');
			}

		function course_id($id)
			{
				return $this->db->get_where('course', array('id' => $id));
			}


//UPDATE
		function update_course($id, $code_course, $course, $description, $cost)
			{
				return $this->db->where(array('id' => $id))->update('course', array('code_course' => $code_course, 'course' => $course, 'description' => $description, 'cost' => $cost));
			}

//INSERT
		function insert_course($code_course, $course, $description, $cost)
			{
				return $this->db->insert('course', array('code_course' => $code_course, 'course' => $course, 'description' => $description, 'cost' => $cost));
			}

//DELETE
		function delete_course($id)
			{
				return $this->db->delete('course', array('id' => $id));
			}
	}
?>