<div class="row">
	<div class="col-lg-12">
	<h1 class="page-header">Item #<?php echo h($item['Item']['id']); ?></h1>
	<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-striped table-bordered" cellspacing="0">
			<tbody>
				<tr><td>Name</td><td></td></tr>
				<tr><td>sds<td></tr>
			</tbody>
		</table>
	</div>
	</div>
	</div>
</div>


<div class="items view">
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			
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
		<dt></dt>
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
</div>
