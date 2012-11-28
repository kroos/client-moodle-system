<? extend('teacher/base_template_teacher') ?>

	<? startblock('content') ?>
		<h1>Home</h1>
		<p><?=@$info?></p>

		<?if($c->num_rows() < 1):?>
			<p>You didnt assign to any course yet</p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th><b>Courses</b></th>
					<th><b>Students</b></th>
				</tr>
			</thead>
			<tbody>

				<?foreach($c->result() as $v):?>
				<?$b = $this->course->course_id($v->id_course)?>
				<?$bt = $this->user_code_course->grad_course($v->id_course, 5, 1)?>

					<tr>
						<td><?=$b->row()->course?></td>
						<td>
							<?if($bt->num_rows() < 1):?>
								No student enroll this course
							<?else:?>
								<table style="width:100%; border-spacing:0;">
								<?foreach ($bt->result() as $g):?>
								<?$hj = $this->user->user_username($g->username)?>
									<tr>
										<td><?=$hj->row()->name?></td>
									</tr>
								<?endforeach?>
								</table>
							<?endif?>
						</td>
					</tr>
				<?endforeach?>
			</tbody>
			</table>
		<?endif?>

	<? endblock() ?>

<? end_extend() ?>