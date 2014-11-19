<?php echo $this->Form->create('Stock',array('action'=>'deleteSelected'));?>
<h1 class="page-header">Stock Transaction 
<button class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#myModal" data-toggle='tooltip' data-original-title='Alternatively you can press "S" key' id='have-tooltip'>
  Launch demo modal
</button>
 </h1>

<?php // debug($stocks);?>
<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-body">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="data-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Transaction ID</th>			
				<th>Item</th>
				<th>In</th>
				<th>Out</th>
				<th>Balance</th>
				<th>Status</th>
				<th>Last Updated</th>
			</tr>
		</thead>
		  <tfoot>
            <tr>
               <th></th>
				<th>Transaction ID</th>			
				<th>Item</th>
				<th>In</th>
				<th>Out</th>
				<th>Balance</th>
				<th>Status</th>
				<th>Last Updated</th>
            </tr>
        </tfoot>
		<tbody>
			<?php foreach ($stocks as $stock): ?>
		
			<tr id="selected" href="stocks/view/<?php echo $stock['Stock']['id']?>">
				<td>
					<?php echo $this->Form->checkbox('Stock.' . $stock['Stock']['id'],array('value'=>$stock['Stock']['id'],'name'=>'data[Stock][id][]','hiddenField' => false));?>		
				</td>
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td>
					<?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?>
				</td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['created']); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php echo $this->Form->end();?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<?php echo $this->Html->script('config');?>

