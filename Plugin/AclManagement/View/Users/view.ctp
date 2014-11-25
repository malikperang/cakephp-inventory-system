<?php echo $this->Html->addCrumb('User', '/admin/users');?>
<h1 class="page-header">User id #<?php echo h($user['User']['id']); ?></h1>
<div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <td><?php echo h($user['User']['id']); ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Email'); ?></th>
                    <td><?php echo h($user['User']['email']); ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Group'); ?></th>
                    <td><?php echo h($user['Group']['name']); ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Full Name'); ?></th>
                    <td><?php echo h($user['User']['name']); ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Created'); ?></th>
                    <td><?php echo h($user['User']['created']); ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Modified'); ?></th>
                    <td><?php echo h($user['User']['modified']); ?></td>
                </tr>
            </tbody>
        </table>  
        <div class="btn-group"> 
         <?php echo $this->Html->link(__('<i class="fa fa-pencil-square-o"></i>'), array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-primary','escape'=>false)); ?>
        <?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i>'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn btn-primary','escape'=>false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
</div>
</div>
</div>
