<h1 class="page-header">Unit Measurement</h1>
 
<div class="row">
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">
	<fieldset>
		  <?php echo $this->Form->create('UnitMeasurement', array('role' => 'form'));?>
	      <?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
  		  <div class="form-group">
	          <label class="control-label">Unit Name</label>	
			<?php echo $this->Form->input('name',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array( 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'form-control'));?>
                <p class="help-block">
					<?php echo __('Insert your choosen unit measurement. e.g: <i>"Kilogram"</i>');?>										
				</p>
                </div>
		   <div class="form-group">
	          <label class="control-label">Unit Key</label>	
			<?php echo $this->Form->input('key',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array('class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'form-control'));
			?>
   			<p class="help-block">
					<?php echo __('Key as short of your unit. e.g: <i>"KG" for "Kilogram"</i>');?>										
				</p>
			
				</div>
	</fieldset>									
		<?php echo $this->Form->button(__('Save'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
		<?php echo $this->Form->end();?>
	

</div>
</div>
</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-body">
	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="unit-m-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Unit Name</th>			
				<th>Key</th>
				<th>Created at</th>
				<th>Action</th>
			</tr>
		</thead>
		 <tfoot>
		 	<tr>
		 		<td colspan="9"><input type="checkbox" id="selectall"/> <?php echo $this->Form->button('Delete',array('type'=>'submit','class'=>'btn btn-primary'));?></td>
		 	</tr>
          
        </tfoot>
		<tbody>
			
	
			<?php foreach ($unitMeasurements as $unit): ?>

			<tr>
				<td><?php echo $this->Form->checkbox('Stock.' . $unit['UnitMeasurement']['id'],array('class'=>'checkbox1','value'=>$unit['UnitMeasurement']['id'],'name'=>'data[UnitMeasurement][id][]','hiddenField' => false));?></td>
				<td><?php echo h($unit['UnitMeasurement']['name']);?></td>
				<td><?php echo h($unit['UnitMeasurement']['key']); ?>&nbsp;</td>
				<td><?php echo date('d/m/Y H:i:s',strtotime(h($unit['UnitMeasurement']['created']))); ?>&nbsp;</td>
				<td class="text-center">
					<div class="btn-group">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $unit['UnitMeasurement']['id']),array('class'=>'btn btn-primary','escape'=>false)); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $unit['UnitMeasurement']['id']),array('class'=>'btn btn-primary','escape'=>false)); ?>
						</div></td>
			</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
	

</div>
</div>
</div>
