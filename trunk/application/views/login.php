<? extend('base_template') ?>

	<? startblock('content') ?>
		<h1>Login</h1>
		<p><?=@$info?></p>
		<?=form_open('')?>
		<div class="form_settings">
			<p><span>Username : </span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('username')?>
			</p>
			<p><span>Password : </span>
			<?=form_password(array('name' => 'password', 'value' => set_value('password'), 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('password')?>
			</p>
			<p><span>&nbsp;</span><?=form_submit('login', 'Login', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
		<p><?=anchor('myilmu/forgot_password', 'Forgot Password?', array('title' => 'Forgot password?'))?></p>
	<? endblock() ?>

<? end_extend() ?>