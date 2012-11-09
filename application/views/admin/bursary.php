<? extend('admin/base_template_admin') ?>

	<? startblock('content') ?>
		<h1>Bursary</h1>
		<h2>Student Make A Payment</h2>
		<p>Insert student Identity Card number in this way "020101021234" not like this "020101-02-1234"</p>
		<?=form_open('')?>
		<div class="form_settings">
			<p><label for="ic"><span>Code Course : </span></label>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'maxlength' => '12', 'size' => '12', 'id' => 'ic'))?><br />
			<?=form_error('ic')?>
			</p>
			<p><span>&nbsp;</span><?=form_submit('search_ic', 'Search', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if ($this->form_validation->run() == TRUE):?>
			<table style="width:100%; border-spacing:0;">
				<tr>
					<td><b>Name</b></td>
					<td><b>IC</b></td>
					<td><b>Course</b></td>
				</tr>
				<?foreach($ic->result() as $g):?>
				
					<tr>
						<td><div class="demo"><?=anchor('admin/myilmu/upd_payment/'.$g->id, $g->name, array('title' => 'Update Payment for '.$g->name))?></div></td>
						<td><?=$g->IC?></td>
						<td>
							<table style="width:100%; border-spacing:0;">
								<?$v = $this->user_code_course->user_course($g->username)?>
								<?foreach($v->result() as $h):?>
									<tr>
										<td><?=$this->course->course_id($h->id_course)->row()->course?></td>
									</tr>
								<?endforeach?>
							</table>
						</td>
					</tr>
				<?endforeach?>
			</table>
		<?endif?>

	<? endblock() ?>

<? end_extend() ?>