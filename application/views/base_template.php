<? extend('scenic_photo_two/main_template') ?>

	<? startblock('head') ?>
		<title><?=$this->config->item('title')?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="This is a System <?=$this->config->item('title')?> integrated with e-learning." />
		<meta name="keywords" content="moodle, e-learning, learning online, web conference, islamic, islam" />
		<meta name="author" content="Zaugola" />
		<link rel="shortcut icon" href="<?=base_url()?>images/favicon.ico" type="image/x-icon" />
		<link href="<?=base_url()?>css/jquery/jquery-ui-1.9.0.custom.css" rel="stylesheet">
	<? endblock() ?>

	<? startblock('top_nav') ?>
		<li><?=anchor(base_url(), 'Home', array('title' => 'Home'))?></li>
		<li><a href="examples.html">Examples</a></li>
		<li><a href="page.html">A Page</a></li>
		<li><a href="another_page.html">Another Page</a></li>
		<li><a href="#">Example Drop Down</a>
		<ul>
			<li><a href="#">Drop Down One</a></li>
			<li><a href="#">Drop Down Two</a>
			<ul>
				<li><a href="#">Sub Drop Down One</a></li>
				<li><a href="#">Sub Drop Down Two</a></li>
				<li><a href="#">Sub Drop Down Three</a></li>
				<li><a href="#">Sub Drop Down Four</a></li>
				<li><a href="#">Sub Drop Down Five</a></li>
			</ul>
			</li>
			<li><a href="#">Drop Down Three</a></li>
			<li><a href="#">Drop Down Four</a></li>
			<li><a href="#">Drop Down Five</a></li>
		</ul>
		</li>
		<li><a href="contact.php">Contact Us</a></li>
	<? endblock() ?>

	<? startblock('top_sidebar') ?>
		<h3>Latest News</h3>
		<h4>New Website Launched</h4>
		<h5>January 1st, 2012</h5>
		<p>2012 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
	<? endblock() ?>
	
	<? startblock('menu') ?>
		<li><a href="#">First Link</a></li>
		<li><a href="#">Another Link</a></li>
		<li><a href="#">And Another</a></li>
		<li><a href="#">One More</a></li>
		<li><a href="#">Last One</a></li>
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
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.0.custom.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();
				$( "#radioset" ).buttonset();
			});
		</script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>