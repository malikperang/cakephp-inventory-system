<?php echo $this->Html->addCrumb('Items List', '/items/index');?>
<h1 class="page-header">Items List
	<button class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#itemModal" data-toggle='tooltip' data-original-title='Alternatively, you can press "shift" + "n" key' id='have-tooltip'>+ Items</button>
 </h1>
 
<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-body">
		<?php echo $this->Form->create('Item',array('action'=>'deleteSelected'));?>
		<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="items-table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo __('Id'); ?></th>
					<th><?php echo __('Code'); ?></th>
					<th><?php echo __('Item Name'); ?></th>
					<th><?php echo __('Minimum Quantity'); ?></th>
					<th><?php echo __('Maximum Quantity'); ?></th>
					<th><?php echo __('Unit Measurement'); ?></th>		
					<th><?php echo __('Created By'); ?></th>
					<th><?php echo __('Last Update'); ?></th>
					<th><?php echo __('Action'); ?></th>
				</tr>
			</thead>
			<tfoot>
		 		<tr>
		 			<td colspan="10"><input type="checkbox" id="selectall"/> 	
		 			<?php echo $this->Form->button('Delete',array('type'=>'submit','class'=>'btn btn-primary'));?></td>
		 		</tr>
       		</tfoot>
			<tbody>
				<?php foreach ($items as $item): ?>
				<tr>		
					<td><?php echo $this->Form->checkbox('Item.' . $item['Item']['id'],array('class'=>'checkbox1','value'=>$item['Item']['id'],'name'=>'data[Item][id][]','hiddenField' => false));?></td>
					<td><?php echo h($item['Item']['id']) ?>&nbsp;</td>
					<td><?php echo h($item['Item']['itemCode']) ?>&nbsp;</td>
					<td><?php echo $this->Html->link($item['Item']['name'], array('controller' => 'items', 'action' => 'view', $item['Item']['id'])); ?></td>
					<td><?php echo h($item['Item']['minimum_qty']); ?>&nbsp;</td>
					<td><?php echo h($item['Item']['maximum_qty']); ?>&nbsp;</td>
					<td ><?php echo h($item['UnitMeasurement']['name']); ?>&nbsp;</td>
					<td><?php echo h($item['User']['name']); ?>&nbsp;</td>
					<td><?php echo date('d/m/Y H:i:s',strtotime(h($item['Item']['modified']))); ?>&nbsp;</td>
					<td class="text-center"><div class="btn-group">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id']),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id']),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		</div>
		</div>
	<?php echo $this->Form->end();?>


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
		 <div class="form-group">
          <label class="col-sm-2 control-label">Item Code #</label>
          <div class="col-sm-7">
				   	<?php echo $this->Form->input('itemCode',array('label'=>false,'div'=>false,'type'=>'text','class'=>'form-control')); ?>
				   	  <p class="help-block">
						<?php echo __('if you didn\'t fill this,the code will be auto generated.');?>		
					  </p>
		  </div>
		  </div>
		  <div class="form-group">
          <label class="col-sm-2 control-label">Name</label>
          <div class="col-sm-7">
				   	<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
				   </div>
				</div>
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


