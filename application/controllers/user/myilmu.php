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
						//show all course but not the 1 that enrolled already
						$data['a'] = $this->course->course();
						//$d = $this->user_code_course->user_course($this->session->userdata('username'));

						//$data['a'] =$this->course->course_code_inv($d->row()->code_course);
						//echo $this->db->last_query();
						$this->load->view('user/home', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function enrol()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						$data['a'] = $this->course->course();
						$course_id = $this->uri->segment(4, 0);
						if (ctype_digit($course_id))
							{
								$uy = $this->course->course_id($course_id)->row()->code_course;
								//echo $uy;
								$yu = $this->user_code_course->user_code_course($this->session->userdata('username'), $uy);
								if ($yu->num_rows() < 1)
									{
										//insert data
										
									}
									else
									{
										$data['info'] = '<div class="ui-widget">
															<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
																<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
																<strong>Error:</strong> You have registered this course. Please enroll another course.</p>
															</div>
														</div>';
										$this->load->view('user/home', $data);
									}
							}
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}



#############################################################################################################################
//logout
		public function logout()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$array = array 
								(
									'username' => '',
									'password' => '',
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
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}
*/
#############################################################################################################################
	}

/* End of file myilmu.php */
/* Location: ./application/controllers/user/myilmu.php */