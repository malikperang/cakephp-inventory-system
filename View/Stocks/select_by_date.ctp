<?php echo $this->Html->addCrumb('Stock by date', '/stocks/select_by_date');?>
<h1 class="page-header">Stock by Date</h1>
<div class="row">
<div class="col-lg-6">
<div class="panel panel-default">
<div class="panel-body">
	<?php echo $this->Form->create('DateRange', array('role' => 'form'),array('controller'=>'stocks','action'=>'select_by_date'));?>
     <fieldset>
        <label class=" control-label">Insert selected date</label>
		<div class="input-daterange input-group" id="datepicker">
			<?php echo $this->Form->input('date_start',array('type'=>'text','class'=>'input-sm form-control col-sm-2','div'=>false,'label'=>false,'placeholder'=>'Start date'));?>
		    <span class="input-group-addon">to</span>
		    <?php echo $this->Form->input('date_end',array('type'=>'text','class'=>'input-sm form-control','div'=>false,'label'=>false,'placeholder'=>'End date'));?>
		</div>
     </fieldset>
     <br />
	<?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
	<?php echo $this->Form->end(); ?>
</div>
</div>
</div>
</div>

<div class="row">
	<div class="col-lg-12">
	<h3 class="page-header">Stock Transaction History</h3>
	<div class="panel panel-default">
	<div class="panel-body">
	<?php if($userDetails['group_id'] == 1):?>
		<?php echo $this->Form->create('Stock',array('controller'=>'stocks','action'=>'deleteSelected'));?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="selectdate-admin">
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
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
		 	<tr>
		 		<td colspan="9"><input type="checkbox" id="selectall"/> 	<?php echo $this->Form->button('Delete',array('type'=>'submit','class'=>'btn btn-primary'));?></td>
		 	</tr>
        </tfoot>
		<tbody>
		<?php if(isset($stocks)):?>
			<?php foreach ($stocks as $stock): ?>
			<tr >
				<td><?php echo $this->Form->checkbox('Stock.' . $stock['Stock']['id'],array('class'=>'checkbox1','value'=>$stock['Stock']['id'],'name'=>'data[Stock][id][]','hiddenField' => false));?></td>
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td>
					<?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?>
				</td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Stock']['id']),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
			</tr>
			<?php endforeach; ?>
		<?php endif;?>
		</tbody>
	</table>
	<?php echo $this->Form->end();?>
	<?php else:?>
	
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="selectdate-staff">
		<thead>
			<tr>
				<th>Transaction ID</th>			
				<th>Item</th>
				<th>In</th>
				<th>Out</th>
				<th>Balance</th>
				<th>Status</th>
				<th>Last Updated</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
           
        </tfoot>
		<tbody>
		<?php if(isset($stocks)):?>
			<?php foreach ($stocks as $stock): ?>
			<tr >
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td>
					<?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?>
				</td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Stock']['id']),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
			</tr>
			<?php endforeach; ?>
		<?php endif;?>
		</tbody>
	</table>
	<?php endif;?>
	</div>
	</div>
	<?php echo $this->Form->end();?>

			