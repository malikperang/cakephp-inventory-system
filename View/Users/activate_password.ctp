<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Home', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active"><?php echo __('Recover Password');?></li>
</ul>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal'));
?>
<div class="row">    
    <div class="span14">
        <?php
        echo $this->Form->input('password', array('div'=>'clearfix',
                        'before'=>'<label>'.__('Password').'</label><div class="input">',
                        'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('password2', array('div'=>'clearfix', 'type'=>'password',
                        'before'=>'<label>'.__('Confirm Password').'</label><div class="input">',
                        'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));    
        ?>
        <?php echo $this->Form->hidden('ident', array('value' => $ident)); ?>
        <?php echo $this->Form->hidden('activate', array('value' => $activate)); ?>        
    </div>   
</div>
<div class="row">
    <div class="span7">
        <div class="clearfix required">
            <label class="">&nbsp;</label>
            <div class="input">
                <?php echo $this->Form->button(__('Submit'), array('class'=>'btn primary', 'type'=>'submit', 'div'=>false));?>
                <?php echo $this->Form->button(__('Cancel'), array('class'=>'btn', 'type'=>'reset', 'div'=>false));?>
            </div>
        </div>
    </div>
    <div class="span5">
       
    </div>
</div>
<?php
echo $this->Form->end();
?>


