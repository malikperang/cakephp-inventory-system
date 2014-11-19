<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <?php echo $this->Html->link(__('<i class="fa fa-fw fa-dashboard"></i> Dashboard'),array(),array('escape'=>false));?>
                        
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Stock Management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse" id="demo">
                        <li>
                        <?php echo $this->Html->link(__('Stock Transaction'),array('plugin'=>false,'controller'=>'stocks','action'=>'index'),array());?>
                        </li>
                         <li>
                        <?php echo $this->Html->link(__('Stock by Date'),array('plugin'=>false,'controller'=>'stocks','action'=>'select_by_date'),array());?>
                        </li>
                         <li>
                        <?php echo $this->Html->link(__('Add / Remove Stock'),array('controller'=>'stocks','action'=>'add'),array());?>
                        </li>
                        </ul>
                    </li>
                    <li>
                      <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Item Management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul class="collapse" id="demo">
                        <li>
                        <?php echo $this->Html->link(__('Stock Management'),array(),array());?>
                        </li>
                        </ul>
                    </li>
                </ul>
            </div>