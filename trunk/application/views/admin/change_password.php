<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
	
		<h1>Change Password</h1>
		<p><font color="#FF0000"><?=@$info?></font></p>
		<p>You can change your password here</p>
		<?=form_open('')?>
		<div class="form_settings">

			<p><span>Current Password : </span>
			<?=form_password(array('name' => 'cpassword', 'value' => set_value('cpassword'), 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('cpassword')?>
			</p>

			<p><span>New Password : </span>
			<?=form_password(array('name' => 'npassword1', 'value' => set_value('npassword1'), 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('npassword1')?>
			</p>

			<p><span>Retype New Password : </span>
			<?=form_password(array('name' => 'npassword2', 'value' => set_value('npassword2'), 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('npassword2')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Save', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>