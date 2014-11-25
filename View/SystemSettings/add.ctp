<?php debug($sysetting);?>
<h1 id="page-header">General Setting</h1>	
					
					<div class="fluid-container">
						<section id="widget-grid" class="">
							<div class="row-fluid">
								<article class="span12">
									<div class="jarviswidget" id="widget-id-0"  data-widget-deletebutton="false">
									    <header>
									        <h2>Update your store setting</h2>                           
									    </header>
									    <div>
									        <div class="inner-spacer"> 
									       
											
						<?php echo $this->Form->create('Setting',array('type'=>'file','class'=>'form-horizontal')); ?>

							<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
								<div class="control-group">
											<label class="control-label">Company Name</label>
											<div class="controls">
							<?php echo $this->Form->input('company_name',array('label'=>false,'div'=>false));?>
							</div>
							</div>
<!--<div class="control-group">
											<label class="control-label">Banner</label>
													<div class="controls">
	<?php echo $this->Form->input('banner',array('type'=>'file','label'=>false,'div'=>false,'options'=>array(
	'accept'=>'image/gif,image/jpeg,image/png'))); ?>
		</div>
		</div>-->
		<div class="control-group">
													<label class="control-label">Logo</label>
													<div class="controls">
	<?php echo $this->Form->input('logo',array('type'=>'file','label'=>false,'div'=>false,'options'=>array(
	'accept'=>'image/gif,image/jpeg,image/png'))); ?>
	<br /><br /><br />
	<p><i>Current Logo</i></p>
	<?php echo $this->Html->image('default_company_logo.gif',array('class'=>'setting-logo'));?>
					</div>
					</div>
							<div class="form-actions">
									<?php echo $this->Form->button('Cancel', array('type' => 'reset','class'=>'btn btn-danger'));?>
										<?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-primary')); ?>
									</div>
								</div>
							</div>
							</div>	
				<aside class="right">
					 <?php echo $this->element('menu/quick_action');?>
				</aside>
			</article>
		</div>

</section>