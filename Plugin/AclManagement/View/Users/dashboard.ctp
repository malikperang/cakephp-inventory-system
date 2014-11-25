
<?php if($userDetails['group_id'] == 1):?>
<?php debug($sysetting);?>
<?php endif;?>

<?php if($userDetails['group_id'] == 2):?>

<strong><?php echo $this->Session->flash();?></strong>
					
					
					<div class="fluid-container">
						<div id="start">
							<ul>
								<li>
								<label><?php echo $lowStock;?></label>
									<a href="../stocks/index" title="">
										<?php echo $this->Html->image('start-icons/inventory_2.png');?>
										<?php //echo $this->Html->image('start-icons/add-user.png');?>
										<span>Items to restock</span>
									</a>
								</li>
								<li>
									<label><?php echo $item_count;?> </label>
									<a href="../items/index" title="">
									
										<?php echo $this->Html->image('start-icons/Inventory.png');?>
										<span>Items in store</span>
									</a>
								</li>
								<li>
									<a href="javascript:void(0)" title="">
										<label>246 </label>
										<?php echo $this->Html->image('start-icons/UserGroup.png');?>
										<span>Users</span>
									</a>
								</li>
								
							</ul>

						</div>
						<div class="row-fluid">						
						<div class="span12" >
							<div class="jarviswidget " id="widget-id-7">
									    <header>
									        <h2>Stock Alert</h2>                           
									    </header>
									    <div>
							<table class="table table-bordered">
									<tr>
										<th>ID</th>
										<th>Added By</th>
										<th>Item</th>
										<th>In</th>
										<th>Out</th>
										<th>Balance</th>
										<th>Status</th>
										<th>Created</th>
									</tr>
									<?php foreach ($alertLowStock as $alertlowstock):?>
									<tr >
										<td><?php echo h($alertlowstock['Stock']['id']); ?>&nbsp;</td>
										<td><?php echo $this->Html->link($alertlowstock['User']['name'], array('controller' => 'users', 'action' => 'view', $alertlowstock['User']['id'])); ?>
										</td>
										<td>
											
											<?php echo $this->Html->link($alertlowstock['Item']['name'], array('controller' => 'items', 'action' => 'view', $alertlowstock['Item']['id'])); ?>
										</td>
										<td><?php echo h($alertlowstock['Stock']['stock_in']); ?>&nbsp;</td>
										<td><?php echo h($alertlowstock['Stock']['stock_out']); ?>&nbsp;</td>
										<td><?php echo h($alertlowstock['Stock']['stock_balance']); ?>&nbsp;</td>
										<td><?php echo h($alertlowstock['Stock']['stock_status']); ?>&nbsp;</td>
										<td><?php echo h($alertlowstock['Stock']['created']); ?>&nbsp;</td>
									</tr>

								<?php endforeach; ?>
							</table>
							
						</div>

					</div>
					<div class="pagination">
							<ul>
								<li>
								<?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));?>
								</li>
								<li>
								<?php echo $this->Paginator->numbers(array('separator' => ''));?>
								</li>
								<li>
								<?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
								?>
								</li>
							</ul>
						</div>
				</div>
				<?php echo $this->element('menu/quick_action_no_delete');?>

<?php endif;?>

<?php if($userDetails['group_id'] == 3):?>

<?php endif;?>