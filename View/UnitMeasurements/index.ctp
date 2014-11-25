<h1 class="page-header">Unit Measurement
	<button class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#stockModal" data-toggle='tooltip' data-original-title='Alternatively you can press "S" key' id='have-tooltip'>+/- Stock</button>
 </h1>
 
<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-body">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="stock-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Transaction ID</th>			
				<th>Item</th>
				<th>In</th>
				<th>Out</th>
				<th>Balance</th>
				<th>Status</th>
				<th>Last Updated</th>
			</tr>
		</thead>
		  <tfoot>
          
        </tfoot>
		<tbody>
			<?php echo $this->Form->create('Stock',array('action'=>'deleteSelected'));?>
			<?php foreach ($stocks as $stock): ?>

			<tr id="selected" href="stocks/view/<?php echo $stock['Stock']['id']?>">

				<td><?php echo $this->Form->checkbox('Stock.' . $stock['Stock']['id'],array('value'=>$stock['Stock']['id'],'name'=>'data[Stock][id][]','hiddenField' => false));?></td>
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php echo $this->Form->end();?>

<!-- Stock Modal -->
<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">+/- Stock</h4>
      </div>
      <div class="modal-body">
     <?php echo $this->Form->create('Stock',array('class' => 'form-horizontal','role' => 'form','controller'=>'stocks','action'=>'add'));?>
	<fieldset>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Choose an Item</label>
	          <div class="col-sm-7">
	     			<?php echo $this->Form->input('item_id',array('id'=>'','div'=>false,'class'=>'form-control select_box','label'=>false,'data-placeholder'=>"Select Your Options")); ?>
	          </div>
	          </div>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Transaction</label>
	          <div class="row">
	          <div class="col-sm-1">     
			         <?php
						//options for operator
						 $options = array(
								'add'=>'+',
								'minus'=>'-');
					  ?>
			     	<?php echo $this->Form->input('operator',array('div'=>false,'label'=>false,'class'=>'form-control cus-select','options'=>$options));?>
			   </div>
			   <div class="col-sm-3">     
			     	<?php echo $this->Form->input('stock_transaction',array('div'=>false,'label'=>false,'class'=>'form-control cus-input','type'=>'number'));?>
	          </div>
	          </div>
	          </div>
	          
	     		<?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id']));?>
	     </fieldset>
			
      </div>
      <div class="modal-footer">
      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default')); ?>
					<?php echo $this->Form->end(); ?>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	
      </div>
    </div>
  </div>
</div>

<?php
	echo $this->Html->css('vendor/chosen');
 	echo $this->Html->script('vendor/chosen/chosen.jquery');
 	echo $this->Html->script('dt-config');

?>



<!--<div class="unitMeasurements index">
	<h2><?php echo __('Unit Measurements'); ?></h2>
	<table class="table table-hover table-bordered">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('key'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($unitMeasurements as $unitMeasurement): ?>
	<tr>
		<td><?php echo h($unitMeasurement['UnitMeasurement']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($unitMeasurement['Company']['id'], array('controller' => 'companies', 'action' => 'view', $unitMeasurement['Company']['id'])); ?>
		</td>
		<td><?php echo h($unitMeasurement['UnitMeasurement']['name']); ?>&nbsp;</td>
		<td><?php echo h($unitMeasurement['UnitMeasurement']['key']); ?>&nbsp;</td>
		<td class="actions">
<div class="btn-group">			<?php echo $this->Html->link(__('View'), array('action' => 'view', $unitMeasurement['UnitMeasurement']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unitMeasurement['UnitMeasurement']['id']),array('class'=>'btn btn-danger','escape'=>false)); ?>
			<?php echo $this->Form->postLink(__('Delete'),array('action' => 'delete', $unitMeasurement['UnitMeasurement']['id']), array('class'=>'btn btn-danger','escape'=>false), __('Are you sure you want to delete # %s?', $unitMeasurement['UnitMeasurement']['id'])); ?>
</div>		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination pagination pagination-right">
	<li><?php
		echo $this->Paginator->prev('<<',array(), null, array('class' => 'prev disabled'));
	?>
</li><li><?php
		echo $this->Paginator->numbers(array('separator' => ''));
	?>
</li><li><?php
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</li>	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Unit Measurement'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
