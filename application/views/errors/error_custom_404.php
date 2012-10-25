<? extend('base_template') ?>


	<? startblock('top_nav') ?>
		<li><?=anchor(base_url(), 'Home', array('title' => 'Home'))?></li>
	<? endblock() ?>

	<? startblock('top_sidebar') ?>
	<? endblock() ?>
	
	<? startblock('menu') ?>
	<ul>
		<li><?=anchor(base_url(), 'Home', array('title' => 'Home'))?></li>
	</ul>
	<? endblock() ?>

	<? startblock('content') ?>
		<h1>Uh! Oh! Error 404.</h1>
		<p>The page you were trying to see is not there</p>
		<p><img border="0" src="<?=base_url()?>images/error/404.jpg" /></p>
		<h3>(but we still love you)</h3>
	<? endblock() ?>

<? end_extend() ?>