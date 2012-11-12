<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myilmu extends CI_Controller 
	{
		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
					{
						//upacra kira course dan subjek yg dia involve....
						$data['c'] = $this->course->course();
						$this->load->view('teacher/home', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}



		public function profile()
			{
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
					{
						$data['l'] = $this->user->user_username($this->session->userdata('username'));
						$this->load->view('teacher/profile', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function edit()
			{
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['f'] = $this->user->user_username($this->session->userdata('username'));
								$this->load->view('teacher/edit', $data);
							}
							else
							{
								//form process
								if($this->input->post('save', TRUE))
									{
										$name = ucwords(strtolower($this->input->post('name', TRUE)));
										$ic = $this->input->post('ic', TRUE);
										$address = ucwords(strtolower($this->input->post('address', TRUE)));
										$postcode = $this->input->post('postcode', TRUE);
										$city = ucwords(strtolower($this->input->post('city', TRUE)));
										$state = $this->input->post('state', TRUE);
										$phone = $this->input->post('phone', TRUE);
										$skype = $this->input->post('skype', TRUE);

										$q = $this->user->update_profile($this->session->userdata('username'), $name, $ic, $address, $postcode, $city, $state, $phone, $skype);
										if($q)
											{
												redirect('', 'location');
											}
											else
											{
												$data['info'] = 'Something went teribly wrong. Please try again later.';
												$this->load->view('teacher/edit', $data);
											}
									}
							}
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function contact_admin()
			{
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('teacher/contact');
							}
							else
							{
								//form process
								$p = $this->user->user_username($this->session->userdata('username'))->row()->name;
								$name = ucwords(strtolower($p));
								$email = $this->session->userdata('username');
								$msg = ucwords(strtolower($this->input->post('message', TRUE)));

								if($this->input->post('send', TRUE))
									{
										$subject = $this->config->item('title').' Tution Center User Query';
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
										if ($email1 === TRUE)
											{
												$data['info'] = 'Thank you very much. We will get back to you at the soonest.';
												$this->load->view('teacher/contact', $data);
											}
											else
											{
												$data['info'] = 'Email cant be send right now<br />Please try again later';
												$this->load->view('teacher/contact', $data);
											}
									}
							}
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function change_password()
			{
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('teacher/change_password');
							}
							else
							{
								//form process
								$cpassword = $this->input->post('cpassword', TRUE);
								$npassword1 = $this->input->post('npassword1', TRUE);
								$npassword2 = $this->input->post('npassword2', TRUE);
								if ($this->input->post('save', TRUE))
									{
										if ($this->session->userdata('password') == $cpassword)
											{
												if ($cpassword == $npassword1)
													{
														$data['info'] = 'You are using the same password as your old password. Please try again.';
														$this->load->view('teacher/change_password', $data);
													}
													else
													{
														$g = $this->user->update_pass($this->session->userdata('username'), md5($npassword1));
														if($g)
															{
																$this->session->set_userdata(array('password' => md5($npassword1)));
																$data['info'] = 'Success changing password';
																$this->session->unset_userdata('password', '');
																$this->session->set_userdata('password', $npassword1);
																$this->load->view('user/change_password', $data);
															}
															else
															{
																$data['info'] = 'Something teribly happen. Please try again later';
																$this->load->view('teacher/change_password', $data);
															}
													}
											}
											else
											{
												$data['info'] = 'Please try again because this is not your current password';
												$this->load->view('teacher/change_password', $data);
											}
									}
							}
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function tnc()
			{
				$this->load->view('teacher/tnc');
			}

		public function course()
			{
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
					{
						//1st we check the course been taken n not finished yet (graduate = 0) --> continue to page 'views/user/course.php'
						$data['s'] = $this->user_code_course->user_grad_course($this->session->userdata('username'), 0);
						$this->load->view('teacher/course', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}
#############################################################################################################################
//logout
		public function logout()
			{
				if ($this->session->userdata('logged_in') === TRUE)
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
				if ($this->session->userdata('logged_in') === TRUE && (in_array('3', $this->session->userdata('role'), TRUE) === TRUE || in_array('4', $this->session->userdata('role'), TRUE) === TRUE))
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
/* Location: ./application/controllers/teacher/myilmu.php */