<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>User List</h1>
		<?if ($q->num_rows() < 1):?>
			<p>No user yet</p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Name</b></td>
					<td><b>Role</b></td>
					<td><b>Status</b></td>
					<td><b>Course</b></td>
				</tr>
				<?foreach($q->result() as $g):?>
				<?$v = $this->user_code_course->user_course($g->username)?>
					<tr>
						<td><?=$g->name?></td>
						<td colspan="3" rowspan="1">
							<table border="0" width="100%">
								<?foreach($v->result() as $f):?>
								<tr>
									<?$y = $this->user_role->user_roles($f->id_user_role)?>
										<td><?=$y->row()->user_role?></td>
										<td><?=($f->graduate == 1 ? 'Graduate' : 'UnGraduate')?></td>
									<?$s = $this->course->course_id($f->id_course)?>
										<td><?=$s->row()->course?></td>
								</tr>
								<?endforeach?>
							</table>
						</td>
					</tr>
				<?endforeach?>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>