<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Update Course</h1>
		<h2>Update <?=$e->row()->course?> Course</h2>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<?=form_open('')?>
		<div class="form_settings">
			<p><span>Code Course : </span>
			<?=form_input(array('name' => 'code_course', 'value' => $e->row()->code_course, 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('code_course')?>
			</p>

			<p><span>Course Name : </span>
			<?=form_input(array('name' => 'course', 'value' => $e->row()->course, 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('course')?>
			</p>

			<p><span>Description : </span>
			<?=form_textarea(array('name' => 'description', 'value' => $e->row()->description, 'cols' => '20', 'rows' => '10'))?>
			<?=form_error('description')?>
			</p>

			<p><span>Fees (RM) : </span>
			<?=form_input(array('name' => 'cost', 'value' => $e->row()->cost, 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('cost')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('upd_course', 'Save Course', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>