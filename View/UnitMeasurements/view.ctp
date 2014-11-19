<div class="unitMeasurements view">
<h2><?php echo __('Unit Measurement'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($unitMeasurement['UnitMeasurement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($unitMeasurement['Company']['id'], array('controller' => 'companies', 'action' => 'view', $unitMeasurement['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($unitMeasurement['UnitMeasurement']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($unitMeasurement['UnitMeasurement']['key']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Unit Measurement'), array('action' => 'edit', $unitMeasurement['UnitMeasurement']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Unit Measurement'), array('action' => 'delete', $unitMeasurement['UnitMeasurement']['id']), null, __('Are you sure you want to delete # %s?', $unitMeasurement['UnitMeasurement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unit Measurements'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit Measurement'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($unitMeasurement['Item'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('UniqueID'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Item Category Id'); ?></th>
		<th><?php echo __('Minimum Qty'); ?></th>
		<th><?php echo __('Maximum Qty'); ?></th>
		<th><?php echo __('Unit Measurement Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unitMeasurement['Item'] as $item): ?>
		<tr>
			<td><?php echo $item['id']; ?></td>
			<td><?php echo $item['company_id']; ?></td>
			<td><?php echo $item['uniqueID']; ?></td>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['item_category_id']; ?></td>
			<td><?php echo $item['minimum_qty']; ?></td>
			<td><?php echo $item['maximum_qty']; ?></td>
			<td><?php echo $item['unit_measurement_id']; ?></td>
			<td><?php echo $item['created']; ?></td>
			<td><?php echo $item['modified']; ?></td>
			<td><?php echo $item['created_by']; ?></td>
			<td><?php echo $item['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'items', 'action' => 'delete', $item['id']), null, __('Are you sure you want to delete # %s?', $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
