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
						$data['r'] = $this->user_role->Getuser_roles();
						$data['c'] = $this->course->courseadmin();

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/user', $data);
							}
							else
							{
								//form process
								if ($this->input->post('add_user', TRUE))
									{
										$role = $this->input->post('role', TRUE);
										$course = $this->input->post('course', TRUE);
										$username = $this->input->post('username', TRUE);
										$password1 = $this->input->post('password1', TRUE);
										$password2 = $this->input->post('password2', TRUE);
										$name = ucwords(strtolower($this->input->post('name', TRUE)));
										$ic = $this->input->post('ic', TRUE);
										$address = ucwords(strtolower($this->input->post('address', TRUE)));
										$postal_code = $this->input->post('postcode', TRUE);
										$city = ucwords(strtolower($this->input->post('city', TRUE)));
										$state = ucwords(strtolower($this->input->post('state', TRUE)));
										$phone = $this->input->post('phone', TRUE);
										$skype = $this->input->post('skype', TRUE);

										//1st kena check adakah user ni dah wujud atau belum dlm db, check dalam 2 table. user & user_code_course
										$us = $this->user->user_username($username);
										$ucc = $this->user_code_course->user_code_course($username, $course);
										if($us->num_rows() > 0 || $ucc->num_rows() > 0)
											{
												$data['info'] = 'This user is in the system. Please use another account username.';
											}
											else
											{
												//bahagikan kpd 3 sbb role 3 dan 4 adalah sama
												//start dgn admin role
												if ($role == 1)
													{
														//so nak kena check id_course la puulak
														if ($course == 1)
															{
																//terus masukkan dalam db (2 table)
																$u = $this->user->insert_user($username, md5($password1), $name, $ic, $address, $postal_code, $city, $state, $phone, $skype);
																$c = $this->user_code_course->insert_user_course($username, $course, $role, 0, 1);
																if ($u && $c)
																	{
																		$data['info'] = 'Successfully insert the user';
																	}
																	else
																	{
																		$data['info'] = 'Something teribly has happen. Please try again later.';
																	}
															}
															else
															{
																$data['info'] = 'This user role is an <strong>"Administrator"</strong>, you should choose <strong>"ADM | Admin Course"</strong> as the course for the Administrator role';
															}
													}
													else
													{
														//cikgu kpd course
														if ($role == 3 || $role == 4)
															{
																if ($course != 1)
																	{
																		$u = $this->user->insert_user($username, md5($password1), $name, $ic, $address, $postal_code, $city, $state, $phone, $skype);
																		$c = $this->user_code_course->insert_user_course($username, $course, $role, 0, 1);
																		if ($u && $c)
																			{
																				$data['info'] = 'Successfully insert the user';
																			}
																			else
																			{
																				$data['info'] = 'Something teribly has happen. Please try again later.';
																			}
																	}
																	else
																	{
																		$data['info'] = 'Sorry, you cant choose <strong>"ADM | Admin Course"</strong> as a course to the <strong>"Teacher"</strong> role. Please choose other course related to the teacher role.';
																	}
															}
															else
															{
																//student kpd course
																if ($role == 5)
																	{
																		if ($course != 1)
																			{
																				//mula2 kena tau payment type
																				$cpt = $this->course->course_id($course);
																				$dyst = $cpt->row()->date_start;
																				$dyed = $cpt->row()->date_end;
																				if($cpt->row()->id_payment_type == 1)
																					{
																						//1 time payment off
																						//have to pay within 7 days after registration or after what??
																						//insert only 1 row data.... argghhh

																						$nmp = $this->month->month_day($dyst, 0, $this->config->item('day_payment') - 1)->row()->nmp;
																						$n = $this->user_payment_bank->insert_user_payment($username, $course, 0, '', NULL, $nmp, 0, 0, 'Please make a payment before '.date_view($nmp));
																						if ($n)
																							{
																								$data['info'] = 'Success register course';
																							}
																							else
																							{
																								$data['info'] = 'Something teribly wrong. Please try again later';
																							}
																					}
																					else
																					{
																						if ($cpt->row()->id_payment_type == 2)
																							{
																								if (date_db(now()) < $dyst)
																									{
																										//how many months for that course
																										$mn = $this->month->month($dyst, $dyed)->row()->month;	//must add 1 to the query
																										//echo $mn.' = month<br />';

																										//so insert $mn row to the user_payment_bank table
																										for ($i = 0; $i <= $mn; $i++)
																											{
																												//echo $i.' = count month<br />';
																												$nmp = $this->month->month_day($dyst, $i, $this->config->item('day_payment') - 1)->row()->nmp;
																												//echo $nmp.' = next month payment<br />';
																												$gh = $this->user_payment_bank->insert_user_payment($username, $course, 0, '', NULL, $nmp, 0, 0, 'Please make a payment before '.date_view($nmp));
																											}
																									}
																									else
																									{
																										if (date_db(now()) > $dyst)
																											{
																												//calculate how many months left from the start date
																												$mn = $this->month->month($dyst, $dyed)->row()->month;	//must add 1 to the query
																												//echo $mn.' = month<br />';

																												//so insert $mn row to the user_payment_bank table
																												for ($i = 0; $i <= $mn; $i++)
																													{
																														//echo $i.' = count month<br />';
																														$nmp = $this->month->month_day($dyst, $i, $this->config->item('day_payment') - 1)->row()->nmp;
																														//echo $nmp.' = next month payment<br />';
																														if (date_db(now()) < $nmp)
																															{
																																$gh = $this->user_payment_bank->insert_user_payment($this->session->userdata('username'), $course_id, 0, '', NULL, $nmp, 0, 0, 'Please make a payment before '.date_view($nmp));
																															}
																													}
																											}
																									}
																							}
																					}
																				$u = $this->user->insert_user($username, md5($password1), $name, $ic, $address, $postal_code, $city, $state, $phone, $skype);
																				$c = $this->user_code_course->insert_user_course($username, $course, $role, 0, 0);
																				if ($u && $c)
																					{
																						$data['info'] = 'Successfully insert the user';
																					}
																					else
																					{
																						$data['info'] = 'Something teribly has happen. Please try again later.';
																					}
																			}
																			else
																			{
																				$data['info'] = 'Sorry, you cant choose <strong>"ADM | Admin Course"</strong> as a course to the <strong>"Teacher"</strong> role. Please choose other course related to the teacher role.';
																			}
																	}
															}
													}
											}
										$this->load->view('admin/user', $data);
									}
							}
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
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						$data['user'] = $this->user->user();
						$data['course'] = $this->course->course();
						if ($this->form_validation->run() == FALSE)
							{
								//form
							}
							else
							{
								//form process
								if($this->input->post('submit', TRUE))
									{
										$teacher = $this->input->post('teacher', TRUE);
										$course = $this->input->post('course', TRUE);
										
										//terus masuk saja tp kena tau berapa subjek
										foreach ($course as $r)
											{
												//checking utk data yg dah ada dah..
												$uc = $this->user_code_course->user_code_course($teacher, $r);
												if ($uc->num_rows() < 1)
													{
														$this->user_code_course->insert_user_course($teacher, $r, 3, 0, 1);
													}
											}
										$data['info'] = 'Successfully adding user <strong>Teacher</strong> to the <strong>Course</strong>';
									}
							}
						$this->load->view('admin/teacher', $data);
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
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/bursary');
							}
							else
							{
								//form process
								if($this->input->post('search_ic', TRUE))
									{
										$ic = $this->input->post('ic', TRUE);
										$data['ic'] = $this->user->user_ic($ic);
										$this->load->view('admin/bursary', $data);
									}
							}
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function stud_payment()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/stud_payment');
							}
							else
							{
								//form process
								if ($this->input->post('paid_stat', TRUE))
									{
										$data['paid'] = $this->input->post('payment_status', TRUE);
										$data['y'] = $this->user_code_course->Getuser_course();
										$this->load->view('admin/stud_payment', $data);
									}
							}
					}
					else
					{
						redirect('/admin/myilmu/index', 'location');
					}
			}

		public function upd_payment()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$id = $this->uri->segment(4, 0);
						if(is_numeric($id))
							{
								$data['r'] = $this->user->user_id($id);
							}

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('admin/upd_payment', $data);
							}
							else
							{
								//form process
								if($this->input->post('upd_payment', TRUE))
									{
										$id = $this->input->post('id', TRUE);
										$payment = $this->input->post('payment', TRUE);
										$date_payment = $this->input->post('date_payment', TRUE);
										$id_bank = $this->input->post('id_bank', TRUE);
										$paid = $this->input->post('paid', TRUE);
										$remarks = ucwords(strtolower($this->input->post('remarks', TRUE)));
										
										$c = $this->user_payment_bank->update_user_payment_paid($id, $id_bank, $date_payment, $paid, $payment, $remarks);
										if($c)
											{
												$data['info'] = 'User have paid';
												$this->load->view('admin/upd_payment', $data);
											}
											else
											{
												$data['info'] = 'Something teribly has happen. Please try again later';
												$this->load->view('admin/upd_payment', $data);
											}
									}
							}
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