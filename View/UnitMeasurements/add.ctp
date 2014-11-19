<h1 id="page-header">New Unit Measurement</h1>	
<div class="fluid-container">
	<section id="widget-grid" class="">
		<div class="row-fluid">
			<article class="span12">
				<div class="jarviswidget" id="widget-id-0" data-widget-deletebutton="false" data-widget-editbutton="false">
				    <header>
				        <h2>Add New Unit Measurement</h2>                           
				    </header>
									
					<div class="inner-spacer"> 
<?php echo $this->Form->create('UnitMeasurement',array('class'=>'form-horizontal')); ?>
			
<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id'],'class'=>'form-control'));?>
			
			<div class="control-group">
					<label class="control-label">Unit name</label>
					<div class="controls">
<?php echo $this->Form->input('name',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array( 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'span4'));?>
                <p class="help-block">
					<?php echo __('Insert your choosen unit measurement. e.g: <i>"Kilogram"</i>');?>										
				</p>
                </div>
			</div>
<div class="control-group">
					<label class="control-label">Unit key</label>
					<div class="controls">
<?php echo $this->Form->input('key',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array('class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'span4'));
	?>
   			<p class="help-block">
					<?php echo __('Key as short of your unit. e.g: <i>"KG" for "Kilogram"</i>');?>										
				</p>
				</div>
				</div>
<br />
<br />

<div class="form-actions">
												
		<?php echo $this->Form->button(__('Save'),array('type'=>'submit','class'=>'btn btn-primary')); ?>
			<?php echo $this->Form->end();?>
	</div>

</div>
</div>
