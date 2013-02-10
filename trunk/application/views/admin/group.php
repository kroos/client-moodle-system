<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Group</h1>

		<p></p>

		<p><font color="#FF0000"><?=@$info?></font></p>

		<?=form_open()?>
		<div class="form_settings">

			<p><span>Group : </span>
			<?=form_input(array('name' => 'group', 'value' => set_value('group'), 'maxlength' => '20', 'size' => '10'))?>
			<br /><?=form_error('group')?>
			</p>

			<p><span>&nbsp;</span><?=form_submit('add_group', 'Add Group', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if ($l->num_rows() > 0):?>
		<table style="width:100%; border-spacing:0;">
			<thead>
				<th>ID</th>
				<th>Group</th>
				<th>&nbsp;</th>
			</thead>
			<?foreach($l->result() AS $g):?>
				<tr>
					<td><div class="demo"><?=anchor('admin/myilmu/edit_group/'.$g->id, $g->id, 'title="Edit Group '.$g->id.'"')?></div></td>
					<td><?=$g->group?></td>
					<td><div class="demo"><?=anchor('admin/myilmu/del_group/'.$g->id, 'Delete', 'title="Delete Group '.$g->id.'"')?></div></td>
				</tr>
			<?endforeach?>
		</table>
		<?else:?>
		<p>No group created yet</p>
		<?endif?>
	<? endblock() ?>

<? end_extend() ?>