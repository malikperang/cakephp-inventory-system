<?php echo $this->Html->addCrumb(__('Stock Alert'), '/stocks');?>
<h1 class="page-header"><?php echo __('Stock Alert');?></h1>
	<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6">
	<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Item out of Stock</h3>
            </div>
    <div class="panel-body">
    <?php if(empty($outstocks)): echo 'No report available'; else:?>
	<?php echo $this->Form->create('Stock',array('action'=>'deleteSelected'));?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>		
				<th><?php echo __('Item');?></th>
				<th><?php echo __('Status');?></th>
				<th><?php echo __('Created at');?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tfoot>
        </tfoot>
		<tbody>
			<?php foreach ($outstocks as $stock): ?>
			<tr>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['StockStatus']['name']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Item']['modified']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Item']['id'],urlencode($stock['Item']['stock_modified'])),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p>
     <?php
     echo $this->Paginator->counter(array(
     'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
     ));
     ?> </p>
     <ul class="pagination pagination pagination-right">
     <li><?php echo $this->Paginator->prev('<<',array(), null, array('class' => 'prev disabled'));?>
     </li><li><?php echo $this->Paginator->numbers(array('separator' => ''));?>
     </li><li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?>
     </li></ul>
	<?php echo $this->Form->end();?>
	<?php endif;?>
</div>
</div>
</div>

	<div class="col-lg-6 col-sm-6 col-md-6">
	<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Item reaches minimum quantity');?></h3>
            </div>
    <div class="panel-body">
    <?php if(empty($minstocks)): echo 'No report available'; else:?>
	<?php echo $this->Form->create('Stock',array('action'=>'deleteSelected'));?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>	
				<th><?php echo __('Item');?></th>
				<th><?php echo __('Status');?></th>
				<th><?php echo __('Created at');?></th>
				<th><?php echo __('Action');?></th>
			</tr>
		</thead>
		<tfoot>
        </tfoot>
		<tbody>
			<?php foreach ($minstocks as $stock): ?>
			<tr>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['StockStatus']['name']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Item']['modified']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Item']['id'],urlencode($stock['Item']['stock_modified'])),array('class'=>'btn btn-primary btn-sm','escape'=>false)); ?></div></td>
				
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<p>
     <?php
     echo $this->Paginator->counter(array(
     'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
     ));
     ?> </p>
     <ul class="pagination pagination pagination-right">
     <li><?php echo $this->Paginator->prev('<<',array(), null, array('class' => 'prev disabled'));?>
     </li><li><?php echo $this->Paginator->numbers(array('separator' => ''));?>
     </li><li><?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));?>
     </li></ul>
	<?php echo $this->Form->end();?>
	
	<?php endif;?>
	</div>
	</div>