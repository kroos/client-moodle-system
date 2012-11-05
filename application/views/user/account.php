<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Account</h1>
		<p>Your can check your account here. Please do not hesitate to contact admin for any enquiries.</p>

			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Course</b></td>
					<td><b>Payment(RM)</b></td>
					<td><b>Reference</b></td>
					<td><b>Date Payment</b></td>
					<td><b>Due Date</b></td>
					<td><b>Bank</b></td>
					<td><b>Remarks</b></td>
				</tr>
<?php
//1st sekali check course
foreach ($s->result() as $j)
	{
		//echo $j->id_course.' = id_course<br />'.$j->graduate.' = graduate<br />';
		
		//lps tu check type of payment
		$d = $this->course->course_id($j->id_course);
		foreach ($d->result() as $f)
			{
				//echo $f->id_payment_type.' = id_payment_type<br /><br />';
				//pecahkan antara payment type 1 dan 2
				//mula2 buat payment type 1 dulu...cuma check table user_payment_bank utk 1 entry shj
				$v = $this->user_payment_bank->user_payment_course($this->session->userdata('username'), $j->id_course);
				foreach($v->result() as $t)
					{
						echo '<tr>';
						if ($f->id_payment_type == 1)
							{
								echo '<td>'.$this->course->course_id($t->id_course)->row()->course.'</td>';
								echo '<td>'.$t->payment.'</td>';
								echo '<td>'.(empty($t->reference) ? 'No Reference' : $t->reference).'</td>';
								echo '<td>'.($t->date_payment == NULL ? 'No Date' : date_view($t->date_payment)).'</td>';
								echo '<td>'.date_view($t->date_due).'</td>';
								echo '<td>'.($t->id_bank == 0 ? 'No Bank' : $this->bank->bank_id($t->id_bank)->row()->bank).'</td>';
								echo '<td>'.$t->remarks.'</td>';
							}
							else
							{
								if ($f->id_payment_type == 2)
									{
										//terdiri dari beberapa waktu...
										//1. curdate < date_start
										//2. month_begin < curdate < month_end
										//3. date_end < curdate

										//echo $t->date_due.' = date due<br />';
										$bftd = $this->month->bftd($t->date_due)->row()->bftd;
										//echo $bftd.' = b4 14 days<br />';
										if ($bftd < date_db(now()))
											{
												echo '<td>'.$this->course->course_id($t->id_course)->row()->course.'</td>';
												echo '<td>'.$t->payment.'</td>';
												echo '<td>'.(empty($t->reference) ? 'No Reference' : $t->reference).'</td>';
												echo '<td>'.($t->date_payment == NULL ? 'No Date' : date_view($t->date_payment)).'</td>';
												echo '<td>'.date_view($t->date_due).'</td>';
												echo '<td>'.($t->id_bank == 0 ? 'No Bank' : $this->bank->bank_id($t->id_bank)->row()->bank).'</td>';
												echo '<td>'.$t->remarks.'</td>';
											}
											else
											{
												$me = $this->month->month_end($t->date_due)->row()->me;
												//echo $me.' = month end<br />';
												if (date_db(now()) < $me)
													{
														//echo 'after date_start<br /><br />';
													}
											}
									}
							}
						echo '</tr>';
					}
			}
	}
?>
			</table>
	<? endblock() ?>

<? end_extend() ?>