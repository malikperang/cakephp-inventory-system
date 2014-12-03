<?php echo $this->Html->addCrumb('Items List', '/items/index');?>
<div class="row">
	<div class="col-lg-12">
	<h1 class="page-header">Item id - <?php echo h($item['Item']['id']); ?></h1>
	<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-striped table-bordered" cellspacing="0">
			<tbody>
				<tr><th>Item Code</th><td><?php echo h($item['Item']['itemCode']); ?>&nbsp;</td></tr>
				<tr><th>Name</th><td><?php echo h($item['Item']['name']); ?>&nbsp;</td></tr>
				<tr><th>Minimum Quantity</th><td><?php echo h($item['Item']['minimum_qty']); ?>&nbsp;</td></tr>
				<tr><th>Maximum Quantity</th><td><?php echo h($item['Item']['maximum_qty']); ?>&nbsp;</td></tr>
				<tr><th>Unit Measurement</th><td><?php echo $this->Html->link($item['UnitMeasurement']['name'], array('controller' => 'unit_measurements', 'action' => 'view', $item['UnitMeasurement']['id'])); ?>&nbsp;</td></tr>
				<tr><th>Created</th><td><?php echo date('d/m/Y H:i:s',strtotime(h($item['Item']['created']))); ?>&nbsp;</td></tr>
				<tr><th>Created by</th><td><?php echo h($item['User']['name']); ?>&nbsp;</td></tr>
				<tr><th>Last updated</th><td><?php echo date('d/m/Y H:i:s',strtotime(h($item['Item']['modified']))); ?>&nbsp;</td></tr>		
				<tr><th>Modified by</th><td><?php echo h($item['User']['name']); ?>&nbsp;</td></tr>
			</tbody>
		</table>
		<?php echo $this->Form->create('Item');?>
		<?php echo $this->Form->input('id',array('type'=>'hidden','value'=>$item['Item']['id']));?>
		<?php echo $this->Form->input('itemCode',array('type'=>'hidden','value'=>$item['Item']['itemCode']));?>
		<?php echo $this->Form->input('name',array('type'=>'hidden','value'=>$item['Item']['name']));?>
		<?php echo $this->Form->input('minimum_qty',array('type'=>'hidden','value'=>$item['Item']['minimum_qty']));?>
		<?php echo $this->Form->input('maximum_qty',array('type'=>'hidden','value'=>$item['Item']['maximum_qty']));?>
		<?php echo $this->Form->input('unitMeasurement',array('type'=>'hidden','value'=>$item['UnitMeasurement']['name']));?>
		<?php echo $this->Form->input('created',array('type'=>'hidden','value'=>date('d/m/Y H:i:s',strtotime(h($item['Item']['created']))))); ?>
		<?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$item['User']['name']));?>
		<?php echo $this->Form->input('modified',array('type'=>'hidden','value'=>date('d/m/Y H:i:s',strtotime($item['Item']['modified']))));?>
   		<?php echo $this->Form->input('modified_by',array('type'=>'hidden','value'=>$item['User']['name']));?>

   		<div class="btn-group">
   		<?php echo $this->Form->button('<i class="fa fa-envelope"></i>',array('class'=>'btn btn-default','escpae'=>false));?>
   		<?php echo $this->Html->link(__('<i class="fa fa-pencil-square-o"></i>'), array('action' => 'edit', $item['Item']['id']),array('class'=>'btn btn-default','escape'=>false)); ?>
  	  	<?php echo $this->Form->end();?>
		<?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i>'),array('action' => 'delete', $item['Item']['id']), array('class'=>'btn btn-default','escape'=>false), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
	</div>
	</div>
	</div>
</div>