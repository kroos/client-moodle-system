<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Student Payment</h1>
		<p></p>

		<?=form_open('')?>
		<div class="form_settings">

			<?$paid_status = array(0 => 'Unpaid', 1 => 'Paid')?>

			<p><span>Payment Status : </span>
			<?=form_dropdown('payment_status', $paid_status)?>
			<br /><?=form_error('payment_status')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('paid_stat', 'Get List', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if ($this->form_validation->run() == FALSE):?>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Name</b></td>
					<td><b>Course</b></td>
					<td><b>Payment(RM)</b></td>
					<td><b>Reference</b></td>
					<td><b>Date Payment</b></td>
					<td><b>Due Date</b></td>
					<td><b>Bank</b></td>
					<td><b>Remarks</b></td>
					<td><b>Fees (RM)</b></td>
				</tr>
<?php
$i = 0;
$e = 0;
//1st sekali check course
foreach ($y->result() as $j)
	{
		//lps tu check type of payment
		$d = $this->course->course_id($j->id_course);
		foreach ($d->result() as $f)
			{
				//pecahkan antara payment type 1 dan 2
				//mula2 buat payment type 1 dulu...cuma check table user_payment_bank utk 1 entry shj
				$v = $this->user_payment_bank->getuser_payment_course($j->id_course, $paid);
				foreach($v->result() as $t)
					{
						echo '<tr>';
						if ($f->id_payment_type == 1)
							{
								echo '<td>'.$this->user->user_username($t->username)->row()->name.'</td>';
								echo '<td>'.$this->course->course_id($t->id_course)->row()->course.'</td>';
								echo '<td>'.$t->payment.'</td>';
								$i += $t->payment;
								echo '<td>'.(empty($t->reference) ? 'No Reference' : $t->reference).'</td>';
								echo '<td>'.($t->date_payment == NULL ? 'No Date' : date_view($t->date_payment)).'</td>';
								echo '<td>'.date_view($t->date_due).'</td>';
								echo '<td>'.($t->id_bank == 0 ? 'No Bank' : $this->bank->bank_id($t->id_bank)->row()->bank).'</td>';
								echo '<td>'.$t->remarks.'</td>';
								echo '<td>'.$this->course->course_id($t->id_course)->row()->cost.'</td>';
								$e += $this->course->course_id($t->id_course)->row()->cost;
							}
							else
							{
								if ($f->id_payment_type == 2)
									{
										//terdiri dari beberapa waktu...
										//1. curdate < date_start
										//2. month_begin < curdate < month_end
										//3. date_end < curdate

										$bftd = $this->month->bftd($t->date_due)->row()->bftd;
										if ($bftd < date_db(now()))
											{
												echo '<td>'.$this->user->user_username($t->username)->row()->name.'</td>';
												echo '<td>'.$this->course->course_id($t->id_course)->row()->course.'</td>';
												echo '<td>'.$t->payment.'</td>';
												$i += $t->payment;
												echo '<td>'.(empty($t->reference) ? 'No Reference' : $t->reference).'</td>';
												echo '<td>'.($t->date_payment == NULL ? 'No Date' : date_view($t->date_payment)).'</td>';
												echo '<td>'.date_view($t->date_due).'</td>';
												echo '<td>'.($t->id_bank == 0 ? 'No Bank' : $this->bank->bank_id($t->id_bank)->row()->bank).'</td>';
												echo '<td>'.$t->remarks.'</td>';
												echo '<td>'.$this->course->course_id($t->id_course)->row()->cost.'</td>';
												$e += $this->course->course_id($t->id_course)->row()->cost;
											}
											else
											{
												$me = $this->month->month_end($t->date_due)->row()->me;
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
				<tr>
					<td colspan="2"><strong>Grand Total</strong></td>
					<td><strong><?=$i?></strong></td>
					<td colspan="5"></td>
					<td><strong><?=$e?></strong></td>
				</tr>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>