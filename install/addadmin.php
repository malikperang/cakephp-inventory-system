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
					var msg = $.parseJSON(msg);
				 if(msg['message'] == 'success'){
						window.location= "adduser.php";
				   }else{
				   		$(".alert").alert(msg['message']);
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
<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
<h1>Installation</h1>
<legend>Add First User</legend>
<p>First user is administrator on the system. Administrator have root/full access on the system.Don't worry,you can always change these setting later but not the group name.</p>
<form role="form" action="install.php" id="submit">
  <div class="form-group">
    <label for="group">Group</label>
    <input class="form-control" placeholder="administrator" name="group" readonly="true" value"administrator">
  </div>
   <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" placeholder="you@yourhost.com" name="email" type="email" required>
  </div>
   <div class="form-group">
    <label for="fullname">Full Name</label>
    <input class="form-control" placeholder="John Doe" name="fname" required>
  </div>
   <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" required>
    <p class="help-block">Password must be at least 8 character</p>
  </div>
  <input type="hidden" name="addadmin">
  <button type="submit" class="btn btn-default">Submit</button>
</form>
	</div>
	</div>
</body>
</html>