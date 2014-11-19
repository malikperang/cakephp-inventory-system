<?php
echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-horizontal'));
?>
<fieldset>
    <legend><?php echo __('Login'); ?></legend>
    <?php
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
    ?>
    <div class="control-group"><div class="controls"><a href="<?php echo $this->Html->url('/users/register');?>">Sign Up</a> | <a href="<?php echo $this->Html->url('/users/forgot_password');?>">Forget password?</a></div></div>
    <div class="form-actions">
        <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
        <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
    </div>

</fieldset>
<?php
echo $this->Form->end();
?>
