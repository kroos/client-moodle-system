<!DOCTYPE HTML>
<html>

<head>
<? start_block_marker('head') ?>

<? end_block_marker() ?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/scenic_photo_two.css" />
<!-- modernizr enables HTML5 elements and feature detects -->
<script type="text/javascript" src="<?=base_url()?>js/modernizr-1.5.min.js"></script>
</head>

<body>
	<div id="main">
		<header>
			<div id="logo">
				<div id="logo_text">
					<!-- class="logo_colour", allows you to change the colour of the text -->
					<h1><a href="<?=base_url()?>"><?=$this->config->item('title')?><span class="logo_colour"> Tution Center</span></a></h1>
					<h2>Simple. Contemporary. Reliable.</h2>
				</div>
			</div>
			<nav>
				<div id="menu_container">
					<ul class="sf-menu" id="nav">

<? start_block_marker('top_nav') ?>

<? end_block_marker() ?>

					</ul>
				</div>
			</nav>
		</header>
		<div id="site_content">
			<div id="sidebar_container">
				<div class="sidebar">
		
<? start_block_marker('top_sidebar') ?>

<? end_block_marker() ?>

				</div>
				<div class="sidebar">
					<h3>Menu</h3>
					<ul>
<? start_block_marker('menu') ?>

<? end_block_marker() ?>

					</ul>
				</div>
			</div>
			<div class="content">

<? start_block_marker('content') ?>

<? end_block_marker() ?>

			</div>
		</div>
		<footer>
			<p>Page rendered in <strong>{elapsed_time}</strong> seconds using <strong>{memory_usage}</strong><br />Copyright &copy; Ayus Trading | <?=anchor(base_url(), 'Make Way With Us..', array('title' => 'Make Way With Us..'))?></p>
		</footer>
	</div>
<p>&nbsp;</p>
<!-- javascript at the bottom for fast page loading -->
<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.easing-sooper.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.sooperfish.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('ul.sf-menu').sooperfish();
});
</script>

<? start_block_marker('jscript') ?>

<? end_block_marker() ?>
</body>
</html>