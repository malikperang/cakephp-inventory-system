<h1 class="page-header">Items List
	<button class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#itemModal" data-toggle='tooltip' data-original-title='Alternatively, you can press "shift" + "n" key' id='have-tooltip'>+ Items</button>
 </h1>
 
<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-body">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="items-table">
		<thead>
			<tr>
					<th><?php echo __('#'); ?></th>
					<th><?php echo __('Num');?></th>
					<th><?php echo __('Item Name'); ?></th>
					<th><?php echo __('Minimum Quantity'); ?></th>
					<th><?php echo __('Maximum Quantity'); ?></th>
					<th><?php echo __('Unit Measurement'); ?></th>
					
					<th><?php echo __('Created By'); ?></th>
					<th><?php echo __('Last Update'); ?></th>
			</tr>
		</thead>
		  
		<tbody>
			<?php $rowNum = 1;?>
			<?php echo $this->Form->create('Item',array('action'=>'deleteSelected'));?>
			<?php foreach ($items as $item): ?>
				<?php //debug($item);?>
			<tr id="selected" href="stocks/view/<?php echo $item['Item']['id']?>">		
				<td><?php echo $this->Form->checkbox('Item.' . $item['Item']['id'],array('value'=>$item['Item']['id'],'name'=>'data[Item][id][]','hiddenField' => false));?></td>
				<td><?php echo $rowNum++; ?>&nbsp;</td>
				<td><?php echo $this->Html->link($item['Item']['name'], array('controller' => 'items', 'action' => 'view', $item['Item']['id'])); ?></td>
				<td><?php echo h($item['Item']['minimum_qty']); ?>&nbsp;</td>
				<td><?php echo h($item['Item']['maximum_qty']); ?>&nbsp;</td>
				<td ><?php echo h($item['UnitMeasurement']['name']); ?>&nbsp;</td>
				<td><?php echo h($item['User']['name']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($item['Item']['created']))); ?>&nbsp;</td>

			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php echo $this->Form->end();?>

<!-- Items Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">+/- Items</h4>
      </div>
      <div class="modal-body">
     <?php echo $this->Form->create('Item',array('controller'=>'items','action'=>'add','class' => 'form-horizontal','role' => 'form'));?>
	<fieldset>
			 <!-- <div class="form-group">
	          <label class="col-sm-2 control-label">Unique ID</label>
	          <div class="col-sm-7">
					   	<?php //echo $this->Form->input('uniqueID',array('label'=>false,'div'=>false,'type'=>'text','class'=>'form-control')); ?>
					   </div>
					</div>-->
			  <div class="form-group">
	          <label class="col-sm-2 control-label">Name</label>
	          <div class="col-sm-7">
					   	<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
					   </div>
					</div>
				
						<?php //disable for next release echo $this->Form->input('category_id'); ?>
				  <div class="form-group">
	          <label class="col-sm-2 control-label">Minimum Quantity</label>
	          <div class="col-sm-7">
						<?php echo $this->Form->input('minimum_qty',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
					</div>
				</div>
				  <div class="form-group">
	          <label class="col-sm-2 control-label">Maximum Quantity</label>
	          <div class="col-sm-7">
						<?php echo $this->Form->input('maximum_qty',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
						</div>
				</div>
				 <div class="form-group">
	          <label class="col-sm-2 control-label">Unit of Measure</label>
	          <div class="col-sm-7">
	     			<?php echo $this->Form->input('unit_measurement_id',array('div'=>false,'class'=>'form-control select_box','label'=>false,'empty'=>'--Choose Unit--')); ?>
	          </div>
	          </div>
	           <?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id'])); ?>

			  </div>
	     </fieldset>
			
 
      <div class="modal-footer">
      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default')); ?>
					<?php echo $this->Form->end(); ?>
       <button class="btn btn-default" data-dismiss="modal">Close</button>
      	
      </div>
    </div>
  </div>
</div>

<?php
	echo $this->Html->css('vendor/chosen');
 	echo $this->Html->script('vendor/chosen/chosen.jquery');
 	echo $this->Html->script('dt-config');

?>



