<div class="fluid-container">
						<section id="widget-grid" class="">
							<div class="row-fluid">
								<article class="span12">
									<div class="jarviswidget" id="widget-id-0" data-widget-deletebutton="false">
									    <header>
									        <h2>Select Your Date</h2>                           
									    </header>
									    <div>	    
									        <div class="jarviswidget-editbox">
									            <div>
									                <label>Styles:</label>
									                <span data-widget-setstyle="purple" class="purple-btn"></span>
									                <span data-widget-setstyle="navyblue" class="navyblue-btn"></span>
									                <span data-widget-setstyle="green" class="green-btn"></span>
									                <span data-widget-setstyle="yellow" class="yellow-btn"></span>
									                <span data-widget-setstyle="orange" class="orange-btn"></span>
									                <span data-widget-setstyle="pink" class="pink-btn"></span>
									                <span data-widget-setstyle="red" class="red-btn"></span>
									                <span data-widget-setstyle="darkgrey" class="darkgrey-btn"></span>
									                <span data-widget-setstyle="black" class="black-btn"></span>
									            </div>
									        </div>
									        <div class="inner-spacer">
									        	<div class="form-horizontal">
													<?php echo $this->Form->create('Stock',array('class'=>'form-horizontal '));?>
													<fieldset>
												<div class="control-group">
													<label class="control-label">Date Start</label>
													<div class="controls">
														<div class="input-append date" id="datepicker-js" data-date-format="dd-mm-yyyy">
													<?php echo $this->Form->input('date_start',array('class'=>'datepicker-input','div'=>false,'label'=>false));?>
													<span class="add-on"><i class="cus-calendar-2"></i></span>
													</div>
												</div>
											</div>
											<div class="control-group">
													<label class="control-label">Date End</label>
													<div class="controls">
														<div class="input-append date" id="datepicker-js" data-date-format="dd-mm-yyyy">
													<?php echo $this->Form->input('date_end',array('class'=>'datepicker-input','div'=>false,'label'=>false));?>
													<span class="add-on"><i class="cus-calendar-2"></i></span>
													</div>
												</div>
											</div>
													<div class="form-actions">
												
													<?php echo $this->Form->button('Send',array('type'=>'submit','class'=>'btn btn-primary')); ?>
														<?php echo $this->Form->end();?>
												</div>
												</fieldset>
												
										    </div>
								</article>
							</section>
						<section id="widget-grid" class="">
							<div class="row-fluid">
								<article class="span12">
									<div class="jarviswidget" id="widget-id-0">
									    <header>
									        <h2>Stock Transaction History</h2>                           
									    </header>
									    <div>
									    
									        <div class="jarviswidget-editbox">
									            <div>
									                <label>Title:</label>
									                <input type="text" />
									            </div>
									            <div>
									                <label>Styles:</label>
									                <span data-widget-setstyle="purple" class="purple-btn"></span>
									                <span data-widget-setstyle="navyblue" class="navyblue-btn"></span>
									                <span data-widget-setstyle="green" class="green-btn"></span>
									                <span data-widget-setstyle="yellow" class="yellow-btn"></span>
									                <span data-widget-setstyle="orange" class="orange-btn"></span>
									                <span data-widget-setstyle="pink" class="pink-btn"></span>
									                <span data-widget-setstyle="red" class="red-btn"></span>
									                <span data-widget-setstyle="darkgrey" class="darkgrey-btn"></span>
									                <span data-widget-setstyle="black" class="black-btn"></span>
									            </div>
									        </div>
            
									        <div class="inner-spacer"> 
									        <!-- content goes here -->
												<!--<div class="widget alert alert-info adjusted">
													<button class="close" data-dismiss="alert">×</button>
													<i class="cus-exclamation"></i>
													<strong>Cool export features:</strong> This dynamtic table can also export <strong>PDF</strong> and <strong>Excel</strong> files, feel free to click on the PDF or Excel button to see the result
												</div>-->
												<table class="table table-striped table-bordered responsive" id="dtable">
													<thead>
														<tr>
																<th></th>
																<th>ID</th>
																<th>Added By</th>
																<th>Item</th>
																<th>In</th>
																<th>Out</th>
																<th>Balance</th>
																
																<th>Status</th>
																<th>Created</th>
																<th>Action</th>
													</tr>
													</thead>
													<tbody>
					<?php if(isset($stocks) && is_array($stocks)):?>
						<?php foreach ($stocks as $stock): ?>
						<tr>
							<th class="form-group">
							
								<?php echo $this->Form->checkbox('Stock.' . $stock['Stock']['id'],array('value'=>$stock['Stock']['id'],'name'=>'data[Stock][id][]','hiddenField' => false));?>
								 <?php echo $this->Form->end();?>
						
						</th>
							<td><?php echo h($stock['Stock']['id']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($stock['User']['name'], array('controller' => 'users', 'action' => 'view', $stock['User']['id'])); ?>
							</td>
							<td>
								<?php// echo $stock['Item']['name'];?>
								<?php echo $this->Html->link($stock['Item']['name'], array('controller' => 'items', 'action' => 'view', $stock['Item']['id'])); ?>
							</td>
							<td><?php echo h($stock['Stock']['stock_in']); ?>&nbsp;</td>
							<td><?php echo h($stock['Stock']['stock_out']); ?>&nbsp;</td>
							<td><?php echo h($stock['Stock']['stock_balance']); ?>&nbsp;</td>
							
							<td><?php echo h($stock['Stock']['stock_status']); ?>&nbsp;</td>
							<td><?php echo h($stock['Stock']['created']); ?>&nbsp;</td>

							<td>
									<div class="btn-group">
									<?php echo $this->Html->link(__('<i class="icon-eye-open"></i> '), array('action' => 'view', $stock['Stock']['id']),array('escape'=>false,'type'=>false,'class'=>'btn')); ?>
									<?php echo $this->Html->link(__('<i class="icon-edit"></i>'), array('action' => 'edit', $stock['Stock']['id']),array('escape'=>false,'class'=>'btn')); ?>
									<?php echo $this->Form->postLink(__('<i class="icon-trash"></i>'), array('action' => 'delete', $stock['Stock']['id']), array('escape'=>false,'class'=>'btn'),null, __('Are you sure you want to delete # %s?', $stock['Stock']['id'])); ?>
									</div>
							</td>
								</tr>
							<?php endforeach; ?>
							<?php endif;?>
													</tbody>
												</table>
												 </div>
										    
									    </div>
									  
									</div>
									
								</article>
							</div>
							<aside class="right">
					 <?php echo $this->element('menu/quick_action');?>
					
		          
				</aside>
							</section>
