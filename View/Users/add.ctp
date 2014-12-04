<?php echo $this->Html->addCrumb('New User', '/admin/users/add');?>
<h1 class="page-header">New User</h1>
<div class="row">
    <div class="col-lg-6">
    <div class="panel panel-default">
    <div class="panel-body">
<?php echo $this->Form->create('User', array('role'=>'form'));?>
	<fieldset>
          <div class="form-group">
              <label class="control-label">Name</label>
              <?php echo $this->Form->input('name', array('div'=>'control-group','error' => array('attributes' => array('style' => 'display:none')),'label'=>false, 'class'=>'form-control')); ?>
              </div>

              <div class="form-group">
              <label class="control-label">Email</label>
              <?php  echo $this->Form->input('email', array('div'=>'control-group','error' => array('attributes' => array('style' => 'display:none')),'label'=>false, 'class'=>'form-control'));?>
              </div>

              <div class="form-group">
              <label class="control-label">Password</label>
               <?php  echo $this->Form->input('password', array('div'=>'control-group','error' => array('attributes' => array('style' => 'display:none')),'label'=>false, 'class'=>'form-control'));?>
               <p class="help-block">Password must be at least 8 character</p>
              </div>

              <div class="form-group">
              <label class="control-label">Confirm Password</label>
              <?php  echo $this->Form->input('password2', array('div'=>'control-group', 'type'=>'password','error' => array('attributes' => array('style' => 'display:none')),'label'=>false, 'class'=>'form-control'));?>
              </div>

              <div class="form-group">
              <label class="control-label">Group</label>
              <?php  echo $this->Form->input('group_id', array('div'=>'control-group',
                    'label'=>false, 'class'=>'form-control'));?>
              </div>

              <div class="form-group">
              <label class="control-label">Status</label>
            <?php  echo $this->Form->input('status', array('div'=>'control-group','label'=>false, 'class'=>''));?>
            <div class="form-actions">
                <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
                <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
            </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
</div>