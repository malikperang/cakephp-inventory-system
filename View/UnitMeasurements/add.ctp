<h1 class="page-header">Unit Measurement</h1>
 
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">
	<fieldset>
		  <?php echo $this->Form->create('UnitMeasurement', array('class' => 'form-horizontal', 'role' => 'form'));?>
	      <?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
  		  <div class="form-group">
	          <label class="col-sm-2 control-label">Unit Name</label>
	          <div class="col-sm-7">	
			<?php echo $this->Form->input('name',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array( 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'form-control'));?>
                <p class="help-block">
					<?php echo __('Insert your choosen unit measurement. e.g: <i>"Kilogram"</i>');?>										
				</p>
                </div>
			</div>
		   <div class="form-group">
	          <label class="col-sm-2 control-label">Unit Key</label>
	          <div class="col-sm-7">	
			<?php echo $this->Form->input('key',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array('class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'form-control'));
			?>
   			<p class="help-block">
					<?php echo __('Key as short of your unit. e.g: <i>"KG" for "Kilogram"</i>');?>										
				</p>
				</div>
				</div>
	</fieldset>									
		<?php echo $this->Form->button(__('Save'),array('type'=>'submit','class'=>'btn btn-primary center-block')); ?>
		<?php echo $this->Form->end();?>
	

</div>
</div>
</div>
