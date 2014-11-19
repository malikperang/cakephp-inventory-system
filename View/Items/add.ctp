<?php //debug($userDetails);?>

<h1 id="page-header">Add Item</h1>	
					
					<div class="fluid-container">
						<section id="widget-grid" class="">
							<div class="row-fluid">
								<article class="span12">
									<div class="jarviswidget" id="widget-id-0"  data-widget-deletebutton="false">
									    <header>
									        <h2>Add New Item</h2>                           
									    </header>
            
									        <div class="inner-spacer"> 
		<?php echo $this->Form->create('Item',array('class'=>'form-horizontal')); ?>
			<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id'])); ?>

			<div class="control-group">
					<label class="control-label">Item ID</label>
					<div class="controls">
					   	<?php echo $this->Form->input('uniqueID',array('label'=>false,'div'=>false,'type'=>'text','class'=>'span4')); ?>
					   </div>
					</div>
				<div class="control-group">
					<label class="control-label">Item Name</label>
					<div class="controls">
					   	<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'span4')); ?>
					   </div>
					</div>
				
						<?php //disable for next release echo $this->Form->input('category_id'); ?>
				<div class="control-group">
					<label class="control-label">Minimum Quantity</label>
					<div class="controls">
						<?php echo $this->Form->input('minimum_qty',array('label'=>false,'div'=>false)); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Maximum Quantity</label>
					<div class="controls">
						<?php echo $this->Form->input('maximum_qty',array('label'=>false,'div'=>false)); ?>
						</div>
				</div>
					<div class="control-group">
					<label class="control-label">Choose Unit Name</label>
					<div class="controls">
						<?php echo $this->Form->input('unit_measurement_id',array('empty' => 'Choose Unit','label'=>false,'div'=>false));?>
					</div>
				</div>
				<?php echo $this->Form->input('company_id',array('type'=>'hidden','value'=>$userDetails['company_id']));?>

			<div class="form-actions">
									<?php echo $this->Form->button('Cancel', array('type' => 'reset','class'=>'btn btn-danger'));?>
										<?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-success')); ?>


									</div>
</div>
</div>
