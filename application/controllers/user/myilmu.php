<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myilmu extends CI_Controller 
	{
	
		/**
		* Index Page for this controller.
		*
		* Maps to the following URL
		* 		http://example.com/index.php/welcome
		*	- or -  
		* 		http://example.com/index.php/welcome/index
		*	- or -
		* Since this controller is set as the default controller in 
		* config/routes.php, it's displayed at http://example.com/
		*
		* So any other public methods not prefixed with an underscore will
		* map to /index.php/welcome/<method_name>
		* @see http://codeigniter.com/user_guide/general/urls.html
		*/
		public function index()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						$data['a'] = $this->course->course();
						$this->load->view('user/home', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function logout()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$array = array 
								(
									'usernum' => '',
									'authkey' => '',
									'username' => '',
									'password' => '',
									'group' => '',
									'logged_in' => FALSE,
								);
						$this->session->unset_userdata($array);
						redirect('', 'location');
					}
					else
					{
						redirect('', 'location');
					}
			}

#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('errors/error_custom_404');
			}

#############################################################################################################################
//template
/*
		public function home()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/user/myilmu/index', 'location');
					}
					else
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								
							}
							else
							{
								//form process
								
							}
					}
			}
*/
#############################################################################################################################
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */