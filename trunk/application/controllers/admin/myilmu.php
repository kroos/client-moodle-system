<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myilmu extends CI_Controller 
	{
		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE )
					{
						$this->load->library('pagination');
						$config['base_url'] = base_url().'admin/myilmu/index';
						$config['total_rows'] = $this->view->user_course()->num_rows();
						$config['per_page'] = 5;
						$config['uri_segment'] = 4;
						$config['suffix'] = '.htm';
						$this->pagination->initialize($config);
						$data['q'] = $this->view->user_course_page($config['per_page'], $this->uri->segment(4, 0));

						$data['l'] = $this->user->user();
						$data['paginate'] = $this->pagination->create_links();
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

										$g = $this->course->insert_course($code_course, $course, $description, $cost);
										//echo $this->db->last_query().' = last query<br />';
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
		
												$g = $this->course->update_course($r, $code_course, $course, $description, $cost);
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
								//echo $this->uri->segment(4, 0);
								$rows = $this->user_code_course->GetWhere(array('id_course' => $r), NULL, NULL)->num_rows();
								if ($rows > 0)
									{
										$this->db->trans_start();
										$this->course->delete_course($r);
										$this->user_code_course->delete(array('id_course' => $r));
										$this->db->trans_complete();
									}
									else
									{
										$this->db->trans_start();
										$this->course->delete_course($r);
										$this->db->trans_complete();
									}

								if ($this->db->trans_status() === TRUE)
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
						$data['g'] = $this->group->GetAll(NULL, NULL);

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
										$group = $this->input->post('group', TRUE);
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
																$u = $this->user->insert_user($username, md5($password1), $name, $group, $ic, $address, $postal_code, $city, $state, $phone, $skype);
																$c = $this->user_code_course->insert_user_course($username, $course, $role, date_db(now()), 1, '0000-00-00', '0000-00-00', '0000-00-00');
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
																		$u = $this->user->insert_user($username, md5($password1), $name, $group, $ic, $address, $postal_code, $city, $state, $phone, $skype);
																		$c = $this->user_code_course->insert_user_course($username, $course, $role, date_db(now()), 1, '0000-00-00', '0000-00-00', '0000-00-00');
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
																				$u = $this->user->insert_user($username, md5($password1), $name, $group, $ic, $address, $postal_code, $city, $state, $phone, $skype);
																				$c = $this->user_code_course->insert_user_course($username, $course, $role, date_db(now()), 0, '0000-00-00', '0000-00-00', '0000-00-00');
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
																				$data['info'] = 'Sorry, you cant choose <strong>"ADM | Admin Course"</strong> as a course to the <strong>"Student"</strong> role. Please choose other course related to the student role.';
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
						if ($this->form_validation->run() == TRUE)
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
														$this->user_code_course->insert_user_course($teacher, $r, 3, date_db(now()), 1, '0000-00-00', '0000-00-00', '0000-00-00');
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
						//load pagination class
						$this->load->library('pagination');
						$config['base_url'] = base_url().'admin/myilmu/bursary';
						$config['total_rows'] = $this->user_code_course->Getuser_course()->num_rows();
						$config['per_page'] = 10;
						$config['uri_segment'] = 4;
						$config['suffix'] = '.htm';
						$this->pagination->initialize($config);
						$data['k'] = $this->user_code_course->Getuser_course_page($config['per_page'], $this->uri->segment(4, 0));
						//echo $this->db->last_query();

						$data['paginate'] = $this->pagination->create_links();

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								//form process
								if($this->input->post('search_ic', TRUE))
									{
										$case = $this->input->post('case', TRUE);
										foreach($case as $u)
											{
												//echo $u.' = id <br />'.$this->month->month_day(date_db(now()), 1, 0)->row()->nmp.' = 1 month<br />';
												//nak kena check course yg dah paid sbb nak kena update date_end
												$v = $this->user_code_course->ucc_id($u);
												foreach($v->result() as $y)
													{
														$g = $this->user_code_course->user_course($y->username);
														foreach($g->result() as $f)
															{
																//echo $y->username.' = username<br />'.$y->paid.' paid<br />'.$y->date_end.' = date_end<br />'.$y->id_course.' = id course<br />';
																if ($f->paid == 1 )
																	{
																		$n[] = $this->user_code_course->update_paid($y->username, 1, $this->month->month_day(date_db(now()), 1, 0)->row()->nmp);
																		//echo $f->username.' = username<br />'.$f->paid.' paid<br />'.$f->date_end.' = date_end<br />'.$f->id_course.' = id course<br />';
																	}
															}
													}
												$dat[] = $this->user_code_course->update_user_pay($u, 1, date_db(now()), date_db(now()), $this->month->month_day(date_db(now()), 1, 0)->row()->nmp);
											}
										if($dat)
											{
												$data['info'] = 'Success make a payment';
											}
											else
											{
												$data['info'] = 'Something teribly has happen. Please try again later';
											}
									}
							}
						$this->load->view('admin/bursary', $data);
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

		public function group()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('add_group', TRUE))
									{
										$group = ucwords(strtolower($this->input->post('group', TRUE)));
										$d = $this->group->insert(array('group' => $group));
										if($d)
											{
												$data['info'] = 'Succes insert data';
											}
											else
											{
												$data['info'] = 'Please try again later';
											}
									}
							}
						$data['l'] = $this->group->GetWhere('id <> 1 AND id <> 2 AND id <> 3', NULL, NULL);
						$this->load->view('admin/group', $data);
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function del_group()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$l = $this->uri->segment(4, 0);
						//echo $l;
						$k = $this->group->delete(array('id' => $l));
						if($k)
							{
								redirect('admin/myilmu/group', 'location');
							}
							else
							{
								redirect('admin/myilmu/group', 'location');
							}
					}
					else
					{
						redirect('', 'location');
					}
			}

		public function edit_group()
			{
				if ($this->session->userdata('logged_in') === TRUE && in_array('1', $this->session->userdata('role'), TRUE) === TRUE)
					{
						$i = $this->uri->segment(4, 0);
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('upd_group', TRUE))
									{
										$group = ucwords(strtolower($this->input->post('group', TRUE)));
										$d = $this->group->update(array('group' => $group), array('id' => $i));
										if($d)
											{
												redirect ('admin/myilmu/group', 'location');
											}
											else
											{
												$data['info'] = 'Please try again later';
											}
									}
							}
						$data['l'] = $this->group->GetWhere(array('id' => $i), NULL, NULL);
						$this->load->view('admin/edit_group', $data);
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