<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Enrol Course</h1>
		<p>Are you sure you wanna enroll <b><?=$uy->row()->course?></b> course?</p>
		<p>The fee of the course is RM<b><?=$uy->row()->cost?></b>.</p>
		<p><?=anchor('user/myilmu/enrol/'.$this->uri->segment(4, 0), 'YES', array('title' => 'YES'))?>&nbsp;&nbsp;&nbsp;<?=anchor('user/myilmu', 'NO', array('title' => 'NO'))?></p>
	<? endblock() ?>

<? end_extend() ?>