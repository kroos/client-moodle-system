<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Course List</h1>
		<p>Welcome to <?=$this->config->item('title')?> Tution Center. You may enrol more course from here.</p>
		<p><?=@$info?></p>
		<?if($a->num_rows() < 1):?>
			<p><b>No Course Have Been Created</b></p>
		<?else:?>
		<div class="demo"><?=@$paginate?></div>
			<table style="width:100%; border-spacing:0;">
			<thead
				<tr>
					<th><b>Course Code</b></th>
					<th><b>Course</b></th>
					<th><b>Description</b></th>
					<th><b>Fee</b></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($a->result() as $t):?>
						<tr>
							<td><b><?=$t->code_course?></b></td>
							<td><?=$t->course?></td>
							<td><?=$t->description?></td>
							<td>RM <?=$t->cost?></td>
							<td><div class="demo"><?=anchor('myilmu/enrol/'.$t->id, 'Enrol', array('title' => 'Enrol'))?></div></td>
						</tr>
				<?endforeach?>
			</tbody>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>