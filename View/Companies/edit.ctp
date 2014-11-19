<div class="companies form">
<?php echo $this->Form->create('Company',array(
	'class' => 'form-horizontal', 
	'role' => 'form',
	'inputDefaults' => array(
    'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
    'div' => array('class' => 'form-group'),
    'class' => array('form-control'),
    'label' => array('class' => 'col-lg-2 control-label'),
    'between' => '<div class="col-lg-3">',
    'after' => '</div>',
    'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
	))); ?>
	<fieldset>
		<legend><?php echo __('Edit Company'); ?></legend>
	<?php
		echo $this->Form->input('id',array(''));
		echo $this->Form->input('system_setting_id',array(''));
		echo $this->Form->input('created_by',array(''));
		echo $this->Form->input('modified_by',array(''));
	?>
	</fieldset>
<?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Company.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Company.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Item Images'), array('controller' => 'item_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Image'), array('controller' => 'item_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subscriptions'), array('controller' => 'subscriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscription'), array('controller' => 'subscriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List System Settings'), array('controller' => 'system_settings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System Setting'), array('controller' => 'system_settings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Measurements'), array('controller' => 'unit_measurements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Measurement'), array('controller' => 'unit_measurements', 'action' => 'add')); ?> </li>
	</ul>
</div>
