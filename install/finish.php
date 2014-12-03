<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inventory Installation</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript">
	$(document).ready(function() {
		
	});
	</script>
</head>
<body>
<div class="container">
<div class="well well-lg mywell">
<h1>Installation Success!</h1>	
<p>You can now login using your chosen account</p>
<br />
Just a couple things to be highlighted.<br />
1. Remove install folder<br />
2. Change .htaccess rules by opening the file from the root folder.Change it into this:<br />
RewriteEngine on <br />
RewriteRule ^$ webroot/ [L] <br />
RewriteRule (.*) webroot/$1 [L] <br />
<button class="btn btn-default"><a href="../users/login/">Log In</a></button>
</div>
</div>
</body>
</html>