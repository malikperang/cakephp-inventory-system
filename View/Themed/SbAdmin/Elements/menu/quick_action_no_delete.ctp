<?php if($userDetails['group_id'] == 1):?>

<?php endif;?>

<?php if($userDetails['group_id'] == 2):?>

	<aside class="right">                  
           <div class="mini-inbox">      
                       <?php 
                        if(empty($settings)):?>
                        	<h3 align="center"><strong><?php echo __('Your Company Name');?></strong></h3></span>
                        	 <?php echo $this->Html->image('default_company_logo.gif');?>
                    	
                       	<?php else:
                        foreach ($settings as $setting):?>	
                        <div class="alert inbox">
                        <h1 align="center"><strong><?php echo $setting['Setting']['company_name']?></strong></h1></div>
                        <div class="alert inbox"> 
                        <?php echo $this->Html->image($setting['Setting']['logo']);?>
                    	</div>                
                       	<?php endforeach;?>
                    	<?php endif;?>
                   	 <?php 
                   		 if(isset($subscription_detail) && is_array($subscription_detail)): ?>
						<?php foreach ($subscription_detail as $sbcDetail) : ?>
						<div class="alert inbox">
							Your Plan :	
							<?php echo $sbcDetail['Subscription']['plan']?>
						</div>		
						<div class="alert inbox">				
								Date Start :						
							<?php echo $sbcDetail['Subscription']['date_start']?>
						</div>		
						<div class="alert inbox last-child">						
								Date End :					
							<?php echo $sbcDetail['Subscription']['date_end']?>
						</div>
						<div class="alert inbox last-child">		
								Login Time :						
							<?php echo $sbcDetail['Subscription']['date_end']?>
						</div>
						<div class="alert inbox last-child">					
								Last Login:						
							<?php echo $sbcDetail['Subscription']['date_end']?>
						</div>		
					</div> 
					<?php endforeach;endif;?>		
		             <hr class="style-six"></hr>
		            
		           <div class="quick-action">
					<h1 align="center">Quick Action</h1>
					
					<div class="aside-buttons">
		                
						<a href="#StockModal" role="button" class="btn btn-success" data-toggle="modal">Stocks +/-</a>
		            </div>
		            <div class="aside-buttons">
		                
						<a href="#ItemModal" role="button" class="btn btn-success" data-toggle="modal">Add Item</a>
		            </div>
					</div>
		           
					<form>
  <fieldset>
    <input id="target" type="text" value="Hello there">
  </fieldset>
</form>
<div id="other">
  Trigger the handler
</div>
				    <hr class="style-six"></hr>
				</aside>

							
							<div id="StockModal" class="modal hide fade stock-modal" style="max-width:100%;width: 70%; /* respsonsive width */
    margin-left:-35%; /* width/2) */ " tabindex="-1" role="dialog" aria-labelledby="StockModalLabel" aria-hidden="true">
								  <div class="modal-header">
								    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								    <h3 id="StockModalLabel">Add New Stock</h3>
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
								         <i>Select '+' to add new stock,select '-' to take out stock.</i>
								        </div>
								       
								  </div>
								  <div class="modal-footer">
								    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								    <?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-primary')); ?>
								     <?php echo $this->Form->end();?>
								  </div>
								</div>

								
							<div id="ItemModal" class="modal hide fade stock-modal" style="max-width:100%;width: 40%; /* respsonsive width */
							    margin-left:-15%;margin-top:-10%; /* width/2) */ " tabindex="-1" role="dialog" aria-labelledby="StockModalLabel" aria-hidden="true">
															  <div class="modal-header">
															    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															    <h3 id="StockModalLabel">Add New Item</h3>
															  </div>
															  <div class="modal-body">
							<p>Add new item to be in stock</p>
									<?php echo $this->Form->create('Item',array('controller'=>'items','action'=>'add','class'=>'form-horizontal themed'));?>
								 	<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
									<?php echo $this->Form->input('name',array('div'=>false));?>
									<?php //echo $this->Form->input('category_id',array('div'=>false));?>
									<?php echo $this->Form->input('minimum_qty',array('div'=>false));?>
									<?php echo $this->Form->input('maximum_qty',array('div'=>false));?>
									<?php echo $this->Form->input('unit_measurement_id',array('options'=>$unit,'empty' => 'Choose Unit','div'=>false));?>
								        
								  </div>
								  <div class="modal-footer">
								    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								    <?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-primary')); ?>
								    <?php echo $this->Form->end();?>
								  </div>
								</div>

<script type="text/javascript">
window.addEventListener("keydown", dealWithKeyboard, false);
window.addEventListener("keypress", dealWithKeyboard, false);
window.addEventListener("keyup", dealWithKeyboard, false);
	
	$( "#target" ).keypress(function() {
  		console.log( "Handler for .keypress() called." );
		});
	function dealWithKeyboard(e) {
    // gets called when any of the keyboard events are overheard
    console.log('Deal with keeee')
}
</script>
	

<?php endif;?>


