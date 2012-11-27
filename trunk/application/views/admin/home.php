<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>

		<h1>User List</h1>
		<?if ($q->num_rows() < 1):?>
			<p>No user yet</p>
		<?else:?>
			<p>Total User : <strong><?=$l->num_rows()?></strong></p>
			<div class="demo"><?=$paginate?></div>
			<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th><b>Name</b></th>
					<th><b>Course</b></th>
					<th><b>Fee (RM)</b></th>
					<th><b>Role</b></th>
					<th><b>Register</b></th>
					<th><b>Payment Status</b></th>
					<th><b>Date Payment</b></th>
				</tr>
			</thead>
			<tbody>
				<?foreach($q->result() as $g):?>
					<tr>
						<td><?=$g->name?></td>
						<td><?=$g->course?></td>
						<td><?=$g->cost?></td>
						<td><?=$g->user_role?></td>
						<td><?=date_view($g->date_reg)?></td>
						<td><?=$g->paid == 0 ? 'Unpaid' : 'Paid'?></td>
						<td><?=$g->paid == 0 ? 'No Payment Yet' : date_view($g->date_pay)?></td>
					</tr>
				<?endforeach?>
			</tbody>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>