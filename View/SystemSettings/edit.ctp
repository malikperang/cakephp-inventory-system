<h1 id="page-header">General Setting</h1>	
					
					<div class="fluid-container">
						<section id="widget-grid" class="">
							<div class="row-fluid">
								<article class="span12">
									<div class="jarviswidget" id="widget-id-0"  data-widget-deletebutton="false">
									    <header>
									        <h2><?php echo __('Update your store setting');?></h2>                           
									    </header>
									    <div>         
									        <div class="inner-spacer"> 


									<div class="settings form">
									<?php echo $this->Form->create('Setting'); ?>
										<fieldset>
											<legend><?php echo __('Edit Setting'); ?></legend>
										<?php
											echo $this->Form->input('id');
											echo $this->Form->input('user_id');
											echo $this->Form->input('banner');
											echo $this->Form->input('logo');
											echo $this->Form->input('company_name');
										?>
										</fieldset>
									<?php echo $this->Form->end(__('Submit')); ?>
									</div>