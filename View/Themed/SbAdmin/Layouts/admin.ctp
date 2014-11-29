<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if(!empty($sysetting)){
	$cakeDescription = __d('cake_dev',$sysetting['SystemSetting']['title']);
}else{
	$cakeDescription = __d('cake_dev', 'Inventory Management System');
}

?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');

		//bootstrap css
		echo $this->Html->css('bootstrap.min');

		//sb-admin css
		echo $this->Html->css('sb-admin');

		//morris chart
		echo $this->Html->css('plugins/morris');

		//font-awesome
		echo $this->Html->css('font-awesome-4.2.0/css/font-awesome.min.css');

		echo $this->Html->css('dataTables.bootstrap');
		echo $this->Html->css('dataTables.responsive');
		echo $this->Html->css('datetimepicker');
		echo $this->Html->css('vendor/chosen');

		//custom css file where you can use it later
		echo $this->Html->css('custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery');
		echo $this->Js->writeBuffer();

	?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
  <div id="wrapper">
	<?php echo $this->element('header'); ?>
	<?php echo $this->element('menu/sidebar');?>
	 <div id="page-wrapper">
       <div class="container-fluid">
       		<ol class="breadcrumb">
      		<?php echo $this->Html->getCrumbs(' > ', 'Home');?>
      		</ol>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>


	<?php echo $this->element('sql_dump'); ?>
	<?php
		echo $this->Html->script('jquery.dataTables.min');
		echo $this->Html->script('dataTables.responsive');
		echo $this->Html->script('dataTables.tableTools');
		echo $this->Html->script('dataTables.bootstrap');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('plugins/morris/morris.min');
		echo $this->Html->script('bootstrap-datepicker');
	 	echo $this->Html->script('vendor/chosen/chosen.jquery');
	 	echo $this->Html->script('dt-config');
	 	echo $this->Html->script('app');
		echo $this->fetch('script');
		
	?>

</body>
</html>
