<div class="unitMeasurements form">
<?php echo $this->Form->create('UnitMeasurement',array(
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
		<legend><?php echo __('Edit Unit Measurement'); ?></legend>
	<?php
		echo $this->Form->input('id',array(''));
		echo $this->Form->input('company_id',array(''));
		echo $this->Form->input('name',array(''));
		echo $this->Form->input('key',array(''));
	?>
	</fieldset>
<?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UnitMeasurement.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UnitMeasurement.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Unit Measurements'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
