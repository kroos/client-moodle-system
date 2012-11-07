<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myilmu extends CI_Controller 
	{
		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$data['q'] = $this->user->user();
						$this->load->view('admin/home', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function course()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$this->load->view('admin/course');
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function add_course()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{

						//process pagination
						$this->load->library('pagination');
						$config['base_url'] = base_url().'admin/myilmu/add_course';
						$config['total_rows'] = $this->course->course()->num_rows();
						$config['uri_segment'] = 4;
						$config['per_page'] = 5;
						$config['suffix'] = '.htm';

						$this->pagination->initialize($config);

						$data['u'] = $this->course->course_page($this->uri->segment(4, 0), $config['per_page']);
						$data['pagination'] = $this->pagination->create_links();

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								$this->load->view('admin/add_course', $data);
							}
							else
							{
								//form process
								if($this->input->post('add_course', TRUE))
									{
										$code_course = strtoupper(strtolower($this->input->post('code_course', TRUE)));
										$course = ucwords(strtolower($this->input->post('course', TRUE)));
										$description = ucwords(strtolower($this->input->post('description', TRUE)));
										$cost = $this->input->post('cost', TRUE);
										$id_payment_type = $this->input->post('id_payment_type', TRUE);
										$registration_date_start = $this->input->post('registration_date_start', TRUE);
										$registration_date_end = $this->input->post('registration_date_end', TRUE);
										$date_start = $this->input->post('date_start', TRUE);
										$date_end = $this->input->post('date_end', TRUE);

										$g = $this->course->insert_course($code_course, $course, $description, $cost, $id_payment_type, $registration_date_start, $registration_date_end, $date_start, $date_end);
										echo $this->db->last_query().' = last query<br />';
										if($g)
											{
												$data['info'] = 'Success inserting data';
												$this->load->view('admin/add_course', $data);
											}
											else
											{
												$data['info'] = 'Something teribly happen. Please try again later';
												$this->load->view('admin/add_course', $data);
											}
									}
							}
					}
					else
					{
						redirect('/admin/myilmu/index', 'location');
					}
			}

		public function update_course()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$r = $this->uri->segment(4, 0);
						if (is_numeric($r))
							{
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$data['e'] = $this->course->course_id($r);
										$this->load->view('admin/update_course', $data);
									}
									else
									{
										//form process
										if($this->input->post('upd_course', TRUE))
											{
												$code_course = strtoupper(strtolower($this->input->post('code_course', TRUE)));
												$course = ucwords(strtolower($this->input->post('course', TRUE)));
												$description = ucwords(strtolower($this->input->post('description', TRUE)));
												$cost = $this->input->post('cost', TRUE);
												$id_payment_type = $this->input->post('id_payment_type', TRUE);
												$registration_date_start = $this->input->post('registration_date_start', TRUE);
												$registration_date_end = $this->input->post('registration_date_end', TRUE);
												$date_start = $this->input->post('date_start', TRUE);
												$date_end = $this->input->post('date_end', TRUE);
		
												$g = $this->course->update_course($r, $code_course, $course, $description, $cost, $id_payment_type, $registration_date_start, $registration_date_end, $date_start, $date_end);
												if($g)
													{
														$data['e'] = $this->course->course_id($r);
														$data['info'] = 'Success updating data';
														$this->load->view('admin/update_course', $data);
													}
													else
													{
														$data['e'] = $this->course->course_id($r);
														$data['info'] = 'Something teribly happen. Please try again later';
														$this->load->view('admin/update_course', $data);
													}
											}
									}
							}
					}
					else
					{
						redirect('/admin/myilmu/index', 'location');
					}
			}

		public function delete_course()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$r = $this->uri->segment(4, 0);
						if (is_numeric($r))
							{
								echo $this->uri->segment(4, 0);
								$t = $this->course->delete_course($r);
								if ($t)
									{
										redirect ('/admin/myilmu/add_course', 'location');
									}
							}
					}
					else
					{
						redirect('/admin/myilmu/index', 'location');
					}
			}

		public function user()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$this->load->view('admin/user');
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function teacher()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$this->load->view('admin/teacher');
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function student()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$this->load->view('admin/student');
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function bursary()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						
						$this->load->view('admin/bursary');
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function profile()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$data['l'] = $this->user->user_username($this->session->userdata('username'));
						$this->load->view('admin/profile', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function edit()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['f'] = $this->user->user_username($this->session->userdata('username'));
								$this->load->view('admin/edit', $data);
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
												redirect('/admin/myilmu/profile', 'location');
											}
											else
											{
												$data['info'] = 'Something went teribly wrong. Please try again later.';
												$this->load->view('admin/edit', $data);
											}
									}
							}
					}
					else
					{
						redirect('/admin/myilmu/index', 'location');
					}
			}

		public function change_password()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/change_password');
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
														$this->load->view('admin/change_password', $data);
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
																$this->load->view('admin/change_password', $data);
															}
															else
															{
																$data['info'] = 'Something teribly happen. Please try again later';
																$this->load->view('admin/change_password', $data);
															}
													}
											}
											else
											{
												$data['info'] = 'Please try again because this is not your current password';
												$this->load->view('admin/change_password', $data);
											}
									}
							}
					}
					else
					{
						redirect('/admin/myilmu/index', 'location');
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
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
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
						redirect('/admin/myilmu/index', 'location');
					}
			}
*/
#############################################################################################################################
	}

/* End of file myilmu.php */
/* Location: ./application/controllers/user/myilmu.php */