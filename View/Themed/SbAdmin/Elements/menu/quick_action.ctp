<div class="quick-action">
					<h1 align="center">Quick Action</h1>
					<div class="aside-buttons">
						 
		                <!-- Button to trigger modal -->
						<a href="#StockModal" role="button" class="btn  btn-success" data-toggle="modal" onclick="toastr.info('Here you can quickly add new transactions for your stock!')">Stocks +/-</a>
		            </div>
		            <div class="aside-buttons">
		                <!-- Button to trigger modal -->
						<a href="#ItemModal" role="button" class="btn  btn-success" data-toggle="modal" onclick="toastr.info('Here you can quickly add new item into your store!')">Add Items</a>
		            </div>
					<div class="aside-buttons">
		                <?php echo $this->Form->button('Delete Selected',array('class'=>'btn  btn-success','id'=>'deleteBtn'));?>
		                 <?php echo $this->Form->end();?>
		            </div>
		            <div class="aside-buttons">
		            <?php echo $this->Form->button('Reset Selected', array('class'=>'btn  btn-success','type' => 'reset')); ?>
		            </div>
		            <!-- aside item: Tiny Stats -->
					<!--<div class="number-stats">
				    	<ul>
				        	<li>4579<span>visitors</span></li>
				            <li>571<span>orders</span></li>
				            <li>879<span>reviews</span></li>
				        </ul>
				    </div>-->
				</div>
			

				<!--Modal Section-->
						<div id="StockModal" class="modal hide fade stock-modal" style="" aria-hidden="true">
								  <div class="modal-header">
								    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								  <h3 id="StockModalLabel"> <i class="icon-arrow-up"></i><i class="icon-arrow-down"></i> Add New Stock</h3>
								  </div>
								  <div class="modal-body">
									<p>Choose an item to restock/release</p>
									<?php echo $this->Form->create('Stock',array('controller'=>'stocks','action'=>'add','class'=>'form-horizontal themed','id'=>'select-demo-js'));?>
								 	<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
								 <div class="control-group required form-inline">
								 	<div class="control-label">Choose an Items</div>
								 	<?php echo $this->Form->input('item_id',array('id'=>'select01','class'=>'span3 with-search','div'=>false,'label'=>false));?>
						
								 </div>
								  
									<div class="control-group required form-inline">

										<div class="control-label">Transaction</div>
										 <?php
										 //options for operator
										 $options = array(
												'add'=>'+',
												'minus'=>'-');
										  ?>
								         <?php echo $this->Form->input('operator',array('div'=>false,'label'=>false,'options'=>$options,'class'=>'span1'));?>
								         <?php echo $this->Form->input('stock_transaction',array('type'=>'number','div'=>false,'label'=>false));?>
								         <p class="help-block">Select '+' to add new stock,select '-' to take out stock.</p>
								        </div>
								     
								  </div>
								  <div class="modal-footer">
								    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								    <?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-primary')); ?>
								 	   <?php echo $this->Form->end();?>
								  </div>
								</div>

								<div id="ItemModal" class="modal hide fade" style="" tabindex="-1" role="dialog" aria-labelledby="StockModalLabel" aria-hidden="true">
								  <div class="modal-header">
								    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								     <h3 id="StockModalLabel"><i class="icon-shopping-cart"></i> Add New Item</h3>
								  </div>
								  <div class="modal-body">
										<p>Add new item to be in stock</p>
									<?php echo $this->Form->create('Item',array('controller'=>'items','action'=>'add','class'=>'form-horizontal themed'));?>
								 	<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
									<?php echo $this->Form->input('name',array('div'=>false));?>
									<?php //echo $this->Form->input('category_id',array('div'=>false));?>
									<?php echo $this->Form->input('minimum_qty',array('div'=>false));?>
									<?php echo $this->Form->input('maximum_qty',array('div'=>false));?>
									<?php echo $this->Form->input('unit_measurement_id',array('empty' => 'Choose Unit','div'=>false));?>	
								  </div>
								  <div class="modal-footer">
								    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								    <?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-primary')); ?>
								    <?php echo $this->Form->end();?>
								  </div>
								</div>
							<!--Modal section end-->

<script type="text/javascript">
$(document).bind('keydown', function(event) {
    if( event.which === 65 && event.shiftKey ) {
        $('#StockModal').modal('toggle');
    }

     if(  event.which == 40 && event.shiftKey ) {
        $('#ItemModal').modal('toggle');
    }

});

</script>