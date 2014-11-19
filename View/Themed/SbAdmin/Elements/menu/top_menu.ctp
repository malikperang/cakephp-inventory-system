<?php

	//$current_page = $this->params['action'];

?>
 <header id="header">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="dashboard.html"><h1>DR. MAK RONY</h1></a>
            <button type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#navbar-to-collapse">
                <span class="sr-only">Toggle right menu</span>
                <i class="icon16 i-arrow-8"></i>
            </button>          
            <div class="collapse navbar-collapse" id="navbar-to-collapse">  
                <form id="top-search" class="navbar-form navbar-left" role="search">
                    <div class="input-group">
                        <input type="text" name="tsearch" id="tsearch" placeholder="Search here ..." class="search-query form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn"><i class="icon16 i-search-2 gap-right0"></i></button>
                        </span>
                    </div>
                </form>  
                <ul class="nav navbar-nav pull-right">
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon24 i-bell-2"></i>
                            <span class="notification red">6</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-calendar-2"></i> Admin Jenny add event</a></li>
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-file-zip"></i> User Dexter attach file</a></li>
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-stack-picture"></i> User Dexter attach 3 pictures</a></li>
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-cart-add"></i> New orders <span class="notification green">2</span></a></li>
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-bubbles-2"></i> New comments <span class="notification red">5</span></a></li>
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-pie-5"></i> Daily stats is generated</a></li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon24 i-envelop-2"></i>
                            <span class="notification red">3</span>
                        </a>
                        <ul class="dropdown-menu messages" role="menu">
                            <li class="head" role="presentation">
                                <h4>Inbox</h4>
                                <span class="count">3 messages</span>
                                <span class="new-msg"><a href="#" class="tipB" title="Write message"><i class="icon16 i-pencil-5"></i></a></span>
                            </li>
                            <li role="presentation">
                                <a href="#" class="clearfix">
                                    <span class="avatar"><img src="images/avatars/peter.jpg" alt="avatar"></span>
                                    <span class="msg">Call me i need to talk with you</span>
                                    <button class="btn close"><i class="icon12 i-close-2"></i></button>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="clearfix">
                                    <span class="avatar"><img src="images/avatars/milen.jpg" alt="avatar"></span>
                                    <span class="msg">Problem with registration</span>
                                    <button class="btn close"><i class="icon12 i-close-2"></i></button>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="clearfix">
                                    <span class="avatar"><img src="images/avatars/anonime.jpg" alt="avatar"></span>
                                    <span class="msg">I have question about ...</span>
                                    <button class="btn close"><i class="icon12 i-close-2"></i></button>
                                </a>
                            </li>
                            <li class="foot" role="presentation"><a href="email.html">View all messages</a></li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown user">
                         <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <img src="images/avatars/sugge.jpg" alt="sugge">
                            <span class="more"><i class="icon16 i-arrow-down-2"></i></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#" class=""><i class="icon16 i-cogs"></i> Settings</a></li>
                            <li role="presentation"><a href="profile.html" class=""><i class="icon16 i-user"></i> Profile</a></li>
                            <li role="presentation">
                                <?php echo $this->Html->link(__('<i class="icon16 i-exit"></i> Logout'), array('plugin' => 'acl_management','controller'=>'users','action' => 'logout'), array('escape' => false)); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>
            </div><!--/.nav-collapse -->
        </nav>
    </header> <!-- End #header  -->
<!--<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" target="_blank" href="http://twitter.github.com/bootstrap/">Bootstrap</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li <?php if($current_page=="index"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Scaffolding', array('controller' => 'app', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="base_css"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Base CSS', array('controller' => 'app', 'action' => 'base_css')); ?>
					</li>
					<li <?php if($current_page=="components"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Components', array('controller' => 'app', 'action' => 'components')); ?>
					</li>
					<li <?php if($current_page=="javascript"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Javascript plugins', array('controller' => 'app', 'action' => 'javascript')); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>-->