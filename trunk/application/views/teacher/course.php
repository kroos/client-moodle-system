<? extend('teacher/base_template_teacher') ?>

	<? startblock('content') ?>
		<h1>Course</h1>
		<p>Click below to the class</p>
<?php
	echo  form_open($this->config->item('moodle_login'), 'target="_blank"', array('username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password')));
	echo '<div class="demo">'.form_submit('gotoclass', 'Go To Learning Management System').'</div>';
	echo form_close();
?>
	<? endblock() ?>

<? end_extend() ?>