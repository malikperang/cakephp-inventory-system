<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <?php echo $this->Html->link(__('<i class="fa fa-fw fa-desktop"></i> Dashboard'),array('controller'=>'users','action'=>'dashboard'),array('escape'=>false));?>
                        
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#stock"><i class="fa fa-truck"></i> Stock Management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse" id="stock">
                        <li>
                        <?php echo $this->Html->link(__('Stock Transaction'),array('plugin'=>false,'controller'=>'stocks','action'=>'index'),array());?>
                        </li>
                         <li>
                        <?php echo $this->Html->link(__('Stock Alert'),array('plugin'=>false,'controller'=>'stocks','action'=>'report'),array());?>
                        </li>
                         <li>
                        <?php echo $this->Html->link(__('Stock by Date'),array('plugin'=>false,'controller'=>'stocks','action'=>'select_by_date'),array());?>
                        </li>
                         <li>
                        <?php echo $this->Html->link(__('New Stock Transaction'),array('plugin'=>false,'controller'=>'stocks','action'=>'add'),array());?>
                        </li>
                        </ul>
                    </li>
                    <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#item"><i class="fa fa-shopping-cart"></i> Item Management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse" id="item">
                        <li>
                        <?php echo $this->Html->link(__('Item List'),array('plugin'=>false,'controller'=>'items','action'=>'index'),array());?>
                        </li>
                        <li>
                        <?php echo $this->Html->link(__('Add New Item'),array('plugin'=>false,'controller'=>'items','action'=>'add'),array());?>
                        </li>
                           <li><?php echo $this->Html->link(__('Unit Measurement'),array('plugin'=>false,'controller'=>'unit_measurements','action'=>'add'));?></li>
                         </li>
                        </ul>
                    </li>
                    <?php if($userDetails['group_id'] == 1):?>
                        <li>
                         <a href="javascript:;" data-toggle="collapse" data-target="#admin"><i class="fa fa-cogs"></i> Admin Setting<i class="fa fa-fw fa-caret-down"></i></a>
                          <ul class="collapse" id="admin">
                          <li><?php echo $this->Html->link(__('User'),array('controller'=>'users','action'=>'index'));?></li>
                           <li><?php echo $this->Html->link(__('Add New User'),array('controller'=>'users','action'=>'add'));?></li>
                          <li><?php echo $this->Html->link(__('Add New Group'),array('controller'=>'groups','action'=>'add'));?></li>
                           <li><?php echo $this->Html->link(__('User Permissions'),array('controller'=>'user_permissions','action'=>'index'));?></li>
                          <?php if(!empty($sysetting)):?>
                          <li><?php echo $this->Html->link(__('System'),array('plugin'=>false,'controller'=>'system_settings','action'=>'edit',$sysetting['SystemSetting']['id']));?></li>
                          <?php else:?>  
                           <li><?php echo $this->Html->link(__('System'),array('plugin'=>false,'controller'=>'system_settings','action'=>'add'));?></li>
                           <?php endif;?>      
                          </ul>
                         </li>
                    <?php endif; ?>
                </ul>
            </div>