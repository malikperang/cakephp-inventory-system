  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  	<div class="navbar-header">
  		<?php if(!empty($sysetting)):?>
  			<?php echo $this->Html->link(__($sysetting['SystemSetting']['name']),array('controller'=>'users','action'=>'login'),array('class'=>'navbar-brand'));?>
  		<?php else:?>
  			<?php echo $this->Html->link(__('Small Inventory Management System'),array('controller'=>'users','action'=>'login'),array('class'=>'navbar-brand'));?>
  		<?php endif;?>
  	</div>
  </nav>