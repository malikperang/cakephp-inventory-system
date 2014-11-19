<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('Item',array('action'=>'deleteSelected'));?>
<h1 id="page-header">Items List</h1>		
<div class="fluid-container">
<section id="widget-grid" >
<div class="row-fluid">
<article class="span12">
<div class="jarviswidget" id="widget-id-0" data-widget-deletebutton="false" data-widget-editbutton="false">
    <header>
        <h2>Item </h2>                           
    </header>
         <div class="inner-spacer"> 
		
	<table class="table table-striped table-bordered responsive" id="dtable">

			<thead>
			<tr>	
					<th></th>
					<th><?php echo __('Num'); ?></th>
					<th><?php echo __('ID'); ?></th>
					<th><?php echo __('Added By'); ?></th>
					<th><?php echo __('Item Name'); ?></th>
					<th><?php echo __('Minimum Quantity'); ?></th>
					<th><?php echo __('Maximum Quantity'); ?></th>
					<th><?php echo __('Unit Measurement'); ?></th>
					<th><?php echo __('Last Update'); ?></th>
					
			</tr>
		</thead>
<tbody>
	<?php $rowNum = 1;?>
	<?php foreach ($items as $item): ?>
		
	<tr>
		<td class="form-group">
			<?php echo $this->Form->checkbox('Item.' . $item['Item']['id'],array('value'=>$item['Item']['id'],'name'=>'data[Item][id][]','hiddenField' => false));?>
			
		</td>
		<td><?php echo $rowNum++; ?>&nbsp;</td>
		<td><?php echo h($item['Item']['uniqueID']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($item['User']['name'], array('plugin'=>'acl_management','controller' => 'users', 'action' => 'member_view', $item['Item']['created_by'])); ?>
		</td>
		<td><?php echo h($item['Item']['name']); ?>&nbsp;</td>
		
		<td><?php echo h($item['Item']['minimum_qty']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['maximum_qty']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($item['UnitMeasurement']['name'], array('controller' => 'unit_measurements', 'action' => 'view', $item['UnitMeasurement']['id'])); ?>
		</td>
		<?php $date = $item['Item']['modified'];?>
		<td><?php echo date("d M Y  H:i:s",strtotime($item['Item']['modified'])); ?>&nbsp;</td>
		<!--<td>
			<div class="btn-group">
				<?php echo $this->Html->link(__('<i class="icon-eye-open"></i> '), array('action' => 'view', $item['Item']['id']),array('escape'=>false,'type'=>false,'class'=>'btn')); ?>
				<?php echo $this->Html->link(__('<i class="icon-edit"></i>'), array('action' => 'edit', $item['Item']['id']),array('escape'=>false,'class'=>'btn')); ?>
				<?php echo $this->Form->postLink(__('<i class="icon-trash"></i>'), array('action' => 'delete', $item['Item']['id']), array('escape'=>false,'class'=>'btn'),null, __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
				</div>
		</td>-->
	</tr>
	
<?php endforeach; ?>
</tbody>
<tfoot>
</tfoot>
	</table>
	</div>
	</div>
	</div>
	<aside class="right">
				<?php echo $this->element('menu/quick_action');?>
					
		          
				</aside>
	</article>
	</section>
	

