<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for temp_account
//SELECT
	function captcha($verify, $expiration)
		{
			return $this->db->get_where('captcha', array('word' => $verify, 'ip_address' => $this->input->ip_address(), 'captcha_time >' => $expiration ));
		}

//UPDATE

//INSERT
	function insert_captcha($time, $word)
		{
			$data = array
						(
							'captcha_time' => $time,
							'ip_address' => $this->input->ip_address(),
							'word' => $word
						);
			return $this->db->insert('captcha', $data );
		}

//DELETE
	function delete_captcha($expiration)
		{
			return $this->db->delete('captcha', array('captcha_time <' => $expiration));
		}
#############################################################################################################################
	}
?>