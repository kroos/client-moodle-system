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
								$course_id = $this->uri->segment(3, 0);
								$data['q'] = $this->course->course_id($course_id)->row();
								if($this->input->post('signup', TRUE))
									{
										$username = $this->input->post('username', TRUE);
										$password = md5($this->input->post('password1', TRUE));
										$name = ucwords(strtolower($this->input->post('name', TRUE)));
										$ic = $this->input->post('ic', TRUE);
										$postcode = $this->input->post('postcode', TRUE);
										$city = ucwords(strtolower($this->input->post('city', TRUE)));
										$state = $this->input->post('state', TRUE);
										$phone = $this->input->post('phone', TRUE);
										$address = ucwords(strtolower($this->input->post('address', TRUE)));
										$verify = $this->input->post('verify', TRUE);

										//we need to check the capthca
										$expiration = time()-1800; // 30 minites limit
										//delete captcha 30 minites ago
										$this->captcha->delete_captcha($expiration);

										//check the new 1
										$check = $this->captcha->captcha($verify, $expiration)->num_rows();

										if ($check == 0)
											{
												$data['info'] = 'You must submit the word that appears in the image';
												$this->load->view('register', $data);
											}
											else
											{
												$course_id = $this->uri->segment(3, 0);
												$q = $this->course->course_id($course_id)->row()->code_course;
												$r = $this->user->insert_user($username, $password, $name, $ic, $address, $postcode, $city, $state, $phone);
												$t = $this->user_code_course->insert_user_course($username, $q, 0, 0);
												//default is student
												$b = $this->user_user_role->insert_user_role($username, 5);
												if ($r && $t && $b)
													{
														$data['info'] = 'You may login with the credential.';
														$this->load->view('enrol', $data);
													}
													else
													{
														$data['info'] = 'Something teribly wrong. please try again later';
														$this->load->view('enrol', $data);
													}
											}
									}
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
																	'logged_in' => TRUE
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

		public function forgot_password()
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
								$this->load->view('forgot_password');
							}
							else
							{
								//form process
								if ($this->input->post('forgot_pass', TRUE))
									{
										$username = $this->input->post('username', TRUE);
										$ic = $this->input->post('ic', TRUE);

										$query = $this->user->forgot_pass($username, $ic);
										if ($query->num_rows() == 1)
											{
												$password = generatePassword(6, 1);
												$subject = 'Your Password For '.$this->config->item('title').' Tution Center';
												$message = "<html>
															<head>
															<meta http-equiv='Content-Language' content='en-us'>
															<meta name='GENERATOR' content='Microsoft FrontPage 6.0'>
															<meta name='ProgId' content='FrontPage.Editor.Document'>
															<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
															<title>".$this->config->item('title')." Password Retrieval</title>
															</head>
															<body>
															<p align='center'>Your username : ".$username."</p>";
												$message .= "<p align='center'>This is your password  : ".$password."</p>";
												$message .=	"<p align='center'><a href='".base_url()."'>".$this->config->item('title')." Tution Center</a></p>
															</body>
															</html>";
												$t = $this->user->update_resetp($username, $ic, $password);
												if($t)
													{
														$email = send_email($username, $query->row()->name, $subject, $message, $this->config->item('pop3_server'), $this->config->item('pop3_port'), $this->config->item('username'), $this->config->item('password'), $this->config->item('SMTP_auth'), $this->config->item('smtp_server'), $this->config->item('smtp_port'), $this->config->item('SMTP_Secure'), $this->config->item('addreplyto_email'), $this->config->item('addreplyto_name'), $this->config->item('from'), $this->config->item('from_name'));
														if ($email == TRUE)
															{
																$data['info'] = 'Successful send password';
																$this->load->view('forgot_password', $data);
															}
															else
															{
																$data['info'] = array('Please try again later', $email);
																$this->load->view('forgot_password', $data);
															}
													}
													else
													{
														$data['info'] = 'Sorry, i cant reset your password at the moment. Please try again later.';
														$this->load->view('forgot_password', $data);
													}
											}
											else
											{
												$data['info'] = 'Your username and your identity card number doesnt match';
												$this->load->view('forgot_password', $data);
											}
									}
							}
					}
			}

		public function contact()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/user/myilmu/index', 'location');
					}
					else
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

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('contact', $data);
							}
							else
							{
								//form process
								$name = ucwords(strtolower($this->input->post('name', TRUE)));
								$email = $this->input->post('email', TRUE);
								$msg = ucwords(strtolower($this->input->post('message', TRUE)));
								$verify = $this->input->post('verify', TRUE);

								if($this->input->post('contact', TRUE))
									{
										//we need to check the capthca
										$expiration = time()-1800; // 30 minutes limit
										//delete captcha 30 minutes ago
										$this->captcha->delete_captcha($expiration);

										//check the new 1
										$check = $this->captcha->captcha($verify, $expiration)->num_rows();

										if ($check == 0)
											{
												$data['info'] = 'You must submit the word that appears in the image';
												$this->load->view('contact', $data);
											}
											else
											{
												$subject = $this->config->item('title').' Tution Center Query';
												$message = "<html>
															<head>
															<meta http-equiv='Content-Language' content='en-us'>
															<meta name='GENERATOR' content='Microsoft FrontPage 6.0'>
															<meta name='ProgId' content='FrontPage.Editor.Document'>
															<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
															<title>".$this->config->item('title')." Tution Center Query</title>
															</head>
															<body>";
												$message .= $msg;
												$message .=	"</body></html>";

												$email1 = send_email($this->config->item('admin_email'), 'Admin', $subject, $message, $this->config->item('pop3_server'), $this->config->item('pop3_port'), $this->config->item('username'), $this->config->item('password'), $this->config->item('SMTP_auth'), $this->config->item('smtp_server'), $this->config->item('smtp_port'), $this->config->item('SMTP_Secure'), $email, $name, $email, $name);
												if ($email1 == TRUE)
													{
														$data['info'] = 'Thank you very much. We will get back to you at the soonest.';
														$this->load->view('contact', $data);
													}
													else
													{
														$data['info'] = 'Activation email cant be send right now<br />Please try again later';
														$this->load->view('contact', $data);
													}
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