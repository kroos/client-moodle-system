<? extend('scenic_photo_two/main_template') ?>

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

	<? startblock('top_nav') ?>
		<li><?=anchor('admin/myilmu', 'Home', array('title' => 'Home'))?></li>
		<li><?=anchor('admin/myilmu/course', 'Course', array('title' => 'Course'))?>
			<ul>
				<li><?=anchor('admin/myilmu/add_course', 'Edit Course', array('title' => 'Edit Course'))?></li>
			</ul>
		</li>
		<li><?=anchor('admin/myilmu/bursary', 'Bursary', array('title' => 'Bursary'))?>
			<ul>
				<li><?=anchor('admin/myilmu/stud_payment', 'Bursary Report', array('title' => 'Bursary Report'))?></li>
			</ul>
		</li>
		<li><?=anchor('admin/myilmu/user', 'User', array('title' => 'User'))?>
			<ul>
				<li><?=anchor('admin/myilmu/teacher', 'Teacher', array('title' => 'Teacher'))?></li>
			</ul>
		</li>
		<li><?=anchor('admin/myilmu/profile', 'Profile', array('title' => 'Profile'))?>
			<ul>
				<li><?=anchor('admin/myilmu/change_password', 'Change Password', array('title' => 'Change Password'))?></li>
			</ul>
		</li>
		<li><?=anchor('admin/myilmu/logout', 'Logout', array('title' => 'Logout'))?></li>
	<? endblock() ?>

	<? startblock('top_sidebar') ?>
	<?$t = $this->user->login($this->session->userdata('username'), md5($this->session->userdata('password')))?>
		<h3>Profile</h3>
		<h4>Hello <?=$t->row()->name?></h4>
		<h5><?=datetime_view(now())?></h5>
		<?$y = $this->user_code_course->user_course($this->session->userdata('username'))?>
	<? endblock() ?>
	
	<? startblock('menu') ?>
		<li><?=anchor('admin/myilmu/tnc', 'Terms and Conditions', array('title' => 'Terms and Conditions'))?></li>
	<? endblock() ?>

	<? startblock('content') ?>
		<h1>Welcome to the scenic_photo_two template</h1>
		<p>This simple, fixed width website template is released under a <div class="demo"><a href="http://creativecommons.org/licenses/by/3.0">Creative Commons Attribution 3.0 Licence</a></div>. This means you are free to download and use it for personal and commercial projects. However, you <strong>must leave the 'design from css3templates.co.uk' link in the footer of the template</strong>.</p>
		<p>This template is written entirely in <strong>HTML5</strong> and <strong>CSS3</strong>. The photo used in the design was taken by me.</p>
		<p>You can view more free CSS3 web templates <a href="http://www.css3templates.co.uk">here</a>.</p>
		<p>This template is a fully documented 5 page website, with an <a href="examples.html">examples</a> page that gives examples of all the styles available with this design. There is also a working PHP contact form on the contact page.</p>
		<p><?=form_input(array('name' => 'tdate', 'value' => set_value('tdate'), 'id' => 'datepicker1', 'size' => '20', 'maxlength' => '20'))?></p>
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

				function log( message ) {
					$( "<div>" ).text( message ).prependTo( "#log" );
					$( "#log" ).scrollTop( 0 );
				}

				$( "#city" ).autocomplete({
					source: function( request, response ) {
						$.ajax({
							url: "http://ws.geonames.org/searchJSON",
							dataType: "jsonp",
							data: {
								featureClass: "P",
								style: "full",
								maxRows: 12,
								name_startsWith: request.term
							},
							success: function( data ) {
								response( $.map( data.geonames, function( item ) {
									return {
										label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
										value: item.name
									}
								}));
							}
						});
					},
					minLength: 2,
					select: function( event, ui ) {
						log( ui.item ?
							"Selected: " + ui.item.label :
							"Nothing selected, input was " + this.value);
					},
					open: function() {
						$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
					},
					close: function() {
						$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
					}
				});


				// add multiple select / deselect functionality
				$("#selectall").click(function () {
					$('.checkbox').attr('checked', this.checked);
				});

				// if all checkbox are selected, check the selectall checkbox
				// and viceversa
				$(".checkbox").click(function(){

					if($(".checkbox").length == $(".checkbox:checked").length) {
						$("#selectall").attr("checked", "checked");
					} else {
						$("#selectall").removeAttr("checked");
					}
				});



			});
		</script>
	<? endblock() ?>

<? end_extend() ?>