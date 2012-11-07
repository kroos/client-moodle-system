<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Edit Course</h1>
		<p>Adding New Course</p>
		<?if($u->num_rows() < 1):?>
			<p>No course created yet</p>
		<?else:?>
		<div><?=$pagination?></div>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Code Course</b></td>
					<td><b>Course</b></td>
					<td><b>Description</b></td>
					<td><b>Fees (RM)</b></td>
					<td><b>Payment Type</b></td>
					<td><b>Registration Start</b></td>
					<td><b>Registration End</b></td>
					<td><b>Course Start</b></td>
					<td><b>Course End</b></td>
					<td>&nbsp;</td>
				</tr>
					<?foreach($u->result() as $h):?>
						<tr>
							<td><?=$h->code_course?></td>
							<td><?=$h->course?></td>
							<td><?=$h->description?></td>
							<td><?=$h->cost?></td>
							<td><?=$h->id_payment_type?></td>
							<td><?=date_view($h->registration_date_start)?></td>
							<td><?=date_view($h->registration_date_end)?></td>
							<td><?=date_view($h->date_start)?></td>
							<td><?=date_view($h->date_end)?></td>
							<td>LINK</td>
						</tr>
					<?endforeach?>
			</table>
		<?endif?>

	<? endblock() ?>

<? end_extend() ?>