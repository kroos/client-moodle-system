<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Update Group</h1>

		<p></p>

		<p><font color="#FF0000"><?=@$info?></font></p>

		<?=form_open()?>
		<div class="form_settings">

			<p><span>Group : </span>
			<?=form_input(array('name' => 'group', 'value' => $l->row()->group, 'maxlength' => '20', 'size' => '10'))?>
			<br /><?=form_error('group')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('upd_group', 'Update', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

	<? endblock() ?>

<? end_extend() ?>