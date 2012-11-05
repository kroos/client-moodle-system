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
					<td><b>Registration Date End</b></td>
					<td><b>Date Start</b></td>
					<td><b>Date End</b></td>
					<td><b>Fee</b></td>
					<td>&nbsp;</td>
				</tr>
				<?foreach($a->result() as $t):?>
					<tr>
						<td><?=$t->code_course?></td>
						<td><?=$t->course?></td>
						<td><?=$t->description?></td>
						<td><?=date_view($t->registration_date_end)?></td>
						<td><?=date_view($t->date_start)?></td>
						<td><?=date_view($t->date_end)?></td>
						<td>RM <?=$t->cost?> per <?=$this->payment_type->payment($t->id_payment_type)->row()->payment_recurring?></td>
						<td><div class="demo"><?=anchor('user/myilmu/buffer/'.$t->id, 'Enrol', array('title' => 'Enrol'))?></div></td>
					</tr>
				<?endforeach?>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>