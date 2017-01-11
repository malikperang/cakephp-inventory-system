<?php echo $this->Html->addCrumb('Users', '/admin/users');?>
<h1 class="page-header">Users List</h1>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">
    <table class="table table-hover table-striped table-bordered">
    <tr>
        <th class="header"><?php echo $this->Paginator->sort('id');?></th>
        <th class="header"><?php echo $this->Paginator->sort('email');?></th>
        <th class="header"><?php echo $this->Paginator->sort('group_id');?></th>
        <th class="header"><?php echo $this->Paginator->sort('created');?></th>
        <th class="header"><?php echo $this->Paginator->sort('status');?></th>
        <th class="header center"><?php echo __('Actions');?></th>
    </tr>
    <?php
    foreach ($users as $user): ?>
    <tr>
            <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
            <td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
            <td>
                    <?php
                    $adminRoleName = array('admin', 'administrator');
                    if(in_array(strtolower($user['Group']['name']), $adminRoleName)){//Admin
                        echo $this->Html->image('icons/tick_disabled.png');
                    }else{
                        echo '<span style="cursor: pointer">';
                        echo $this->Html->image('icons/allow-' . intval($user['User']['status']) . '.png',
                            array('onclick' => 'published.toggle("status-'.$user['User']['id'].'", "'.$this->Html->url('/users/toggle/').$user['User']['id'].'/'.intval($user['User']['status']).'");',
                                  'id' => 'status-'.$user['User']['id']
                                ));
                        echo '</span>&nbsp;';
                    }
                    ?>
            </td>
            <td class="text-center">
                <div class="btn-group ">
                  <?php echo $this->Html->link(__('<i class="fa fa-eye"></i> '), array('action' => 'view', $user['User']['id']), array('class'=>'btn btn-sm btn-primary','escape'=>false)); ?>
                  <?php echo $this->Html->link(__('<i class="fa fa-pencil-square-o"></i>'), array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-sm btn-primary','escape'=>false)); ?>
                  <?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i>'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn btn-sm btn-primary','escape'=>false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
<script type="text/javascript">
    var published = {
        toggle : function(id, url){
            obj = $('#'+id).parent();
            $.ajax({
                url: url,
                type: "POST",
                success: function(response){
                    obj.html(response);
                }
            });
        }
    };
</script>