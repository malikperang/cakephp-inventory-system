<div class="itemCategories index">
	<h2><?php echo __('Item Categories'); ?></h2>
	<table class="table table-hover table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($itemCategories as $itemCategory): ?>
	<tr>
		<td><?php echo h($itemCategory['ItemCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['company_id']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemCategory['ParentItemCategory']['name'], array('controller' => 'item_categories', 'action' => 'view', $itemCategory['ParentItemCategory']['id'])); ?>
		</td>
		<td><?php echo h($itemCategory['ItemCategory']['lft']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['rght']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['modified']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($itemCategory['ItemCategory']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
<div class="btn-group">			<?php echo $this->Html->link(__('View'), array('action' => 'view', $itemCategory['ItemCategory']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $itemCategory['ItemCategory']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $itemCategory['ItemCategory']['id']), array('class'=>'btn btn-danger','escape'=>false), __('Are you sure you want to delete # %s?', $itemCategory['ItemCategory']['id'])); ?>
</div>		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination pagination pagination-right">
	<li><?php
		echo $this->Paginator->prev('<<',array(), null, array('class' => 'prev disabled'));
	?>
</li><li><?php
		echo $this->Paginator->numbers(array('separator' => ''));
	?>
</li><li><?php
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</li>	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Item Categories'), array('controller' => 'item_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Item Category'), array('controller' => 'item_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
