<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for course table

//SELECT
		function GetAll($lim, $offset)
			{
				return $this->db->get('group', $lim, $offset);
			}

		function GetWhere($where, $lim, $offset)
			{
				return $this->db->get_where('group', $where, $lim, $offset);
			}

//UPDATE
		function update($update, $where)
			{
				return $this->db->update('group', $update, $where);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('group', $insert);
			}

//DELETE
		function delete($where)
			{
				return $this->db->delete('group', $where);
			}
	}
?>