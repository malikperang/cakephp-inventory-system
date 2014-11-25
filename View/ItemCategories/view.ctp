<div class="itemCategories view">
<h2><?php echo __('Item Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['company_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Item Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($itemCategory['ParentItemCategory']['name'], array('controller' => 'item_categories', 'action' => 'view', $itemCategory['ParentItemCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($itemCategory['ItemCategory']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item Category'), array('action' => 'edit', $itemCategory['ItemCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item Category'), array('action' => 'delete', $itemCategory['ItemCategory']['id']), null, __('Are you sure you want to delete # %s?', $itemCategory['ItemCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Item Categories'), array('controller' => 'item_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Item Category'), array('controller' => 'item_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Item Categories'); ?></h3>
	<?php if (!empty($itemCategory['ChildItemCategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($itemCategory['ChildItemCategory'] as $childItemCategory): ?>
		<tr>
			<td><?php echo $childItemCategory['id']; ?></td>
			<td><?php echo $childItemCategory['company_id']; ?></td>
			<td><?php echo $childItemCategory['name']; ?></td>
			<td><?php echo $childItemCategory['parent_id']; ?></td>
			<td><?php echo $childItemCategory['lft']; ?></td>
			<td><?php echo $childItemCategory['rght']; ?></td>
			<td><?php echo $childItemCategory['created']; ?></td>
			<td><?php echo $childItemCategory['modified']; ?></td>
			<td><?php echo $childItemCategory['created_by']; ?></td>
			<td><?php echo $childItemCategory['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'item_categories', 'action' => 'view', $childItemCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'item_categories', 'action' => 'edit', $childItemCategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'item_categories', 'action' => 'delete', $childItemCategory['id']), null, __('Are you sure you want to delete # %s?', $childItemCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Item Category'), array('controller' => 'item_categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($itemCategory['Item'])): ?>
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
	<?php foreach ($itemCategory['Item'] as $item): ?>
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
