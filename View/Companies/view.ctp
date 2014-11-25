<div class="companies view">
<h2><?php echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System Setting Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['system_setting_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Item Images'); ?></h3>
	<?php if (!empty($company['ItemImage'])): ?>
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
	<?php foreach ($company['ItemImage'] as $itemImage): ?>
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
	<h3><?php echo __('Related Items'); ?></h3>
	<?php if (!empty($company['Item'])): ?>
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
	<?php foreach ($company['Item'] as $item): ?>
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
<div class="related">
	<h3><?php echo __('Related Stocks'); ?></h3>
	<?php if (!empty($company['Stock'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Stock In'); ?></th>
		<th><?php echo __('Stock Out'); ?></th>
		<th><?php echo __('Stock Balance'); ?></th>
				<th><?php echo __('Alert Color'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Stock'] as $stock): ?>
		<tr>
			<td><?php echo $stock['id']; ?></td>
			<td><?php echo $stock['company_id']; ?></td>
			<td><?php echo $stock['item_id']; ?></td>
			<td><?php echo $stock['stock_in']; ?></td>
			<td><?php echo $stock['stock_out']; ?></td>
			<td><?php echo $stock['stock_balance']; ?></td>
			
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
<div class="related">
	<h3><?php echo __('Related Subscriptions'); ?></h3>
	<?php if (!empty($company['Subscription'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Plan'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Date Start'); ?></th>
		<th><?php echo __('Date End'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Subscription'] as $subscription): ?>
		<tr>
			<td><?php echo $subscription['id']; ?></td>
			<td><?php echo $subscription['company_id']; ?></td>
			<td><?php echo $subscription['plan']; ?></td>
			<td><?php echo $subscription['price']; ?></td>
			<td><?php echo $subscription['date_start']; ?></td>
			<td><?php echo $subscription['date_end']; ?></td>
			<td><?php echo $subscription['status']; ?></td>
			<td><?php echo $subscription['created']; ?></td>
			<td><?php echo $subscription['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'subscriptions', 'action' => 'view', $subscription['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'subscriptions', 'action' => 'edit', $subscription['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'subscriptions', 'action' => 'delete', $subscription['id']), null, __('Are you sure you want to delete # %s?', $subscription['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subscription'), array('controller' => 'subscriptions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related System Settings'); ?></h3>
	<?php if (!empty($company['SystemSetting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Name'); ?></th>
		<th><?php echo __('Company Banner'); ?></th>
		<th><?php echo __('Company Logo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['SystemSetting'] as $systemSetting): ?>
		<tr>
			<td><?php echo $systemSetting['id']; ?></td>
			<td><?php echo $systemSetting['company_name']; ?></td>
			<td><?php echo $systemSetting['company_banner']; ?></td>
			<td><?php echo $systemSetting['company_logo']; ?></td>
			<td><?php echo $systemSetting['created']; ?></td>
			<td><?php echo $systemSetting['modified']; ?></td>
			<td><?php echo $systemSetting['created_by']; ?></td>
			<td><?php echo $systemSetting['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'system_settings', 'action' => 'view', $systemSetting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'system_settings', 'action' => 'edit', $systemSetting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'system_settings', 'action' => 'delete', $systemSetting['id']), null, __('Are you sure you want to delete # %s?', $systemSetting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New System Setting'), array('controller' => 'system_settings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Unit Measurements'); ?></h3>
	<?php if (!empty($company['UnitMeasurement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['UnitMeasurement'] as $unitMeasurement): ?>
		<tr>
			<td><?php echo $unitMeasurement['id']; ?></td>
			<td><?php echo $unitMeasurement['company_id']; ?></td>
			<td><?php echo $unitMeasurement['name']; ?></td>
			<td><?php echo $unitMeasurement['key']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'unit_measurements', 'action' => 'view', $unitMeasurement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'unit_measurements', 'action' => 'edit', $unitMeasurement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'unit_measurements', 'action' => 'delete', $unitMeasurement['id']), null, __('Are you sure you want to delete # %s?', $unitMeasurement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Unit Measurement'), array('controller' => 'unit_measurements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
