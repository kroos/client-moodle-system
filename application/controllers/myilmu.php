<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myilmu extends CI_Controller 
	{
		public function login()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/user/myilmu/index', 'location');
					}
					else
					{
						//pagination process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'myilmu/login';
						$config['total_rows'] = $this->course->course_avail()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['a'] = $this->course->course_avail_page($config['per_page'], $this->uri->segment(3, 0));

						$data['paginate'] = $this->pagination->create_links();

						//$data['a'] = $this->course->course_avail();
						//echo $this->db->last_query();
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

				$data['g'] = $this->group->GetWhere('`id` <> 1 AND `id` <> 2', NULL, NULL);
				//echo $this->db->last_query();

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
								if(is_numeric($course_id))
									{
										if($this->input->post('signup', TRUE))
											{
												$username = $this->input->post('username', TRUE);
												$password = md5($this->input->post('password1', TRUE));
												$name = ucwords(strtolower($this->input->post('name', TRUE)));
												$group = $this->input->post('group', TRUE);
												$ic = $this->input->post('ic', TRUE);
												$postcode = $this->input->post('postcode', TRUE);
												$city = ucwords(strtolower($this->input->post('city', TRUE)));
												$state = $this->input->post('state', TRUE);
												$phone = $this->input->post('phone', TRUE);
												$address = ucwords(strtolower($this->input->post('address', TRUE)));
												$skype = $this->input->post('skype', TRUE);
												$verify = $this->input->post('verify', TRUE);

												//we need to check the capthca
												$expiration = time()- 1800; // 30 minites limit
												//delete captcha 30 minites ago
												$this->captcha->delete_captcha($expiration);

												//check the new 1
												$check = $this->captcha->captcha($verify, $expiration)->num_rows();

												if ($check == 0)
													{
														$this->captcha->delete_captcha(time());
														$data['info'] = 'You must submit the word that appears in the image';
														$this->load->view('enrol', $data);
													}
													else
													{
														$course_id = $this->uri->segment(3, 0);
														$q = $this->course->course_id($course_id);

														//masukkan terus dlm user & user_code_course
														$r = $this->user->insert_user($username, $password, $name, $group, $ic, $address, $postcode, $city, $state, $phone, $skype);
														$p = $this->user_code_course->insert_user_course($username, $course_id, 5, date_db(now()), 0, '0000-00-00', '0000-00-00', '0000-00-00');
														if($r && $p)
															{
																$this->captcha->delete_captcha(time() - 10);
																$data['info'] = 'Please login with the username and your password';
																$this->load->view('enrol', $data);
															}
															else
															{
																$this->captcha->delete_captcha(time() - 10);
																$data['info'] = 'Something teribly happen. Please try again later';
																$this->load->view('enrol', $data);
															}
													}
											}
									}
									else
									{
										redirect('', 'location');
									}
							}
					}
			}

		public function index()
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
										$pass = $this->input->post('password', TRUE);
										$r = $this->user->login($user, md5($pass));
										if ($r->num_rows() == 1)
											{
												///*checking roles. probably 1 user with many roles
												$j = $this->user_code_course->user_course($user);
												$i = 1;
												foreach ($j->result() as $m)
													{
														//echo $this->user_role->user_roles($m->id_user_role)->row()->user_role.'<br />';
														//echo $m->id_user_role.'<br />';
														$role[$i++] = $m->id_user_role;
													}

													$session = array
																(
																	'username' => $user,
																	'password' => $pass,
																	'role' => $role,
																	'logged_in' => TRUE
																);
												$this->session->set_userdata($session);

												//in array strict checking
												if(in_array('1', $this->session->userdata('role'), TRUE))
													{
														redirect('/admin/myilmu/index', 'location');
													}
													else
													{
														if(in_array('3', $this->session->userdata('role'), TRUE) || in_array('4', $this->session->userdata('role'), TRUE))
															{
																redirect('/teacher/myilmu/index', 'location');
															}
															else
															{
																if(in_array('5', $this->session->userdata('role'), TRUE))
																	{
																		redirect('/user/myilmu/index', 'location');
																	}
																	else
																	{
																		redirect('/myilmu/index', 'location');
																	}
															}
													}

												/*
												foreach ($this->session->userdata('role') as $p => $r)
													{
														echo $p.'&nbsp;'.$r.'<br />';
													}
												//*/
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
												$t = $this->user->update_resetp($username, $ic, md5($password));
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

		function tnc()
			{
				$this->load->view('tnc');
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