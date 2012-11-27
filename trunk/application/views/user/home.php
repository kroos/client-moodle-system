<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Course List</h1>
		<p>Welcome to <?=$this->config->item('title')?> Tution Center. You may enrol more course from here.</p>
		<p><font color="#FF0000"><?=@$info?></font></p>
		<?if($a->num_rows() < 1):?>
			<p><b>All course learned already.</b></p>
		<?else:?>
		<div class="demo"><?=$paginate?></div>
			<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th><b>Code Course</b></th>
					<th><b>Course</b></th>
					<th><b>Description</b></th>
					<th><b>Fee</b></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($a->result() as $t):?>
					<?$r = $this->user_code_course->user_code_course($this->session->userdata('username'), $t->id)	//untuk hilangkan course yang dah diambil?>
					<?if($r->num_rows > 0):?>
					<?else:?>
						<tr>
							<td><?=$t->code_course?></td>
							<td><?=$t->course?></td>
							<td><?=$t->description?></td>
							<td>RM <?=$t->cost?></td>
							<td><div class="demo"><?=anchor('user/myilmu/buffer/'.$t->id, 'Enrol', array('title' => 'Enrol '.$t->course))?></div></td>
						</tr>
					<?endif?>
				<?endforeach?>
			</tbody>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>