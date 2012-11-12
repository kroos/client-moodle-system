<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Teacher</h1>
		<p>Use this page if you intend to add more roles to the current user</p>
		<p><?=@$info?></p>

		<?if ($user->num_rows() < 1):?>
			<p>No user at the moment</p>
		<?else:?>

			<!-- form -->
			<?=form_open()?>
			<div id="radioset">

			<p>1.	Please choose the teacher from the list<br />
			<?$i = 0?>
			<?$n = 0?>
				<?foreach ($user->result() as $u):?>
					<?$ur = $this->user_code_course->user_course($u->username)?>
					<?if (($ur->row()->id_user_role == 3) || ($ur->row()->id_user_role == 4)):?>
						<?=form_radio(array('name' => 'teacher', 'id' => 'radio'.$i++, 'value' => $u->username))?><label for="radio<?=$n++?>"><?=$u->name?></label><br />
					<?endif?>
				<?endforeach?>
			<?=form_error('teacher')?>
			</p>
			</div>

			<div id="format">
			<p>2.	Please choose the course from the list<br />
			<?$ii = 0?>
			<?$ni = 0?>
				<?foreach ($course->result() as $co):?>
						<?=form_checkbox(array('name' => 'course[]', 'id' => 'check'.$ii++, 'value' => $co->id))?><label for="check<?=$ni++?>"><?=$co->code_course?>&nbsp;|&nbsp;<?=$co->course?></label><br />
				<?endforeach?>
			<?=form_error('course')?>
			</p>
			</div>

			<div class="demo">
			<p>3.	Click this button once you are satisfied with the selection<br />
			<?=form_submit('submit', 'Add User to Course')?>
			</p>
			</div>
			<?=form_close()?>

		<?endif?>
	<? endblock() ?>

	<? startblock('jscript') ?>
		<script src="<?=base_url()?>js1/jquery/jquery-1.8.2.js"></script>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" ).button();
				$( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd", showButtonPanel: true, changeMonth: true, changeYear: true, showWeek: true, firstDay: 1});
				$( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd", showButtonPanel: true, changeMonth: true, changeYear: true, showWeek: true, firstDay: 1});
				$( "#datepicker3" ).datepicker({dateFormat: "yy-mm-dd", showButtonPanel: true, changeMonth: true, changeYear: true, showWeek: true, firstDay: 1});
				$( "#datepicker4" ).datepicker({dateFormat: "yy-mm-dd", showButtonPanel: true, changeMonth: true, changeYear: true, showWeek: true, firstDay: 1});
				$( "#radioset" ).buttonset();
				$( "#check" ).button();
				$( "#format" ).buttonset();
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>