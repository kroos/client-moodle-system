<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Course List</h1>
		<?$rq = $this->course->course()?>
		<?if($rq->num_rows() < 1):?>
			<p><b>No Course Have Been Created</b></p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td>Course Code</td>
					<td>Course</td>
					<td>Description</td>
					<td>Period</td>
				</tr>
				<?foreach($rq->result() as $t):?>
					<tr>
						<td><?=$t->code_course?></td>
						<td><?=$t->course?></td>
						<td><?=$t->description?></td>
						<td><?=$t->week?></td>
					</tr>
				<?endforeach?>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>