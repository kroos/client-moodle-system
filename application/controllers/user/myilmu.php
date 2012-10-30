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
						//$data['a'] = $this->view->user_reg_course();
						$data['a'] = $this->course->course();

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
						$data['a'] = $this->view->user_reg_course();
						$course_id = $this->uri->segment(4, 0);
						if (ctype_digit($course_id))
							{
								$uy = $this->course->course_id($course_id)->row()->code_course;
								//echo $uy;
								$yu = $this->user_code_course->user_code_course($this->session->userdata('username'), $uy);
								if ($yu->num_rows() < 1)
									{
										//insert data
										$kl = $this->user_code_course->insert_user_course($this->session->userdata('username'), $uy, 0, 0);
										if ($kl)
											{
												//redirect('/user/myilmu/index', 'location');
												$data['info'] = 'Please make a payment and inform the admin, otherwise we cant activate yet your course';
												$this->load->view('user/home', $data);
											}
											else
											{
												$data['info'] = 'Something terribly went wrong. Please try again later';
												$this->load->view('user/home', $data);
											}
									}
									else
									{
										$data['info'] = 'You have registered this course. Please enroll another course.';
										$this->load->view('user/home', $data);
									}
							}
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function account()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//form
						$data['g'] = $this->view->user_cost_view($this->session->userdata('username'));
						$data['o'] = $this->view->user_payment_view($this->session->userdata('username'));
						//echo $this->db->last_query();
						$this->load->view('user/account', $data);
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function profile()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						$data['l'] = $this->user->user_username($this->session->userdata('username'));
						$this->load->view('user/profile', $data);
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function edit()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['f'] = $this->user->user_username($this->session->userdata('username'));
								$this->load->view('user/edit', $data);
							}
							else
							{
								//form process
								if($this->input->post('save', TRUE))
									{
										$name = ucwords(strtolower($this->input->post('name', TRUE)));
										$address = ucwords(strtolower($this->input->post('address', TRUE)));
										$postcode = $this->input->post('postcode', TRUE);
										$city = ucwords(strtolower($this->input->post('city', TRUE)));
										$state = $this->input->post('state', TRUE);
										$phone = $this->input->post('phone', TRUE);
										$skype = $this->input->post('skype', TRUE);

										$q = $this->user->update_profile($this->session->userdata('username'), $name, $address, $postcode, $city, $state, $phone, $skype);
										if($q)
											{
												redirect('/user/myilmu/profile', 'location');
											}
											else
											{
												$data['info'] = 'Something went teribly wrong. Please try again later.';
												$this->load->view('user/edit', $data);
											}
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
									'role' => '',
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