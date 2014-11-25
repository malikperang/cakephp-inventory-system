<?php echo $this->Html->addCrumb('Stock Transaction', '/stocks/view/'.$stock['Stock']['id']);?>
<div class="row">
	<div class="col-lg-12">
	<h1 class="page-header">Stocks id#<?php echo h($stock['Stock']['id']); ?></h1>
	<div class="panel panel-default">
	<div class="panel-body">
		<table class="table table-striped table-bordered table-hover" cellspacing="0">
			<tbody>
				<tr><td><?php echo __('Transaction ID');?></td><td><?php echo h($stock['Stock']['transID']); ?>&nbsp;</td></tr>
				<tr><td><?php echo __('Item');?></td><td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?>&nbsp;</td></tr>

				<tr class="<?php if(isset($stock['Stock']['stock_in'])): echo 'success';endif;?>"><td><?php echo __('Stock in');?></td><td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td></tr>
				<tr class="<?php if(isset($stock['Stock']['stock_out'])): echo 'success';endif;?>"><td><?php echo __('Stock out');?></td><td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td></tr>
				<tr><td><?php echo __('Stock balance');?></td><td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td></tr>
				
				<tr class="<?php if($stock['Stock']['stock_status'] == 'Item out of stock'):echo 'danger';elseif($stock['Stock']['stock_status'] == 'Reached minimum quantity. Item need to restock'):echo 'warning';endif;?>"><td><?php echo __('Stock status');?></td><td><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td></tr>
				<tr><td><?php echo __('Created at');?></td><td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td></tr>
			</tbody>
		</table>
		
		<?php echo $this->Form->create('Stock');?>
		<?php echo $this->Form->input('id',array('type'=>'hidden','value'=>$stock['Stock']['id']));?>
		<?php echo $this->Form->input('transID',array('type'=>'hidden','value'=>$stock['Stock']['transID']));?>
		<?php echo $this->Form->input('item_name',array('type'=>'hidden','value'=>$stock['Item']['name']));?>
		<?php echo $this->Form->input('stock_in',array('type'=>'hidden','value'=>$stock['Stock']['stock_in']));?>
		<?php echo $this->Form->input('stock_out',array('type'=>'hidden','value'=>$stock['Stock']['stock_out']));?>
		<?php echo $this->Form->input('stock_status',array('type'=>'hidden','value'=>$stock['Stock']['stock_status']));?>
		<?php echo $this->Form->input('stock_balance',array('type'=>'hidden','value'=>$stock['Stock']['stock_balance']));?>
		<?php echo $this->Form->input('created',array('type'=>'hidden','value'=>date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))))); ?>
   		
   		<div class="btn-group">
   		<?php echo $this->Form->button('<i class="fa fa-envelope"></i>',array('class'=>'btn btn-default','escpae'=>false));?>
  	  	<?php echo $this->Form->end();?>
  		<?php if($userDetails['group_id'] == 1):?>
		<?php echo $this->Form->postLink(__('<i class="fa fa-trash"></i>'),array('action' => 'delete', $stock['Stock']['id']), array('class'=>'btn btn-default','escape'=>false), __('Are you sure you want to delete # %s?', $stock['Stock']['id'])); ?>
		
		<?php endif;?>

	
	
	</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		
$( "input#submit" ).replaceWith( "<button>");
	});

</script>