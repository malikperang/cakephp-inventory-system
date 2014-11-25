<div class="companies index">
	<h2><?php echo __('Companies'); ?></h2>
	<table class="table table-hover table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('system_setting_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companies as $company): ?>
	<tr>
		<td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['system_setting_id']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['created']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['modified']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
<div class="btn-group">			<?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $company['Company']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $company['Company']['id']), array('class'=>'btn btn-danger','escape'=>false), __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
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
