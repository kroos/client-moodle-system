<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Update Course</h1>
		<h2>Update <?=$e->row()->course?> Course</h2>
		<p><?=@$info?></p>

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

			<?foreach($this->payment_type->tpayment()->result() as $k):?>
				<?$opt[$k->id] = $k->payment_recurring?>
			<?endforeach?>

			<p><span>Payment Type : </span>
			<?=form_dropdown('id_payment_type', $opt, $e->row()->id_payment_type)?>
			<?=form_error('id_payment_type')?>
			</p>

			<p><span>Registration Date Start : </span>
			<?=form_input(array('name' => 'registration_date_start', 'value' => $e->row()->registration_date_start, 'id' => 'datepicker1', 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('registration_date_start')?>
			</p>

			<p><span>Registration Date End : </span>
			<?=form_input(array('name' => 'registration_date_end', 'value' => $e->row()->registration_date_end, 'id' => 'datepicker2', 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('registration_date_end')?>
			</p>

			<p><span>Course Date Start : </span>
			<?=form_input(array('name' => 'date_start', 'value' => $e->row()->date_start, 'id' => 'datepicker3', 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('date_start')?>
			</p>

			<p><span>Course Date End : </span>
			<?=form_input(array('name' => 'date_end', 'value' => $e->row()->date_end, 'id' => 'datepicker4', 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('date_end')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('upd_course', 'Save Course', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>