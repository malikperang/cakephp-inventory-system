<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Home', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active"><?php echo __('Forgot Password');?></li>
</ul>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal'));
?>
<div class="row">
    <div class="span12">
        <?php
        echo $this->Form->input('email', array('div'=>'control-group',
            'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
            'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'input-xlarge'));
        ?>
    </div>
</div>
<div class="form-actions">
        <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-primary', 'type'=>'submit', 'div'=>false));?>
        <?php echo $this->Form->button(__('Cancel'), array('class'=>'btn', 'type'=>'reset', 'div'=>false));?>
</div>
<?php
echo $this->Form->end();
?>


