<?php 
$conf = '../Config/';
	if (is_writable($conf)) {
	    $config = 'Your <span class="text-success">Config</span> directory is writable <i class="fa fa-check"></i>';
	    $confmsg=true;
	} else {
	    $config = '<span  class="text-danger">Your Config directory is not writable <i class="fa fa-times"></i></span>';
	    $confmsg=false;
	}
$tmp = '../tmp/';
	if (is_writable($tmp)) {
	    $tmp = 'Your <span class="text-success">tmp</span> directory is writable <i class="fa fa-check"></i>';
	    $tmpmsg = true;
	} else {
	    $tmp = '<span class="text-danger">Your tmp directory is not writable <i class="fa fa-times"></i></span>';
	    $tmpmsg = false;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inventory Installation</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/font-awesome-4.2.0/css/font-awesome.min.css">
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
<div class="container">
<div class="well well-lg mywell">
<h1>Installation: Welcome</h1>
<p>Before getting started, we need some information on the database. You will need to know the following items before proceeding.
<br />
<br />
1. Database name<br />
2. Database username <br />
3. Database password <br />
4. Database host <br />
<br />
Table prefix (if you want to run more than one Inventory System in a single database)</p>
<p>Please make sure your directory below is writable</p>
<?php echo $config;?><br />
<?php echo $tmp;?><br />
<br />
<?php if ($confmsg == true && $tmpmsg == true):?>
	<button class="btn btn-default"><a href="dbsetting.php">Next >></a></button>
<?php endif;?>
</div>
</div>
</body>
</html>