<?php echo $this->Html->addCrumb(__('Stock Transaction'), '/stocks');?>
<h1 class="page-header"><?php echo __('Stock Transaction');?>
	<button class="btn btn-success btn-md pull-right" data-toggle="modal" data-target="#stockModal" data-toggle='tooltip' data-original-title='Alternatively you can press "shift" + "N" key' id='have-tooltip'>+/- Stock</button>
 </h1>
	<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-body">
	<?php if($userDetails['group_id'] == 1):?>
	<?php echo $this->Form->create('Stock',array('action'=>'deleteSelected'));?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="stock-admin-table">
		<thead>
			<tr>
				<th>#</th>
				<th><?php echo __('Transaction ID')?></th>			
				<th><?php echo __('Item');?></th>
				<th><?php echo __('In');?></th>
				<th><?php echo __('Out');?></th>
				<th><?php echo __('Balance');?></th>
				<th><?php echo __('Status');?></th>
				<th><?php echo __('Created at');?></th>
				<th><?php echo __('Action');?></th>
		</thead>
		<tfoot>
		 	<tr>
		 		<td colspan="9"><input type="checkbox" id="selectall"/> 	<?php echo $this->Form->button(__('Delete'),array('type'=>'submit','class'=>'btn btn-primary'));?></td>
		 	</tr>
        </tfoot>
		<tbody>
			<?php foreach ($stocks as $stock): ?>
			<?php $class = '';
				  if($stock['Stock']['stock_status_id'] == 4):$class = 'danger';endif;
				  if($stock['Stock']['stock_status_id'] == 3):$class = 'success';endif;?>
			<tr class="<?php echo $class;?>">
				<td><?php echo $this->Form->checkbox('Stock.' . $stock['Stock']['id'],array('class'=>'checkbox1','value'=>$stock['Stock']['id'],'name'=>'data[Stock][id][]','hiddenField' => false));?></td>
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td><?php echo h($stock['StockStatus']['name']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Stock']['transID']),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php echo $this->Form->end();?>

	<?php else:?>

	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="stock-staff-table">
		<thead>
			<tr>
				<th><?php echo __('Transaction ID')?></th>			
				<th><?php echo __('Item');?></th>
				<th><?php echo __('In');?></th>
				<th><?php echo __('Out');?></th>
				<th><?php echo __('Balance');?></th>
				<th><?php echo __('Status');?></th>
				<th><?php echo __('Created at');?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($stocks as $stock): ?>
			<?php $class = '';
			  if($stock['Stock']['stock_status_id'] == 3):$class = 'danger';endif;
			  if($stock['Stock']['stock_status_id'] == 4):$class = 'success';endif;?>
			<tr class="<?php echo $class;?>">
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['StockStatus']['name']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Stock']['transID']),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
<?php endif;?>


<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo __('+/- Stock');?></h4>
      </div>
      <div class="modal-body">
     <?php echo $this->Form->create('Stock',array('class' => 'form-horizontal','role' => 'form','controller'=>'stocks','action'=>'add'));?>
	<fieldset>
		<?php echo $this->Form->input('transID',array('type'=>'hidden','value'=>false));?>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Choose an Item</label>
	          <div class="col-sm-7">
	     			<?php echo $this->Form->input('item_id',array('id'=>'','div'=>false,'class'=>'form-control select_box','label'=>false,'data-placeholder'=>"Select Your Options")); ?>
	          </div>
	          </div>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Transaction</label>
			   <div class="col-sm-7">     
			     	<?php echo $this->Form->input('stock_transaction',array('div'=>false,'label'=>false,'class'=>'form-control cus-input','type'=>'number'));?>
			     	<p class="help-block">
						<?php echo __('To remove stock, add \'-\'. E.g: -200.');?>		
					 </p>
	          </div>
	          </div>

	          <div class="form-group">
	          <label class="col-sm-2 control-label">Transaction Remarks</label>
			   <div class="col-sm-7">     
			     	<?php echo $this->Form->input('transaction_remarks',array('div'=>false,'label'=>false,'class'=>'form-control cus-input','type'=>'textarea'));?>
	          </div>
	          </div>
	          
	     		<?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id']));?>
	     </fieldset>
			
      <div class="modal-footer">
      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default ')); ?>
					<?php echo $this->Form->end(); ?>
       <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close');?></button>
      	
      </div>
    </div>
  </div>
</div>


