<?php echo $this->Html->addCrumb('Edit Setting', '/systemsettings/edit');?>
<h1 class="page-header">System Setting</h1>
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<?php echo $this->Form->create('SystemSetting',array('class'=>'form-horizontal','role'=>'form')); ?>
		<fieldset>
		
		<?php echo $this->Form->input('user_id',array('type'=>'hidden'));?>
	  	<div class="form-group">
        <label class="col-sm-3 control-label">System Name </label>
        <div class="col-sm-7">
		<?php echo $this->Form->input('name',array('class'=>'form-control','div'=>false,'label'=>false));?>
		</div>
		</div>
		<div class="form-group">
        <label class="col-sm-3 control-label">System Title</label>
        <div class="col-sm-7">
        <?php echo $this->Form->input('title',array('class'=>'form-control','div'=>false,'label'=>false));?>
        <p class="help-block">
				<?php echo __('will appeared on \'< title >< /title >\' tag');?>		
		</p>
        </div>
        </div>
		</fieldset>
	<?php echo $this->Form->button(__('Submit'),array('class'=>'btn btn-primary center-block')); ?>
	<?php echo $this->Form->end();?>
</div>
</div>
</div>
</div>
