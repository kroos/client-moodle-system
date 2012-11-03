<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Account</h1>
		<p>Your can check your account here. Please do not hesitate to contact admin for any enquiries.</p>

			<p>Pending payment.</p>
			<?if($o->num_rows() < 1):?>
				<p><b>All of the fees have been paid.</b></p>
			<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Course</b></td>
					<td><b>Date Due</b></td>
					<td><b>Status</b></td>
					<td><b>Remarks</b></td>
					<td><b>Fee (RM)</b></td>
				</tr>
				<?$ie = 0?>
				<?foreach($o->result() as $p):?>
					<tr>
						<td><?=$this->course->course_id($p->id)->row()->course?></td>
						<td><?=date_view($p->date_due)?></td>
						<td>Unpaid</td>
						<td><?=$p->remarks?></td>
						<td><?=$p->cost?><?$ie += $p->cost?></td>
					</tr>
				<?endforeach?>
				<tr>
					<td colspan="4"><b>Total (RM)</b></td>
					<td><b><?=$ie?></b></td>
				</tr>
			</table>
			<?endif?>


			<p>Cleared payment.</p>
			<?if($a->num_rows() < 1):?>
				<p><b>None of the fees have been paid.</b></p>
			<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Course</b></td>
					<td><b>Date Payment</b></td>
					<td><b>Status</b></td>
					<td><b>Reference</b></td>
					<td><b>Bank</b></td>
					<td><b>Remarks</b></td>
					<td><b>Amount (RM)</b></td>
				</tr>
				<?$ie = 0?>
				<?foreach($a->result() as $p):?>
					<tr>
						<td><?=$this->course->course_id($p->id)->row()->course?></td>
						<td><?=date_view($p->date_payment)?></td>
						<td>Paid</td>
						<td><?=$p->reference?></td>
						<td><?=$this->bank->bank_id($p->id_bank)->row()->bank?></td>
						<td><?=$p->remarks?></td>
						<td><?=$p->payment?><?$ie += $p->payment?></td>
					</tr>
				<?endforeach?>
				<tr>
					<td colspan="6"><b>Total (RM)</b></td>
					<td><b><?=$ie?></b></td>
				</tr>
			</table>
			<?endif?>
	<? endblock() ?>

<? end_extend() ?>