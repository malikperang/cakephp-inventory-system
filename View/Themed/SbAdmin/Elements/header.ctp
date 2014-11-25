  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link(__('CakePHP Inventory Management System'),array(),array('class'=>'navbar-brand'));?>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userDetails['name'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                        <?php echo $this->Html->link('<i class="fa fa-fw fa-user"></i> Profile',array('plugin'=>'acl_management','controller'=>'users','action'=>'view',$userDetails['id']),array('escape'=>false));?>
                        
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Log Out',array('plugin'=>'acl_management','controller'=>'users','action'=>'logout'),array('escape'=>false));?>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </nav>