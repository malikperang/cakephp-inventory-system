<?php echo $this->Html->addCrumb('New Stock Transaction', '/stocks/add');?>
<div class="row">
	<div class="col-lg-7">

	<h1 class="page-header">New Stock Transaction</h1>
	<div class="panel panel-default">
	<div class="panel-body">
	<?php echo $this->Form->create('Stock', array('role' => 'form',));?>
	<fieldset>
		<?php echo $this->Form->input('transID',array('type'=>'hidden','value'=>false));?>
	          <div class="form-group">
	          <label class="control-label">Choose an Item</label>
	     			<?php echo $this->Form->input('item_id',array('div'=>false,'class'=>'form-control','label'=>false)); ?>
	          </div>
	          <div class="form-group">
	          <label class="control-label">Transaction</label>     
			     	<?php echo $this->Form->input('stock_transaction',array('div'=>false,'label'=>false,'class'=>'form-control','type'=>'number'));?>
			     	<p class="help-block">
						<?php echo __('To remove stock, add \'-\'. E.g: -200.');?>		
					 </p>
	          </div>
	           <div class="form-group">
	          <label class="control-label">Transaction Remarks</label>     
			     	<?php echo $this->Form->input('transaction_remarks',array('div'=>false,'label'=>false,'class'=>'form-control','type'=>'textarea'));?>
	          </div>
	          
	         
	          
	     		<?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id']));?>
	     </fieldset>
					<?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
					<?php echo $this->Form->end(); ?>
	</div>
</div>


