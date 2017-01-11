<?php echo $this->Html->addCrumb('New Setting', '/systemsettings/add');?>
<h1 class="page-header">General Setting</h1>	
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">											
	<?php echo $this->Form->create('SystemSetting',array('type'=>'file','class'=>'form-horizontal','role'=>'form')); ?>
	<?php echo $this->Form->input('created',array('type'=>'hidden','value'=>$userDetails['id']));?>
		 <div class="form-group">
          <label class="col-sm-2 control-label">Company Name</label>
          <div class="col-sm-7">
			<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control'));?>
			 <p class="help-block">
				<?php echo __('This will be your system name.');?>		
			 </p>
		 </div>
		 </div>

		  <div class="form-group">
          <label class="col-sm-2 control-label">System Title</label>
          <div class="col-sm-7">
			<?php echo $this->Form->input('title',array('label'=>false,'div'=>false,'class'=>'form-control'));?>
			 <p class="help-block">
				<?php echo __('This will change title tag');?>		
			 </p>
		 </div>
		 </div>
				<?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-default center-block')); ?>		
		</div>
		</div>
		</div>	
