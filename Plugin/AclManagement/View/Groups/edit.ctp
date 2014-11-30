<div class="groups form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Group', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit Group</li>
</ul>
<?php echo $this->Form->create('Group', array('class'=>'form-horizontal'));?>
    <fieldset>
        <legend><?php echo __('Add Group'); ?></legend>
    <?php
            echo $this->Form->input('id');
            echo $this->Form->input('name', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Name').'</label><div class="controls">',
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
    ?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false, 'disabled'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
    </fieldset>
<?php echo $this->Form->end();?>
</div>
