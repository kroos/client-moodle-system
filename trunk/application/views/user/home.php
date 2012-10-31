<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Course List</h1>
		<p>Welcome to <?=$this->config->item('title')?> Tution Center. You may enrol more course from here.</p>
		<p><?=@$info?></p>
		<?if($a->num_rows() < 1):?>
			<p><b>All course learned already.</b></p>
		<?else:?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Code Course</b></td>
					<td><b>Course</b></td>
					<td><b>Description</b></td>
					<td><b>Period</b></td>
					<td><b>Fee</b></td>
					<td>&nbsp;</td>
				</tr>
						<?foreach($a->result() as $t):?>
								<tr>
									<td><?=$t->code_course?></td>
									<td><?=$t->course?></td>
									<td><?=$t->description?></td>
									<td><?=$t->week?> Week</td>
									<td>RM <?=$t->cost?></td>
									<td><div class="demo"><?=anchor('user/myilmu/buffer/'.$t->id, 'Enrol', array('title' => 'Enrol'))?></div></td>
								</tr>
						<?endforeach?>

			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>