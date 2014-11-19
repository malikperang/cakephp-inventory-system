<div class="items view">
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['Company']['id'], array('controller' => 'companies', 'action' => 'view', $item['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('UniqueID'); ?></dt>
		<dd>
			<?php echo h($item['Item']['uniqueID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['ItemCategory']['name'], array('controller' => 'item_categories', 'action' => 'view', $item['ItemCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minimum Qty'); ?></dt>
		<dd>
			<?php echo h($item['Item']['minimum_qty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximum Qty'); ?></dt>
		<dd>
			<?php echo h($item['Item']['maximum_qty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit Measurement'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['UnitMeasurement']['name'], array('controller' => 'unit_measurements', 'action' => 'view', $item['UnitMeasurement']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($item['Item']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($item['Item']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($item['Item']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($item['Item']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Item Images'); ?></h3>
	<?php if (!empty($item['ItemImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Image Path'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['ItemImage'] as $itemImage): ?>
		<tr>
			<td><?php echo $itemImage['id']; ?></td>
			<td><?php echo $itemImage['company_id']; ?></td>
			<td><?php echo $itemImage['item_id']; ?></td>
			<td><?php echo $itemImage['image_path']; ?></td>
			<td><?php echo $itemImage['created']; ?></td>
			<td><?php echo $itemImage['modified']; ?></td>
			<td><?php echo $itemImage['created_by']; ?></td>
			<td><?php echo $itemImage['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'item_images', 'action' => 'view', $itemImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'item_images', 'action' => 'edit', $itemImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'item_images', 'action' => 'delete', $itemImage['id']), null, __('Are you sure you want to delete # %s?', $itemImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item Image'), array('controller' => 'item_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Stocks'); ?></h3>
	<?php if (!empty($item['Stock'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Stock In'); ?></th>
		<th><?php echo __('Stock Out'); ?></th>
		<th><?php echo __('Stock Balance'); ?></th>
		<th><?php echo __('Stock Status Id'); ?></th>
		<th><?php echo __('Alert Color'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Stock'] as $stock): ?>
		<tr>
			<td><?php echo $stock['id']; ?></td>
			<td><?php echo $stock['company_id']; ?></td>
			<td><?php echo $stock['item_id']; ?></td>
			<td><?php echo $stock['stock_in']; ?></td>
			<td><?php echo $stock['stock_out']; ?></td>
			<td><?php echo $stock['stock_balance']; ?></td>
			<td><?php echo $stock['stock_status_id']; ?></td>
			<td><?php echo $stock['alert_color']; ?></td>
			<td><?php echo $stock['created']; ?></td>
			<td><?php echo $stock['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stocks', 'action' => 'view', $stock['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stocks', 'action' => 'edit', $stock['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stocks', 'action' => 'delete', $stock['id']), null, __('Are you sure you want to delete # %s?', $stock['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
