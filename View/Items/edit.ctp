<div class="items form">
<?php echo $this->Form->create('Item',array(
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
		<legend><?php echo __('Edit Item'); ?></legend>
	<?php
		echo $this->Form->input('id',array(''));
		echo $this->Form->input('company_id',array(''));
		echo $this->Form->input('uniqueID',array(''));
		echo $this->Form->input('name',array(''));
		echo $this->Form->input('item_category_id',array(''));
		echo $this->Form->input('minimum_qty',array(''));
		echo $this->Form->input('maximum_qty',array(''));
		echo $this->Form->input('unit_measurement_id',array(''));
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Item.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Item.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Categories'), array('controller' => 'item_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Category'), array('controller' => 'item_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Measurements'), array('controller' => 'unit_measurements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Measurement'), array('controller' => 'unit_measurements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Images'), array('controller' => 'item_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Image'), array('controller' => 'item_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
