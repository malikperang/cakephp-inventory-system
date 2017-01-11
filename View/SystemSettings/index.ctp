<div class="systemSettings index">
	<h2><?php echo __('System Settings'); ?></h2>
	<table class="table table-hover table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('company_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('company_logo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($systemSettings as $systemSetting): ?>
	<tr>
		<td><?php echo h($systemSetting['SystemSetting']['id']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['company_name']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['company_banner']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['company_logo']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['created']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['modified']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($systemSetting['SystemSetting']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
<div class="btn-group">			<?php echo $this->Html->link(__('View'), array('action' => 'view', $systemSetting['SystemSetting']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $systemSetting['SystemSetting']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $systemSetting['SystemSetting']['id']), array('class'=>'btn btn-danger','escape'=>false), __('Are you sure you want to delete # %s?', $systemSetting['SystemSetting']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New System Setting'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
