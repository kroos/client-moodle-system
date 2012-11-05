<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Course</h1>
		<p>You can attend your class from this menu when the class is available for you.</p>
			<?if ($s->num_rows() < 1):?>
				<p>&nbsp;</p>
			<?else:?>
<?php
foreach ($s->result() as $j)
	{
		//echo $j->id_course.' = id_course<br />'.$j->graduate.' = graduate<br /><br />';

		//then we check the type of the course, weather its a monthly (2) or lump sum (1)
		$d = $this->course->course_id($j->id_course);
		foreach ($d->result() as $f)
			{
				//echo $f->id_payment_type.' = id_payment_type<br /><br />';

				//pecahkan antara payment type 1 dan 2
				//mula2 buat payment type 1 dulu...cuma check table user_payment_bank utk 1 entry shj
				$v = $this->user_payment_bank->user_payment_course($this->session->userdata('username'), $j->id_course);

				if ($f->id_payment_type == 1)
					{
						//check masa
						//antara date_start dan date_due
						if ($f->date_start <= date_db(now()) && date_db(now()) <= $v->row()->date_due)
							{
								//pelepas buang bg anak murid
								//echo $f->course.' = course, paid not check<br /><br />';
								echo  form_open($this->config->item('moodle_login'), '', array('username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password')));
								echo '<div class="demo">'.form_submit('gotoclass', 'Go To Class '.$f->course).'</div>';
								echo form_close();
							}
							else
							{
								//antara date_due hingga date_end
								if ($v->row()->date_due <= date_db(now()) && date_db(now()) <= $f->date_end)	//date end
									{
										//mai kita check...bayar ka x bayar....
										if ($v->row()->paid == 1)
											{
												echo  form_open($this->config->item('moodle_login'), '', array('username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password')));
												echo '<div class="demo">'.form_submit('gotoclass', 'Go To Class '.$f->course).'</div>';
												echo form_close();
											}
											else
											{
												if ($v->row()->paid == 0)
													{
														echo '<p>Sorry, you need to make a payment for '.$f->course.' course.</p>';
														//echo $f->course.' = course unpaid<br /><br />';
													}
											}
									}
									else
									{
										//class x start lagi...
										if (date_db(now()) < $f->date_start)
											{
												echo '<p>Course '.$f->course.' not started yet. Course started at '.date_view($f->date_start).'</p>';
											}
											else
											{
												//course dah tamat
												if (date_db(now()) > $f->date_end)
													{
														echo '<p>Course '.$f->course.' ended. Course ended at '.date_view($f->date_end).'</p>';
													}
											}
									}
							}
					}
					else
					{
						//payment type 2
						if ($f->id_payment_type == 2)
							{
								//ada 4 jenis kategori masa
								//1. cur < begin_day
								//2. begin_day < cur < date_due
								//3. date_due < cur < last_day
								//4. date_end < cur
								//mari buat 1 1...

								//1. cur < date_start
								if (date_db(now()) < $f->date_start)
									{
										echo '<p>Course '.$f->course.' not started yet. Course started at '.date_view($f->date_start).'</p>';
									}
									else
									{
										//4. date_end < cur
										if (date_db(now()) > $f->date_end)
											{
												echo '<p>Course '.$f->course.' ended. Course ended at '.date_view($f->date_end).'</p>';
											}
											else
											{
												//check balik payment utk masa
												foreach ($v->result() as $j)
													{

														//2. begin_day < cur < date_due
														$ms = $this->month->month_start($j->date_due)->row()->ms;
														if ($ms <= date_db(now()) && date_db(now()) <= $j->date_due)
															{
																//tak payah check payment, lps sj bg kat student
																echo form_open($this->config->item('moodle_login'), '', array('username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password')));
																echo '<div class="demo">'.form_submit('gotoclass', 'Go To Class '.$f->course).'</div>';
																echo form_close();
															}
															else
															{
																//3. date_due < cur < last_day
																$me = $this->month->month_end($j->date_due)->row()->me;
																if ($j->date_due <= date_db(now()) && date_db(now()) <= $me)	//hujung bulan utk current date
																	{
																		//kat sini baru check payment
																		//mai kita check...bayar ka x bayar....
																		if ($j->paid == 1)
																			{
																				echo form_open($this->config->item('moodle_login'), '', array('username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password')));
																				echo '<div class="demo">'.form_submit('gotoclass', 'Go To Class '.$f->course).'</div>';
																				echo form_close();
																			}
																			else
																			{
																				if ($j->paid == 0)
																					{
																						echo '<p>Sorry, you need to make a payment for '.$f->course.' course.</p>';
																						//echo $f->course.' = course unpaid<br /><br />';
																					}
																			}
																	}
															}
													}
											}
									}
							}
					}
			}
	}
?>
			<?endif?>
	<? endblock() ?>

<? end_extend() ?>