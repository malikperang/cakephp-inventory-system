<?php echo $this->Html->addCrumb('Stock Transaction', '/stocks');?>
<h1 class="page-header">Stock Transaction 
	<button class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#stockModal" data-toggle='tooltip' data-original-title='Alternatively you can press "shift" + "N" key' id='have-tooltip'>+/- Stock</button>
 </h1>

 	<?php echo $this->Form->create('Stock',array('action'=>'deleteSelected'));?>

<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-body">
	<?php if($userDetails['group_id'] == 1):?>
		
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="stock-table">
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
				<th>Action</th>
			</tr>
		</thead>
		 <tfoot>
		 	<tr>
		 		<td colspan="9"><input type="checkbox" id="selectall"/> 	<?php echo $this->Form->button('Delete',array('type'=>'submit','class'=>'btn btn-primary'));?></td>
		 	</tr>
          
        </tfoot>
		<tbody>
			
	
			<?php foreach ($stocks as $stock): ?>

			<tr id="selected" href="stocks/view/<?php echo $stock['Stock']['id']?>">

				<td><?php echo $this->Form->checkbox('Stock.' . $stock['Stock']['id'],array('class'=>'checkbox1','value'=>$stock['Stock']['id'],'name'=>'data[Stock][id][]','hiddenField' => false));?></td>
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
				<td class="text-center"><div class="btn-group"><?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Stock']['id']),array('class'=>'btn btn-primary','escape'=>false)); ?></div></td>
			</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
	</div>
	</div>
	</div>
	<?php echo $this->Form->end();?>
	<?php else:?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="stock-table">
		<thead>
			<tr>
				
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
          
        </tfoot>
		<tbody>
			
	
			<?php foreach ($stocks as $stock): ?>

			<tr id="selected" href="stocks/view/<?php echo $stock['Stock']['id']?>">

			
				<td><?php echo h($stock['Stock']['transID']);?></td>
				<td><?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?></td>			
				<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
				<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
				<td ><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($stock['Stock']['created']))); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
<?php endif;?>
<!-- Stock Modal -->
<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">+/- Stock</h4>
      </div>
      <div class="modal-body">
     <?php echo $this->Form->create('Stock',array('class' => 'form-horizontal','role' => 'form','controller'=>'stocks','action'=>'add'));?>
	<fieldset>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Choose an Item</label>
	          <div class="col-sm-7">
	     			<?php echo $this->Form->input('item_id',array('id'=>'','div'=>false,'class'=>'form-control select_box','label'=>false,'data-placeholder'=>"Select Your Options")); ?>
	          </div>
	          </div>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Transaction</label>
	          <div class="row">
	          <div class="col-sm-1">     
			         <?php
						//options for operator
						 $options = array(
								'add'=>'+',
								'minus'=>'-');
					  ?>
			     	<?php echo $this->Form->input('operator',array('div'=>false,'label'=>false,'class'=>'form-control cus-select','options'=>$options));?>
			   </div>
			   <div class="col-sm-3">     
			     	<?php echo $this->Form->input('stock_transaction',array('div'=>false,'label'=>false,'class'=>'form-control cus-input','type'=>'number'));?>
	          </div>
	          </div>
	          </div>
	          
	     		<?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id']));?>
	     </fieldset>
			
      </div>
      <div class="modal-footer">
      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default')); ?>
					<?php echo $this->Form->end(); ?>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	
      </div>
    </div>
  </div>
</div>

<?php
	echo $this->Html->css('vendor/chosen');
 	echo $this->Html->script('vendor/chosen/chosen.jquery');
 	echo $this->Html->script('dt-config');

?>
<script type="text/javascript">
	$(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});

</script>


