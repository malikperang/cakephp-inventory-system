<div class="row">
	<div class="col-lg-7">

	<h1 class="page-header">Add / Remove Stock</h1>
	<div class="panel panel-default">
	<div class="panel-body">
	<?php echo $this->Form->create('Stock', array(
	     'class' => 'form-horizontal', 
	     'role' => 'form',
	     ));?>
	<fieldset>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Choose an Item</label>
	          <div class="col-sm-7">
	     			<?php echo $this->Form->input('item_id',array('div'=>false,'class'=>'form-control','label'=>false)); ?>
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
			     	<?php echo $this->Form->input('operator',array('div'=>'oper-input','label'=>false,'class'=>'form-control cus-select','options'=>$options));?>
			   </div>
			   <div class="col-sm-3">     
			     	<?php echo $this->Form->input('stock_transaction',array('div'=>false,'label'=>false,'class'=>'form-control cus-input','type'=>'number'));?>
	          </div>
	          </div>
	          </div>
	          
	     		<?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id']));?>
	     </fieldset>
					<?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
					<?php echo $this->Form->end(); ?>
	</div>
</div>
</div>
</div>

