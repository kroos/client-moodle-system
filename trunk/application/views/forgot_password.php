<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Forgot Password</h1>
		<p><font color="#FF0000"><?=@$info?></font></p>
		<p>Please insert your username and your identity card number so that we can reset your password. The password will be sent to your email account.</p>
		<?=form_open('')?>
		<div class="form_settings">
			<p><span>Username : </span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('username')?>
			</p>
			<p><span>IC No. : </span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'maxlength' => '12', 'size' => '10'))?>
			<?=form_error('ic')?>
			</p>
			<p><span>&nbsp;</span><?=form_submit('forgot_pass', 'Sent Password', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>