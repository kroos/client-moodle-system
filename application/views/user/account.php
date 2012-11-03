<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Account</h1>
		<p>Your can check your account here. Please do not hesitate to call admin for any enquiries.</p>
		<?if($g->num_rows() < 1):?>
			<p><b>You havent enrol any course yet</b></p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Course Code</b></td>
					<td><b>Course</b></td>
					<td><b>Fee (RM)</b></td>
				</tr>
				<?$i = 0?>
				<?foreach($g->result() as $t):?>
					<tr>
						<td><?=$t->code_course?></td>
						<td><?=$t->course?></td>
						<td><?=$t->cost?><?$i += $t->cost?></td>
					</tr>
				<?endforeach?>
				<tr>
					<td colspan="2"><b>Total (RM)</b></td>
					<td><b><?=$i?></b></td>
				</tr>
			</table>
		<?endif?>

			<p>This is the payment you have made</p>
			<?if($o->num_rows() < 1):?>
				<p><b>You havent make any payment yet. Therefor, none course will be activate for you.</b></p>
			<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Date</b></td>
					<td><b>Reference</b></td>
					<td><b>Bank</b></td>
					<td><b>Payment (RM)</b></td>
				</tr>
				<?$ie = 0?>
				<?foreach($o->result() as $p):?>
					<tr>
						<td><?=datetime_view($p->date)?></td>
						<td><?=$p->reference?></td>
						<td><?=$p->bank?></td>
						<td><?=$p->payment?><?$ie += $p->payment?></td>
					</tr>
				<?endforeach?>
				<tr>
					<td colspan="3"><b>Total (RM)</b></td>
					<td><b><?=$ie?></b></td>
				</tr>
			</table>
			
			<p>Payment Pending : RM<?=$ie?> - RM<?=$i?> = RM<?=$ie-$i?></p>
			<?endif?>
	<? endblock() ?>

<? end_extend() ?>