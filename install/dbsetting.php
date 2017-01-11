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
		$('#submit').submit(function() {
			event.preventDefault();
			var values = $(this).serialize();
			$.ajax({
				  type: "POST",
				  url: "install.php",
				  data: values,
				}).success(function( msg ) {
					//alert(msg);
					var msg = $.parseJSON(msg);
					
				   if(msg['message'] == 'success'){
						window.location= "addadmin.php";
				   }else{
				   	$("#msg").toggle('slow');
				   	$('.msg').append(msg['message']);
				   	 console.log(msg['message']);
				   }
				});
		});
	});
	</script>
</head>
<body>
<div class="container">
<div class="well well-lg mywell">
<div class="alert alert-warning fade in" id="msg" style="display:none">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Error!</strong> <p class="msg"></p>
</div>
<legend><h1>Installation: Database Setting</h1></legend>

<form role="form" action="install.php" id="submit" name="dbform">
  <div class="form-group">
    <label for="host">Database Host</label>
    <input class="form-control" id="testing" placeholder="localhost" name="dbhost" required>
  </div>
   <div class="form-group">
    <label for="dbName">Database Name</label>
    <input class="form-control" id="testing" placeholder="inventorysystem" name="dbname" required>
  </div>
   <div class="form-group">
    <label for="dbUsername">Database Username</label>
    <input class="form-control" id="testing" placeholder="root" name="dbusername" required>
  </div>
   <div class="form-group">
    <label for="dbPassword">Database Password</label>
    <input type="password" class="form-control" id="testing" name="dbpass" required>
  </div>
  <div class="form-group">
    <label for="tablePrefix">Table Prefix</label>
    <input class="form-control" id="testing" placeholder="in_" name="dbprefix">
  </div>
  <input type="hidden" name="dbset">
  <button type="submit" class="btn btn-default">Submit</button>
</form>
	</div>
	</div>
</body>
</html>