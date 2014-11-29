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
					console.log(msg);
				   var msg = $.parseJSON(msg);
				   if(msg['message'] == 'success'){
						window.location= "finish.php";
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
<h1> Installation</h1>
<div class="alert alert-warning fade in" id="msg" style="display:none">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Error!</strong> <p class="msg"></p>
</div>
<legend>Add Second User</legend>
<p>Second user is usual user/staff.Staff has a limited access at some level of this system.</p>
<form role="form" action="install.php" id="submit">
  <div class="form-group">
    <label for="exampleInputEmail1">Group</label>
    <input class="form-control" placeholder="administrator" name="group" readonly="true" value"staff">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input class="form-control" placeholder="you@yourhost.com" name="email" type="email">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input class="form-control" placeholder="root" name="fname">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <input type="hidden" name="adduser">
  <button type="submit" class="btn btn-default">Submit</button>
</form>
	</div>
	</div>
</body>
</html>