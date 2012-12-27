<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Course</h1>
		<p>You can attend your class from this menu when the class is available for you.</p>
			<?if ($s->num_rows() < 1):?>
				<p>&nbsp;</p>
			<?else:?>
<?php
foreach ($s->result() as $j)
	{
		$d = $this->course->course_id($j->id_course);
		//echo $d->row()->course.'<br />';
		//echo $d->row()->cost.'<br />';
		if ($j->paid == 1)
			{
				if(date_db(now()) >= $j->date_end)
					{
						echo '<p>The course <b>'.$d->row()->course.'</b> has ended. You may not go to the class anymore</p>';
					}
					else
					{
						echo  form_open($this->config->item('moodle_login'), 'target="_blank"', array('username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password')));
						echo '<div class="demo">'.form_submit('gotoclass', 'Go To Class '.$f->course).'</div>';
						echo form_close();
					}
			}
			else
			{
				echo '<p>We cant let you pass to your class <b>'.$d->row()->course.'</b> yet. Please make a payment <b>RM'.$d->row()->cost.'</b> to the admin before we can continue</p>';
			}
	}
?>
			<?endif?>

	<? endblock() ?>

<? end_extend() ?>