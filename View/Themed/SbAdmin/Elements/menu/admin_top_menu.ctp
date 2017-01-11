<?php

$current_plugin = $this->params['plugin'];
$current_page = $this->params['action'];

?>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="#">Project name</a>
			<div class="nav-collapse collapse">
				<ul class="nav secondary-nav pull-right">
					<li class="menu"><?php echo $this->Html->link('My Profile', '/users/edit_profile');?></li>
					<li class="menu"><?php echo $this->Html->link('Logout', '/users/logout');?></li>
				</ul>

				<ul class="nav">
					<li><a href="#">Home</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li class="dropdown  <?php if($current_plugin == 'acl_management'){echo 'active';} ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Authenticate <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="nav-header">Manage Users</li>
							<li><a href="<?php echo $this->Html->url('/admin/users');?>">Manage Users</a></li>
							<li><a href="<?php echo $this->Html->url('/admin/users/add');?>">New User</a></li>
							<li class="divider"></li>
							<li class="nav-header">Manage Group</li>
							<li><a href="<?php echo $this->Html->url('/admin/groups');?>">Manage Group</a></li>
							<li><a href="<?php echo $this->Html->url('/admin/groups/add');?>">New Group</a></li>
							<li class="divider"></li>
							<li class="nav-header">ACL Control</li>
							<li><a href="<?php echo $this->Html->url('/admin/user_permissions');?>">Permission</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>