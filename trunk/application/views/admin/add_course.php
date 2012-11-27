<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Add Course</h1>
		<h2>Adding New Course</h2>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<?=form_open()?>
		<div class="form_settings">
			<p><span>Code Course : </span>
			<?=form_input(array('name' => 'code_course', 'value' => set_value('code_course'), 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('code_course')?>
			</p>

			<p><span>Course Name : </span>
			<?=form_input(array('name' => 'course', 'value' => set_value('course'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('course')?>
			</p>

			<p><span>Description : </span>
			<?=form_textarea(array('name' => 'description', 'value' => set_value('description'), 'cols' => '20', 'rows' => '10'))?>
			<?=form_error('description')?>
			</p>

			<p><span>Fees (RM) : </span>
			<?=form_input(array('name' => 'cost', 'value' => set_value('cost'), 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('cost')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('add_course', 'Add Course', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
		
		<p>&nbsp;</p>
		<h2>Update or deleting course</h2>
		<?if($u->num_rows() < 1):?>
			<p>No course created yet</p>
		<?else:?>
		<div class="demo"><?=$pagination?></div>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Code Course</b></td>
					<td><b>Course</b></td>
					<td><b>Description</b></td>
					<td><b>Fees (RM)</b></td>
					<td>&nbsp;</td>
				</tr>
					<?foreach($u->result() as $h):?>
						<tr>
							<td><?=$h->code_course?></td>
							<td><?=$h->course?></td>
							<td><?=$h->description?></td>
							<td><?=$h->cost?></td>
							<td><div class="demo"><?=anchor('admin/myilmu/update_course/'.$h->id, 'Edit', array('title' => 'Edit'))?><br /><?=anchor('admin/myilmu/delete_course/'.$h->id, 'Delete', array('title' => 'Delete'))?></div></td>
						</tr>
					<?endforeach?>
			</table>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>