<? extend('teacher/base_template_teacher') ?>

	<? startblock('content') ?>
		<h1>Profile</h1>
		<p><?=@$info?></p>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Name</b></td>
					<td><?=$l->row()->name?></td>
				</tr>
				<tr>
					<td><b>IC</b></td>
					<td><?=$l->row()->IC?></td>
				</tr>
				<tr>
					<td><b>Address</b></td>
					<td><?=$l->row()->address?><br /><?=$l->row()->postal_code?>, <?=$l->row()->city?><br /><?=$l->row()->state?></td>
				</tr>
				<tr>
					<td><b>Phone</b></td>
					<td><?=$l->row()->phone?></td>
				</tr>
				<tr>
					<td><b>Skype</b></td>
					<td><?=$l->row()->skype?></td>
				</tr>
			</table>
			<p><div class="demo"><?=anchor('teacher/myilmu/edit', 'Edit', array('title' => 'Edit'))?></div></p>
	<? endblock() ?>

<? end_extend() ?>