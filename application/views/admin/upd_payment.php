<? extend('admin/base_template_admin') ?>

	<? startblock('head') ?>
		<title><?=$this->config->item('title')?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="This is a System <?=$this->config->item('title')?> integrated with e-learning." />
		<meta name="keywords" content="moodle, e-learning, learning online, web conference, islamic, islam" />
		<meta name="author" content="Zaugola" />
		<link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" type="image/x-icon" />
		<link href="<?=base_url()?>css/jquery/jquery-ui-1.9.1.custom.css" rel="stylesheet">
    <style>
    .ui-autocomplete-loading {
        background: white url('<?=base_url()?>images/ui-anim_basic_16x16.gif') right center no-repeat;
    }
    </style>

	<? endblock() ?>

	<? startblock('content') ?>
		<h1>Update Payment</h1>
		<h2>Student Make A Payment</h2>

		<p>Update Payment for <?=$r->row()->name?></p>
		<p><font color="#FF0000"><?=@$info?></font></p>

			<table style="width:100%; border-spacing:0;">
				<tr>
					<td>Course</td>
					<td>Payment Amount (RM)</td>
					<td>Payment Date</td>
					<td>Payment Bank</td>
					<td>Paid</td>
					<td>Remarks</td>
					<td>Fee (RM)</td>
					<td>&nbsp;</td>
				</tr>
	<?$b[] = '';?>
<?foreach($this->bank->bank()->result() as $f):?>
	<?$b[] = $f->bank;?>
<?endforeach?>

<?$l = $this->user_payment_bank->user_payment($r->row()->username)?>
<?$n = 0?>
				<?foreach($l->result() as $g):?>
				<?=form_open('', '', array('id' => $g->id))?>
				<?$s = $this->course->course_id($g->id_course)?>
					<tr>
						<td><?=$s->row()->course?></td>
						<td><?=form_input(array('name' => 'payment', 'value' => $g->payment, 'maxlength' => '5', 'size' => '5'))?><br /><?=form_error('payment')?></td>
						<td><?=form_input(array('name' => 'date_payment', 'value' => $g->date_payment, 'maxlength' => '10', 'size' => '10', 'id' => 'datepicke'.$n++))?><br /><?=form_error('date_payment')?></td>
						<td><?=form_dropdown('id_bank', $b, $g->id_bank)?><br /><?=form_error('id_bank')?></td>
						<td><?=form_dropdown('paid', array(0 => 'Unpaid', 1 => 'Paid'), $g->paid)?><br /><?=form_error('paid')?></td>
						<td><?=form_textarea(array('name' => 'remarks', 'value' => $g->remarks, 'rows' => '5', 'cols' => '20'))?><br /><?=form_error('remarks')?></td>
						<td><?=$s->row()->cost?></td>
						<td><?=form_submit('upd_payment', 'Update')?></td>
					</tr>
				<?=form_close()?>
				<?endforeach?>
			</table>
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
<?$i = 0?>
<?foreach($l->result() as $g):?>
				$( "#datepicke<?=$i++?>" ).datepicker({dateFormat: "yy-mm-dd", showButtonPanel: true, changeMonth: true, changeYear: true, showWeek: true, firstDay: 1});
<?endforeach?>
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>