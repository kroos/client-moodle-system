<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
	
		<h1>Edit</h1>
		<p><?=@$info?></p>
		<p>You can edit your profile here</p>
		<?=form_open('')?>
		<div class="form_settings">
			<p><span>Name : </span>
			<?=form_input(array('name' => 'name', 'value' => $f->row()->name, 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('name')?>
			</p>

			<p><span>Address : </span>
			<?=form_textarea(array('name' => 'address', 'value' => $f->row()->address, 'rows' => '5', 'cols' => '10'))?>
			<?=form_error('address')?>
			</p>

			<p><span>Postal Code : </span>
			<?=form_input(array('name' => 'postcode', 'value' => $f->row()->postal_code, 'maxlength' => '5', 'size' => '10'))?>
			<?=form_error('postcode')?>
			</p>

			<p><span>City : </span>
			<?=form_input(array('name' => 'city', 'value' => $f->row()->city, 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('city')?>
			</p>

			<p><span>State : </span>
			<?=form_dropdown('state', $this->config->item('state'), $f->row()->state)?>
			<?=form_error('state')?>
			</p>

			<p><span>Mobile Number : </span>
			<?=form_input(array('name' => 'phone', 'value' => $f->row()->phone, 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('phone')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Save', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>