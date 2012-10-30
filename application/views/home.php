<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Course List</h1>
		<?if($a->num_rows() < 1):?>
			<p><b>No Course Have Been Created</b></p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Course Code</b></td>
					<td><b>Course</b></td>
					<td><b>Description</b></td>
					<td><b>Period</b></td>
					<td>&nbsp;</td>
				</tr>
				<?foreach($a->result() as $t):?>
					<tr>
						<td><b><?=$t->code_course?></b></td>
						<td><?=$t->course?></td>
						<td><?=$t->description?></td>
						<td><?=$t->week?> Week</td>
						<td><div class="demo"><?=anchor('myilmu/enrol/'.$t->id, 'Enrol', array('title' => 'Enrol'))?></div></td>
					</tr>
				<?endforeach?>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>