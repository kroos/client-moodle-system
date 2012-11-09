<? extend('base_template') ?>

	<? startblock('content') ?>
    <style>
    .ui-autocomplete-loading {
        background: white url('<?=base_url()?>images/ui-anim_basic_16x16.gif') right center no-repeat;
    }
    #city {  }
    </style>
		<h1>Enrollment <?=$q->course?> Programme</h1>
		<p><?=@$info?></p>
		<p>If you had register already and wanted to add more course, please login and enrol more course from the portal menu.</p>
		<?=form_open('')?>
		<div class="form_settings">
			<p><span>Email Address : </span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('username')?>
			</p>

			<p><span>Password : </span>
			<?=form_password(array('name' => 'password1', 'value' => set_value('password1'), 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('password1')?>
			</p>

			<p><span>Confirm Password : </span>
			<?=form_password(array('name' => 'password2', 'value' => set_value('password2'), 'maxlength' => '10', 'size' => '10'))?>
			<?=form_error('password2')?>
			</p>

			<p><span>Name : </span>
			<?=form_input(array('name' => 'name', 'value' => set_value('name'), 'maxlength' => '50', 'size' => '10'))?>
			<?=form_error('name')?>
			</p>

			<p><span>Identity Card No. <b><i><font size="1">(120101021234)</font></i></b> : </span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'maxlength' => '12', 'size' => '10'))?>
			<?=form_error('ic')?>
			</p>

			<p><span>Address : </span>
			<?=form_textarea(array('name' => 'address', 'value' => set_value('address'), 'rows' => '5', 'cols' => '10'))?>
			<?=form_error('address')?>
			</p>

			<p><span>Postal Code : </span>
			<?=form_input(array('name' => 'postcode', 'value' => set_value('postcode'), 'maxlength' => '5', 'size' => '10'))?>
			<?=form_error('postcode')?>
			</p>
<div class="ui-widget">
			<p><span>City : </span>
			<?=form_input(array('name' => 'city', 'value' => set_value('city'), 'maxlength' => '20', 'size' => '10', 'id' => 'city'))?>
			<?=form_error('city')?>
			</p>
</div>
			<p><span>State : </span>
			<?=form_dropdown('state', $this->config->item('state'), set_value('state'))?>
			<?=form_error('state')?>
			</p>

			<p><span>Mobile Number : </span>
			<?=form_input(array('name' => 'phone', 'value' => set_value('phone'), 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('phone')?>
			</p>

			<p>We strongly recommend that you have an account with <?=anchor('http://www.skype.com', 'Skype', array('title' => 'Skype', 'target' => '_blank'))?> for our web conference, live interactions and live class.</p>
			<p><span>Skype ID : </span>
			<?=form_input(array('name' => 'skype', 'value' => set_value('skype'), 'maxlength' => '20', 'size' => '10'))?>
			<?=form_error('skype')?>
			</p>

			<p><span>Image Verification <?=$cap['image']?> : </span>
			<?=form_input(array('name' => 'verify', 'value' => set_value('verify'), 'maxlength' => '5', 'size' => '5'))?>
			<?=form_error('verify')?></p>

			<p><span>&nbsp;</span><?=form_submit('signup', 'Sign Up', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>