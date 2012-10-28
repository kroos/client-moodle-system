<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Login</h1>
		<p><?=@$info?></p>
		<?=form_open('')?>
		<div class="form_settings">
			<p><span>Name : </span>
			<?=form_input(array('name' => 'name', 'value' => set_value('name'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('name')?>
			</p>
			<p><span>Email : </span>
			<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('email')?>
			</p>
			<p><span>Message : </span>
			<?=form_textarea(array('name' => 'message', 'value' => set_value('message'), 'cols' => '20', 'rows' => '5'))?>
			<?=form_error('message')?>
			</p>

			<p><span>Image Verification <?=$cap['image']?> : </span>
			<?=form_input(array('name' => 'verify', 'value' => set_value('verify'), 'maxlength' => '5', 'size' => '5'))?>
			<?=form_error('verify')?></p>
			<p><span>&nbsp;</span><?=form_submit('contact', 'Contact Us', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>