<div class="users view">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('User', array('action'=>'index'));?><span class="divider">/</span></li>
    <li class="active">Edit User</li>
</ul>
<table class="table">
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
            <th><?php echo __('Created'); ?></th>
            <td><?php echo h($user['User']['created']); ?></td>
        </tr>
        <tr>
            <th><?php echo __('Modified'); ?></th>
            <td><?php echo h($user['User']['modified']); ?></td>
        </tr>
    </tbody>
</table>  
</div>
