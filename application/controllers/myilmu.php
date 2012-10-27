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
						redirect('/user/myilmu/index', 'location');
					}
					else
					{
						$data['a'] = $this->course->course();
						$this->load->view('home', $data);
					}
			}

		public function enrol()
			{
				//initiate var for captcha helper
				$vals = array
					(
						'word' => rand(10000, 99999),
						'img_path' => './images/captcha/',
						'img_url' => base_url().'images/captcha/',
						//'font_path' => './path/to/fonts/texb.ttf',
						'img_width' => 150,
						'img_height' => 30,
						'expiration' => 1800
					);
				$data['cap'] = create_captcha($vals);
				$this->captcha->insert_captcha($data['cap']['time'], $data['cap']['word']);

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
								$course_id = $this->uri->segment(3, 0);
								if(is_numeric($course_id))
									{
										$data['q'] = $this->course->course_id($course_id)->row();
										$this->load->view('enrol', $data);
									}
									else
									{
										redirect('', 'location');
									}
							}
							else
							{
								//form process
								
							}
					}
			}

		public function login()
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
								$this->load->view('login');
							}
							else
							{
								//form process
								if ($this->input->post('login', TRUE))
									{
										$user = $this->input->post('username', TRUE);
										$pass = md5($this->input->post('password', TRUE));
										$r = $this->user->login($user, $pass);
										if ($r->num_rows() == 1)
											{
												$session = array
																(
																	'username' => $user,
																	'password' => $pass,
																	//'group' => $r->row()->group_id,
																	'logged_in' => TRUE,
																);
												$this->session->set_userdata($session);
												redirect('/user/myilmu', 'location');
											}
											else
											{
												$data['info'] = 'Your username and password did\'nt match';
												$this->load->view('login', $data);
											}
									}
							}
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