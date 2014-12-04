<div class="users form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit Profile</li>
</ul>
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Profile'); ?></legend>
	<?php
            echo $this->Form->input('id');
            echo $this->Form->input('name', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Name').'</label><div class="controls">',
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));

            $tooltip = ($this->Session->check('Auth.User.needverify_email')) ? 'Email need verify' : '';
            echo $this->Form->input('email', array('div'=>'control-group', 'readonly'=>(bool)$this->Session->read('Auth.User.needverify_email'), 'value'=>$this->Session->read('Auth.User.needverify_email'), 'title' => $tooltip,
                'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
                'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));

            echo $this->Form->input('password', array('div'=>'control-group', 'type'=>'password',
                'before'=>'<label class="control-label">'.__('Password').'</label><div class="controls">',
                'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
            echo $this->Form->input('password2', array('div'=>'control-group', 'type'=>'password',
                'before'=>'<label class="control-label">'.__('Confirm Password').'</label><div class="controls">',
                'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
        ?>
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