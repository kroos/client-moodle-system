<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Add User</h1>

		<p>Please take note that you cant add more than 1 role to the same user</p>

		<p><font color="#FF0000"><?=@$info?></font></p>

		<?=form_open('')?>
		<div class="form_settings">

		<?foreach ($r->result() as $ro):?>
			<?$role[$ro->id] = $ro->user_role?>
		<?endforeach?>

			<p><span>User Role : </span>
			<?=form_dropdown('role', $role, set_value('role'))?>
			<br /><?=form_error('role')?>
			</p>

			<?if($c->num_rows() < 1):?>
				<?$course = array('' => 'All of the course have been ended')?>
			<?else:?>
				<?foreach ($c->result() as $co):?>
					<?$course[$co->id] = $co->code_course.'&nbsp;|&nbsp;'.$co->course?>
				<?endforeach?>
			<?endif?>

			<p><span>User to the course of : </span>
			<?=form_dropdown('course', $course, set_value('course'))?>
			<br /><?=form_error('course')?>
			</p>

			<?php
			if ($g->num_rows() < 1)
				{
					$f[NULL] = 'Please setup group';
				}
				else
				{
					foreach($g->result() AS $gr)
						{
							$f[$gr->id] = $gr->group;
						}
				}
			?>
			<p><span>User group : </span>
			<?=form_dropdown('group', $f, set_value('group'))?>
			<br /><?=form_error('group')?>
			</p>

			<p><span>Email Address : </span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '50', 'size' => '10'))?>
			<br /><?=form_error('username')?>
			</p>

			<p><span>Password : </span>
			<?=form_password(array('name' => 'password1', 'value' => set_value('password1'), 'maxlength' => '10', 'size' => '10'))?>
			<br /><?=form_error('password1')?>
			</p>

			<p><span>Confirm Password : </span>
			<?=form_password(array('name' => 'password2', 'value' => set_value('password2'), 'maxlength' => '10', 'size' => '10'))?>
			<br /><?=form_error('password2')?>
			</p>

			<p><span>Name : </span>
			<?=form_input(array('name' => 'name', 'value' => set_value('name'), 'maxlength' => '50', 'size' => '10'))?>
			<br /><?=form_error('name')?>
			</p>

			<p><span>Identity Card No. <b><i><font size="1">(120101021234)</font></i></b> : </span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'maxlength' => '12', 'size' => '10'))?>
			<br /><?=form_error('ic')?>
			</p>

			<p><span>Address : </span>
			<?=form_textarea(array('name' => 'address', 'value' => set_value('address'), 'rows' => '5', 'cols' => '10'))?>
			<br /><?=form_error('address')?>
			</p>

			<p><span>Postal Code : </span>
			<?=form_input(array('name' => 'postcode', 'value' => set_value('postcode'), 'maxlength' => '5', 'size' => '10'))?>
			<br /><?=form_error('postcode')?>
			</p>
<div class="ui-widget">
			<p><span>City : </span>
			<?=form_input(array('name' => 'city', 'value' => set_value('city'), 'maxlength' => '20', 'size' => '10', 'id' => 'city'))?>
			<br /><?=form_error('city')?>
			</p>
</div>
			<p><span>State : </span>
			<?=form_dropdown('state', $this->config->item('state'), set_value('state'))?>
			<br /><?=form_error('state')?>
			</p>

			<p><span>Mobile Number : </span>
			<?=form_input(array('name' => 'phone', 'value' => set_value('phone'), 'maxlength' => '20', 'size' => '10'))?>
			<br /><?=form_error('phone')?>
			</p>

			<p>It is strongly recommend that this user have an account with <?=anchor('http://www.skype.com', 'Skype', array('title' => 'Skype', 'target' => '_blank'))?> for the web conference, live interactions or live class.</p>
			<p><span>Skype ID : </span>
			<?=form_input(array('name' => 'skype', 'value' => set_value('skype'), 'maxlength' => '20', 'size' => '10'))?>
			<br /><?=form_error('skype')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('add_user', 'Add User', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

	<? endblock() ?>

<? end_extend() ?>