<?php echo $this->Html->addCrumb('Edit Group', '/admin/groups/add');?>
<h1 class="page-heading">Edit Group</h1>
<div class="row">
    <div class="col-lg-4">
    <div class="panel panel-default">
    <div class="panel-body">
<?php echo $this->Form->create('Group', array());?>
    <fieldset>
    <?php echo $this->Form->input('id');?>
    <?php if($this->params['data']['Group']['id'] == 1):?>
        <div class="form-group">
              <label class="control-label">Name</label>
    <?php echo $this->Form->input('name', array('div'=>'control-group',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'form-control','readonly'=>true));?>
    </div>
    <?php else:?>
         <div class="form-group">
                  <label class="control-label">Name</label>
        <?php echo $this->Form->input('name', array('div'=>'control-group',
                    'error' => array('attributes' => array('style' => 'display:none')),
                    'label'=>false, 'class'=>'form-control'));?>
        </div>
    <?php endif;?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false, 'disabled'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
    </fieldset>
<?php echo $this->Form->end();?>
</div>
</div>
</div>
 <div class="col-lg-8">
    <div class="panel panel-default">
    <div class="panel-body">
         <table class="table table-hover table-striped">
            <tr>
            <th class="header"><?php echo $this->Paginator->sort('id');?></th>
            <th class="header"><?php echo $this->Paginator->sort('name');?></th>
            <th class="header"><?php echo $this->Paginator->sort('created');?></th>
            <th class="header"><?php echo $this->Paginator->sort('modified');?></th>
            <th class="header"><?php echo __('Actions');?></th>
    </tr>
    <?php
    foreach ($groups as $group):
        ?>
    <tr>
        <td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
        <td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
        <td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
        <td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
        <td class="">
            <div class="btn-group">
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class'=>'btn btn-primary')); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class'=>'btn btn-primary'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
            </div>
        </td>
    </tr>
        <?php endforeach; ?>
    </table>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>  
    <p>
    <ul class="pagination pagination pagination-right">
        <li><?php echo $this->Paginator->prev('<<',array(), null, array('class' => 'prev disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => ''));?></li>
        <li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?></li>
    </ul>
    </p>
    </div>
    </div>