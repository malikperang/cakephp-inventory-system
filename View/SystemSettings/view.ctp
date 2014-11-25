<div class="systemSettings view">
<h2><?php echo __('System Setting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Banner'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['company_banner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Logo'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['company_logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($systemSetting['SystemSetting']['modified_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit System Setting'), array('action' => 'edit', $systemSetting['SystemSetting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete System Setting'), array('action' => 'delete', $systemSetting['SystemSetting']['id']), null, __('Are you sure you want to delete # %s?', $systemSetting['SystemSetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List System Settings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System Setting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
