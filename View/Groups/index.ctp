<div class="groups index">
	<table cellpadding="0" cellspacing="0" class="table">
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
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class'=>'btn')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class'=>'btn'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
            </div>
		</td>
	</tr>
        <?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>
</div>