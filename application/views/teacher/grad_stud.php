<? extend('teacher/base_template_teacher') ?>

	<? startblock('content') ?>
		<h1>Graduate the Student</h1>
		<p>Please update student status once they finished their course. Its really important cos its related to the payment account.</p>
		<p><?=@$info?></p>

		<?if($c->num_rows() < 1):?>
			<p>You didnt teach any course yet</p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Courses</b></td>
					<td><b>Students</b></td>
					<td>&nbsp;</td>
				</tr>

				<?foreach($c->result() as $v):?>
				<?$b = $this->course->course_code($v->id_course, date_db(now()))?>
				<?$bt = $this->user_code_course->grad_course($v->id_course, 5, 0)?>
					<?if($b->num_rows() < 1):?>
						<tr>
							<td colspan="3">No course has finished</td>
						</tr>
					<?else:?>
						<tr>
							<td><?=$b->row()->course?></td>
							<td>
								<?if($bt->num_rows() < 1):?>
									No student enroll this subject
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
							<td>
								<?if($bt->num_rows() < 1):?>
									No student enroll this subject
								<?else:?>
									<table style="width:100%; border-spacing:0;">
									<?foreach ($bt->result() as $g):?>
									<?$hj = $this->user->user_username($g->username)?>
										<tr>
											<td><div class="demo"><?=anchor('teacher/myilmu/stud_grad/'.$hj->row()->id.'/'.$b->row()->id, 'Graduate '.$hj->row()->name, array('title' => 'Graduate '.$hj->row()->name))?></div></td>
										</tr>
									<?endforeach?>
									</table>
								<?endif?>
							</td>
						</tr>
					<?endif?>
				<?endforeach?>
			</table>
		<?endif?>

	<? endblock() ?>

<? end_extend() ?>