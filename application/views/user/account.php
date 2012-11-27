<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Account</h1>
		<p>You can check your account here. Please do not hesitate to contact admin for any enquiries.</p>

			<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th><b>Course</b></th>
					<th><b>Payment(RM)</b></th>
					<th><b>Date Payment</b></th>
				</tr>
			<thead>
			<tbody>
				<?foreach ($s->result() as $j) :?>
					<?$d = $this->course->course_id($j->id_course)?>
					<tr>
						<td><?=$d->row()->course?></td>
						<td><?=$j->paid == 0 ? '0' : $d->row()->cost?></td>
						<td><?=$j->paid == 0 ? 'No Payment Yet' : date_view($j->date_pay)?></td>
					</tr>
				<?endforeach?>
			<tbody>
			</table>
	<? endblock() ?>

<? end_extend() ?>