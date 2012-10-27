<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Course List</h1>
		<?if($a->num_rows() < 1):?>
			<p><b>No Course Have Been Created</b></p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td>Course Code</td>
					<td>Course</td>
					<td>Description</td>
					<td>Period</td>
					<td>&nbsp;</td>
				</tr>
				<?foreach($a->result() as $t):?>
					<tr>
						<td><?=$t->code_course?></td>
						<td><?=$t->course?></td>
						<td><?=$t->description?></td>
						<td><?=$t->week?> Week</td>
						<td><div class="demo"><?=anchor('myilmu/enrol', 'Enrol', array('title' => 'Enrol'))?></div></td>
					</tr>
				<?endforeach?>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>