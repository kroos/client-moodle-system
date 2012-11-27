<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myilmu extends CI_Controller 
	{
		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						//pagination process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'user/myilmu/index';
						$config['total_rows'] = $this->course->course_avail()->num_rows();
						$config['per_page'] = 5;
						$config['uri_segment'] = 4;
						$config['suffix'] = '.htm';
						$this->pagination->initialize($config);
						$data['a'] = $this->course->course_avail_page($config['per_page'], $this->uri->segment(4, 0));
						$data['paginate'] = $this->pagination->create_links();
						
						$this->load->view('user/home', $data);
					}
					else
					{
						if(in_array('1', $this->session->userdata('role'), TRUE))
							{
								redirect('/admin/myilmu', 'location');
							}
							else
							{
								if(in_array('3', $this->session->userdata('role'), TRUE) || in_array('4', $this->session->userdata('role'), TRUE))
									{
										redirect('/teacher/myilmu', 'location');
									}
									else
									{
										if(in_array('5', $this->session->userdata('role'), TRUE))
											{
												redirect('/user/myilmu', 'location');
											}
											else
											{
												$array = array 
														(
															'username' => '',
															'password' => '',
															'role' => '',
															'logged_in' => FALSE
														);
												$this->session->unset_userdata($array);
												redirect('', 'location');
											}
									}
							}
					}
			}

		public function buffer()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$course_id = $this->uri->segment(4, 0);
						if (ctype_digit($course_id))
							{
								$data['uy'] = $this->course->course_id($course_id);
								$this->load->view('user/buffer', $data);
							}
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function enrol()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						//pagination process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'user/myilmu/index';
						$config['total_rows'] = $this->course->course_avail()->num_rows();
						$config['per_page'] = 5;
						$config['uri_segment'] = 4;
						$config['suffix'] = '.htm';
						$this->pagination->initialize($config);
						$data['a'] = $this->course->course_avail_page($config['per_page'], $this->uri->segment(4, 0));
						$data['paginate'] = $this->pagination->create_links();
						
						//$data['a'] = $this->course->course_avail();
						$course_id = $this->uri->segment(4, 0);
						if (ctype_digit($course_id))
							{
								//now we check if the student taking 2 same course in the same period (double clicking accident)
								$uac = $this->user_code_course->user_code_course($this->session->userdata('username'), $course_id);
								if($uac->num_rows() < 1)
									{
										$t = $this->user_code_course->insert_user_course($this->session->userdata('username'), $course_id, 5, date_db(now()), 0, '0000-00-00', '0000-00-00', '0000-00-00');
										if ($t)
											{
												$data['info'] = 'Success register course.';
												$this->load->view('user/home', $data);
											}
											else
											{
												$data['info'] = 'Something teribly wrong. Please try again later';
												$this->load->view('user/home', $data);
											}
									}
									else
									{
										$data['info'] = 'Currently, you are taking this course. Please pick another';
										$this->load->view('user/home', $data);
									}
							}
							else
							{
								redirect('/user/myilmu/index', 'location');
							}
					}
					else
					{
						redirect('/myilmu/index', 'location');
					}
			}

		public function account()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$data['s'] = $this->user_code_course->user_course($this->session->userdata('username'));
						$this->load->view('user/account', $data);
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function profile()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
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
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
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

		public function contact_admin()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/contact');
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
												$this->load->view('user/contact', $data);
											}
											else
											{
												$data['info'] = 'Activation email cant be send right now<br />Please try again later';
												$this->load->view('user/contact', $data);
											}
									}
							}
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function change_password()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('user/change_password');
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
														$this->load->view('user/change_password', $data);
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
																$this->load->view('user/change_password', $data);
															}
													}
											}
											else
											{
												$data['info'] = 'Please try again because this is not your current password';
												$this->load->view('user/change_password', $data);
											}
									}
							}
					}
					else
					{
						redirect('/user/myilmu/index', 'location');
					}
			}

		public function tnc()
			{
				$this->load->view('user/tnc');
			}

		public function course()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$data['s'] = $this->user_code_course->user_course($this->session->userdata('username'));
						$this->load->view('user/course', $data);
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
				if ($this->session->userdata('logged_in') === TRUE && in_array('5', $this->session->userdata('role'), TRUE) === TRUE)
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