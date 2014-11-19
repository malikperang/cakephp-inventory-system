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

$cakeDescription = __d('cake_dev', 'Quicks Store');
?>
<!--DOCTYPE html-->
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	 <meta charset="utf-8">
    <meta http-equiv = "Content-Type" content="text/html; charset=utf-8">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		

	echo $this->Html->css('datepicker.css?v=1');

	echo $this->Html->css('fullcalendar.css?v=1');

	echo $this->Html->css('TableTools.css?v=1');

	echo $this->Html->css('bootstrap-wysihtml5.css?v=1');
	echo $this->Html->css('wysiwyg-color.css');

	echo $this->Html->css('toastr.custom.css?v=1');
	echo $this->Html->css('toastr-responsive.css?v=1');
	echo $this->Html->css('jquery.jgrowl.css?v=1');

	echo $this->Html->css('bootstrap.min.css?v=1');
	echo $this->Html->css('bootstrap-responsive.min.css?v=1');
	echo $this->Html->css('font-awesome.min.css?v=1');
	echo $this->Html->css('cus-icons.css?v=1');

	echo $this->Html->css('jarvis-widgets.css?v=1');

	echo $this->Html->css('DT_bootstrap.css?v=1');
	echo $this->Html->css('responsive-tables.css?v=1');

	echo $this->Html->css('uniform.default.css?v=1');
	echo $this->Html->css('select2.css?v=1');

	echo $this->Html->css('theme.css?v=1');
	echo $this->Html->css('theme-responsive.css?v=1');
	
	?>

<!-- // THEME CSS changed by javascript: the CSS link below will override the rules above // -->
	<!-- For more information, please see the documentation for "THEMES" -->
	<style type="text/css" id="switch-theme-js" href="http://localhost/my/quicksstore.com/theme/QuicksStore/css/themes/default.css?v=1"></style>

	<style type="text/css" id="switch-width" href="<?php echo $this->base . '/theme/QuicksStore/css/full-width.css?v=1';?>"></style>
<?php echo $this->Html->css('custom'); ?>
	<?php echo $this->fetch('css');?>
	<!--All javascripts are located at the bottom except for HTML5 Shim -->
   <!--HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]-->
   		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   		<?php echo $this->Html->script('"http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/respond.min.js');?>
<!--[endif]-->

	<!-- Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<!-- For Modern Browsers -->
	<link rel="shortcut icon" href="img/favicons/favicon.png">
	<!-- For everything else -->
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<!-- For retina screens -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-retina.png">
	<!-- For iPad 1-->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-ipad.png">
	<!-- For iPhone 3G, iPod Touch and Android -->
	<link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon.png">
	
	<!-- iOS web-app metas -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- Add your custom home screen title: -->
	<meta name="apple-mobile-web-app-title" content="Jarvis"> 

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
   
</head>
<body>
	<div class="height-wrapper">
		<?php //echo $this->element('admin_header'); ?> 
    	     	<?php echo $this->Session->flash(); ?>
						<?php //echo $this->Session->flash('auth'); ?>
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
			</div>
		<div class="push"></div>
	<footer>
		
	</footer>
 <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script>window.jQuery || document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/libs/jquery.min.js"><\/script>')</script>
    	<!-- OPTIONAL: Use this migrate script for plugins that are not supported by jquery 1.9+ -->
		<!-- DISABLED <script src="js/libs/jquery.migrate-1.0.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script>window.jQuery.ui || document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/libs/jquery.ui.min.js"><\/script>')</script>

    <!-- IMPORTANT: Jquery Touch Punch is always placed under Jquery UI -->
    <?php echo $this->Html->script('include/jquery.ui.touch-punch.min');?>
    
    <!-- REQUIRED: Mobile responsive menu generator -->
	<?php echo $this->Html->script('include/selectnav.min');?>

	<!-- REQUIRED: Datatable components -->
    <?php echo $this->Html->script('include/jquery.accordion.min');?>

	<!-- REQUIRED: Toastr & Jgrowl notifications  -->
    <?php echo $this->Html->script('include/toastr.min');?>
    <?php echo $this->Html->script('include/jquery.jgrowl.min');?>
    
    <!-- REQUIRED: Sleek scroll UI  -->
    <?php echo $this->Html->script('include/slimScroll.min');?>
	
	<!-- REQUIRED: Datatable components -->
	<?php echo $this->Html->script('include/jquery.dataTables.min');?>
	<?php echo $this->Html->script('include/DT_bootstrap.min');?>

    <!-- REQUIRED: Form element skin  -->
    <?php echo $this->Html->script('include/jquery.uniform.min');?>

	<!-- REQUIRED: AmCharts  -->
    <?php echo $this->Html->script('include/amchart/amcharts');?>
	<?php echo $this->Html->script('include/amchart/amchart-draw1');?>

<script type="text/javascript">
		var ismobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));	
	    if(!ismobile){
	    		/** ONLY EXECUTE THESE CODES IF MOBILE DETECTION IS FALSE **/
	    	
	    	/* REQUIRED: Datatable PDF/Excel output componant */
	    	document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/ZeroClipboard.min.js"><\/script>');
	    	document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/TableTools.min.js"><\/script>');
	    	document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/select2.min.js"><\/script>');
	    	document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/jquery.excanvas.min.js"><\/script>');
	    	document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/jquery.placeholder.min.js"><\/script>');

	    }else{
	    	//ONLY EXECUTE THESE CODES IF MOBILE DETECTION IS TRUE 
	    	document.write('<script src="http://localhost/my/quicksstore.com/theme/QuicksStore/js/include/responsive-tables.min.js"><\/script>');
	    }
	</script>
	

<?php 
		//REQUIRED: iButton
		echo $this->Html->script('include/jquery.ibutton.min');
		// REQUIRED: Justgage animated charts 
		echo $this->Html->script('include/raphael.2.1.0.min');
		echo $this->Html->script('include/developer_/justgage');

		//REQUIRED: Morris Charts
		echo $this->Html->script('include/morris.min');
		echo $this->Html->script('include/morris-chart-settings');

		//REQUIRED: Animated pie chart
		echo $this->Html->script('include/jquery.easy-pie-chart.min');

		//REQUIRED: Functional Widgets
		echo $this->Html->script('include/jarvis.widget.min');
		echo $this->Html->script('include/mobiledevices.min');

		//REQUIRED: Full Calendar 
		echo $this->Html->script('include/jquery.fullcalendar.min');

		// REQUIRED: Flot Chart Engine 
		echo $this->Html->script('include/jquery.flot.cust.min');
		echo $this->Html->script('include/jquery.flot.resize.min');
	    echo $this->Html->script('include/jquery.flot.tooltip.min');		
	    echo $this->Html->script('include/jquery.flot.orderBar.min');	
	    echo $this->Html->script('include/jquery.flot.fillbetween.min');
	    echo $this->Html->script('include/jquery.flot.pie.min'); 
		    //REQUIRED: Sparkline Charts -->
	    echo $this->Html->script('include/jquery.sparkline.min');

		//REQUIRED: Infinite Sliding Menu (used with inbox page) -->
		echo $this->Html->script('include/jquery.inbox.slashc.sliding-menu');

		//REQUIRED: Form validation plugin -->
	    echo $this->Html->script('include/jquery.validate.min');
	    
	    //REQUIRED: Progress bar animation -->
	    echo $this->Html->script('include/bootstrap-progressbar.min');
	    
	    //REQUIRED: wysihtml5 editor -->
	    echo $this->Html->script('include/wysihtml5-0.3.0.min');
	    echo $this->Html->script('include/bootstrap-wysihtml5.min');

		//REQUIRED: Masked Input -->
	    echo $this->Html->script('include/jquery.maskedinput.min');
	    
	    //REQUIRED: Bootstrap Date Picker -->
	    echo $this->Html->script('include/bootstrap-datepicker.min');

	    //REQUIRED: Bootstrap Wizard -->
	    echo $this->Html->script('include/bootstrap.wizard.min');
	    
		//REQUIRED: Bootstrap Color Picker -->
	    echo $this->Html->script('include/bootstrap-colorpicker.min');
	    
	// REQUIRED: Bootstrap Time Picker -->
	    echo $this->Html->script('include/bootstrap-timepicker.min');
	    
	    //REQUIRED: Bootstrap Prompt -->
	    echo $this->Html->script('include/bootbox.min');
	    
	    //REQUIRED: Bootstrap engine -->
	    echo $this->Html->script('include/bootstrap.min');
	    
	   // DO NOT REMOVE: Theme Config file -->
	    echo $this->Html->script('config');

		echo $this->fetch('script');

?>
<!-- d3 library placed at the bottom for better performance -->
    <!-- DISABLED  <script src="js/include/d3.v3.min.js"></script> -->
    <!-- DISABLED  <script src="js/include/adv_charts/d3-chart-1.js"></script> -->
    <!-- DISABLED  <script src="js/include/adv_charts/d3-chart-2.js"></script> -->

    <!-- Google Geo Chart -->
    <!-- DISABLED <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script> -->
    <!-- DISABLED <script type='text/javascript' src='https://www.google.com/jsapi'></script>-->
    <!-- DISABLED <script src="js/include/adv_charts/geochart.js"></script> -->

	<?php //echo '<pre>'.$this->element('sql_dump').'</pre>'; ?>
	<?php
		//echo $this->Html->script('libs/jquery');
		//echo $this->Html->script('libs/modernizr.min');
		//echo $this->Html->script('libs/bootstrap.min');
		echo $this->fetch('script');
 	?>
</body>
</html>
