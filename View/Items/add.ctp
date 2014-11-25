<h1 class="page-header">Add New Item</h1>
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">
	<?php echo $this->Session->flash();?>
		<?php echo $this->Form->create('Item',
      array(
	     'class' => 'form-horizontal', 
	     'role' => 'form',
	     ),
	  array('controller'=>'items','action'=>'add'));?>
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
	          <label class="col-sm-2 control-label">Category</label>
	          <div class="col-sm-7">
				<?php echo $this->Form->input('item_category_id',array('label'=>false,'div'=>false,'class'=>'form-control select_box','empty'=>'Select Category')); ?>
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
	     			<?php echo $this->Form->input('unit_measurement_id',array('div'=>false,'class'=>'form-control select_box','label'=>false,'empty'=>'Choose Unit')); ?>
	          </div>
	          </div>
	            <?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id'])); ?>

			  </div>
	     </fieldset>
	      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-primary center-block')); ?>
					<?php echo $this->Form->end(); ?>
					<br />
	</div>
	</div>
	</div>
	<?php
	echo $this->Html->css('vendor/chosen');
 	echo $this->Html->script('vendor/chosen/chosen.jquery');
	?>
