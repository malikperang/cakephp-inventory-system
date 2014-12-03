<?php echo $this->Html->addCrumb('New Item', '/items/add');?>
<h1 class="page-header">Edit Item</h1>
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">
	<?php echo $this->Session->flash();?>
		<?php echo $this->Form->create('Item',array('role' => 'form'),array('controller'=>'items','action'=>'add'));?>
	<fieldset>

			  <div class="form-group">
	          <label class="control-label">Item Code #</label>
					   	<?php echo $this->Form->input('itemCode',array('label'=>false,'div'=>false,'type'=>'text','class'=>'form-control')); ?>
			  </div>

			  <div class="form-group">
	          <label class="control-label">Name</label>
					   	<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
			  </div>
			  
			  <div class="form-group">
	          <label class="control-label">Minimum Quantity</label>
						<?php echo $this->Form->input('minimum_qty',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
			  </div>

			  <div class="form-group">
	          <label class="control-label">Maximum Quantity</label>
						<?php echo $this->Form->input('maximum_qty',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>
						</div>

			  <div class="form-group">
	          <label class="control-label">Unit of Measure</label>
	     			<?php echo $this->Form->input('unit_measurement_id',array('div'=>false,'class'=>'form-control select_box','label'=>false,'empty'=>'Choose Unit')); ?>
	    
	          </div>
	            <?php echo $this->Form->input('modified_by',array('type'=>'hidden','value'=>$userDetails['id'])); ?>

			  </div>
	     </fieldset>
	      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
					<?php echo $this->Form->end(); ?>
					<br />
	</div>
	</div>
	</div>