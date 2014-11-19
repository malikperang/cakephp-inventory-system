<div class="users form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">New User</li>
</ul>
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('New User'); ?></legend>
	<?php
            echo $this->Form->input('name', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Name').'</label><div class="controls">',
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
            echo $this->Form->input('email', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
                'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
            echo $this->Form->input('password', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Password').'</label><div class="controls">',
                'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
            echo $this->Form->input('password2', array('div'=>'control-group', 'type'=>'password',
                'before'=>'<label class="control-label">'.__('Confirm Password').'</label><div class="controls">',
                'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
            echo $this->Form->input('group_id', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Group').'</label><div class="controls">',
                'after'=>'</div>','label'=>false, 'class'=>'input-xlarge'));
            echo $this->Form->input('status', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Status').'</label><div class="controls">',
                'after'=>'</div>','label'=>false, 'class'=>''));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>