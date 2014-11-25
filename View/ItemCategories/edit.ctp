<div class="itemCategories form">
<?php echo $this->Form->create('ItemCategory',array(
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
		<legend><?php echo __('Edit Item Category'); ?></legend>
	<?php
		echo $this->Form->input('id',array(''));
		echo $this->Form->input('company_id',array(''));
		echo $this->Form->input('name',array(''));
		echo $this->Form->input('parent_id',array(''));
		echo $this->Form->input('lft',array(''));
		echo $this->Form->input('rght',array(''));
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ItemCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ItemCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Item Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Item Categories'), array('controller' => 'item_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Item Category'), array('controller' => 'item_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
