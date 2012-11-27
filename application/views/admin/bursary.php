<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Bursary</h1>
		<h2>Student Make A Payment</h2>
		<p><font color="#FF0000"><?=@$info?></font></p>
		<?if ($k->num_rows() < 1):?>
			<p>No Unpaid User</p>
		<?else:?>
			<?=form_open()?>
			<div class="form_settings">
				<div class="demo"><?=$paginate?></div>
				<table style="width:100%; border-spacing:0;">
				<thead>
					<tr>
						<th><input type="checkbox" class="checkbox" id="selectall" /></th>
						<th><b>Name</b></th>
						<th><b>Course</b></th>
						<th><b>Fee (RM)</b></th>
						<th><b>Register</b></th>
						<th><b>Payment Status</b></th>
						<th><b>Date Payment</b></th>
					</tr>
				</thead>
				<tbody>
					<?$i = 0?>
					<?$ih = 0?>
					<?$ik = 0?>
					<?$im = 0?>
					<?foreach($k->result() as $g):?>
					<?$r = $this->user->user_username($g->username)?>
					<?$o = $this->course->course_id($g->id_course)?>
					<tr>
						<td>
						<?=$g->paid == 0 ? '
						<input type="checkbox" class="checkbox" name="case[]" value="'.$g->id.'" />
						' : '&nbsp;'?><br /><?=form_error('case[]')?>
						</td>
						<td><?=$r->row()->name?></td>
						<td><?=$o->row()->course?></td>
						<td><?=$o->row()->cost?><?$g->paid == 0 ? $i = $i + $o->row()->cost : $im = $im + $o->row()->cost?></td>
						<td><?=date_view($g->date_reg)?></td>
						<td><?=$g->paid == 0 ? 'Unpaid' : 'Paid'?></td>
						<td><?=$g->paid == 0 ? 'No Payment Yet' : date_view($g->date_pay)?></td>
					</tr>
					<?endforeach?>
					<tr>
						<td colspan="3"><strong>Total Unpaid</strong></td>
						<td><strong><?=$i?></strong></td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3"><strong>Total Paid</strong></td>
						<td><strong><?=$im?></strong></td>
						<td colspan="3">&nbsp;</td>
					</tr>
				</tbody>
				</table>
				<p><span>&nbsp;</span><?=form_submit('search_ic', 'Make Payment', 'class="submit"')?></p>
			</div>
			<?=form_close()?>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>