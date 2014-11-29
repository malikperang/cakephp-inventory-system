<?php echo $this->Html->addCrumb('User', '/admin/users');?>
<h1 class="page-header">Edit User</h1>
<div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-body">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal','role' => 'form',));?>
	<fieldset>
	    <?php echo $this->Form->input('id');?>
        <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-7">
        <?php echo $this->Form->input('name', array('div'=>false,
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control'));?>
            </div>
            </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">E-mail</label>
              <div class="col-sm-7">
        <?php echo $this->Form->input('email', array('div'=>false,
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control'));?>
            </div>
            </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Password</label>
              <div class="col-sm-7">
        <?php echo $this->Form->input('password', array('div'=>false,
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control'));?>
            </div>
            </div>
                <div class="form-group">
              <label class="col-sm-2 control-label">Confirm Password</label>
              <div class="col-sm-7">
        <?php echo $this->Form->input('password2', array('div'=>false, 'type'=>'password',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control'));?>
            </div>
            </div>
        <div class="form-group">
              <label class="col-sm-2 control-label">Group</label>
              <div class="col-sm-7">
        <?php  echo $this->Form->input('group_id', array('div'=>false,
          'label'=>false, 'class'=>'form-control'));?>
        </div>
        </div>
        <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-7">
        <?php echo $this->Form->input('status', array('div'=>false,
           'label'=>false, 'class'=>'form-control'));?>
       
        <div class="form-actions">
            <?php 
             //$disabled = ($this->data['User']['id'] == 1 || $this->data['User']['id'] == 2) ? true : false;
             //if($disabled) echo "<p>Edit `Admin` user temporarily close for demo.Sorry for any inconvenience.</p>";
             echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false, 'disabled' =>false ));
?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>