<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Course</h1>
		<p>You can attend your class from this menu when the class is available for you.</p>
		<p><?=$s->num_rows()?> course registered</p>
			<?if ($s->num_rows() < 1):?>
				<p>&nbsp;</p>
			<?else:?>
<?
						foreach ($s->result() as $j)
							{
								echo $j->id_course.' = id_course<br />'.$j->graduate.' = graduate<br /><br />';

								//then we check the type of the course, weather its a monthly (2) or lump sum (1)
								$d = $this->course->course_id($j->id_course);
								foreach ($d->result() as $f)
									{
										echo $f->id_payment_type.' = id_payment_type<br /><br />';

										//pecahkan antara payment type 1 dan 2
										//mula2 buat payment type 1 dulu...cuma check table user_payment_bank utk 1 entry shj
										if ($f->id_payment_type == 1)
											{
												$v = $this->user_payment_bank->user_payment_course($this->session->userdata('username'), $j->id_course);
												echo $v->row()->date_due.' = date_due<br /><br />';
												echo $v->row()->paid.' = paid<br /><br />';

												//check masa
												if ($f->date_start <= date_db(now()) && date_db(now()) <= $v->row()->date_due)
													{
														$data['klm'] = $f->course;
														echo $f->course.' = course<br /><br />';
														$this->load->view('user/course', $data);
													}
													else
													{
														//antara date_due hingga date_end
														if ($v->row()->date_due <= date_db(now()) && date_db(now()) <= $f->date_end)	//date end
															{
																//mai kita check...bayar ka x bayar....
																if ($v->row()->paid == 1)
																	{
																		//$data['info'] = 'Click below to go to your class';
																		echo $f->course.' = course paid<br /><br />';
																	}
																	else
																	{
																		if ($v->row()->paid == 0)
																			{
																				//$data['info'] = 'Sorry, you need to make a payment for this course.';
																				echo $f->course.' = course unpaid<br /><br />';
																			}
																	}
															}
															else
															{
																//class x start lagi...
																if (date_db(now()) < $f->date_start)
																	{
																		echo '<p>'.$f->course.' course not started yet. Course started at '.date_view($f->date_start).'</p>';
																	}
																
															}
													}
											}
											else
											{
												//payment type 2
												if ($f->id_payment_type == 2)
													{
													
													}
											}
									}
							}
?>
			<?endif?>
	<? endblock() ?>

<? end_extend() ?>