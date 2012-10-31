<? extend('user/base_template_user') ?>

	<? startblock('content') ?>
		<h1>Contact Admin</h1>
		<p><?=@$info?></p>
		<?=form_open('')?>
		<div class="form_settings">

			<p><span>Message : </span>
			<?=form_textarea(array('name' => 'message', 'value' => set_value('message'), 'cols' => '20', 'rows' => '5'))?>
			<?=form_error('message')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('send', 'Send', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<? endblock() ?>

<? end_extend() ?>