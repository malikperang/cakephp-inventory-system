<h1 class="page-header">Select by Date</h1>
<div class="row">
<div class="col-lg-6">
<div class="panel panel-default">
<div class="panel-body">
	<?php echo $this->Form->create('DateRange', array(
     'role' => 'form',
     ),array('controller'=>'stocks','action'=>'select_by_date'));?>
     <fieldset>

        <label class=" control-label">Date Range</label>
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
	<h3>Result</h3>
	<div class="panel panel-default">
	<div class="panel-body">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="selectdate">
		<thead>
			<tr>
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
		<?php if(isset($stocks)):?>
			<?php foreach ($stocks as $stock): ?>
				<?php //debug($stock);exit;?>
				
		
			<tr id="selected" href="stocks/view/<?php echo $stock['Stock']['id']?>">
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td>
					<?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?>
				</td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['created']); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		<?php endif;?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php echo $this->Form->end();?>


<?php echo $this->Html->script('dt-config');?>
			