  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if(!empty($sysetting)):?>
                  <?php echo $this->Html->link(__($sysetting['SystemSetting']['name']),array('controller'=>'users','action'=>'login'),array('class'=>'navbar-brand'));?>
                <?php else:?>
                  <?php echo $this->Html->link(__('CakePHP Inventory Management System'),array('controller'=>'users','action'=>'login'),array('class'=>'navbar-brand'));?>
                <?php endif;?>
            </div>
            
        </nav>