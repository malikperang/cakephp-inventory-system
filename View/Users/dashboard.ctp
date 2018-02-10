<?php //debug($outStock);?>
<?php echo $this->Html->addCrumb('Dashboard', '/');?>
<h1 class="page-header">Dashboard </h1>
<div class="row">
	<div class="col-lg-3 col-md-6">
	    <div class="panel panel-primary">
	        <div class="panel-heading">
	            <div class="row">
	                <div class="col-xs-3">
	                    <i class="fa fa-bar-chart fa-5x"></i>
	                </div>
	                <div class="col-xs-9 text-right">
	                    <div class="huge"><?php echo $totalStockTransaction;?></div>
	                    <div>Stock Transactions</div>
	                </div>
	            </div>
	        </div>
	        <a href="#">
	            <div class="panel-footer">
	                <span class="pull-left"><?php echo $this->Html->link('View Details',array('plugin'=>false,'controller'=>'stocks','action'=>'index'));?></span>
	                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                <div class="clearfix"></div>
	            </div>
	        </a>
	        </div>
	        </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-truck fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $newStock;?></div>
                        <div>Today New Stocks</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left"><?php echo $this->Html->link('View Details',array('plugin'=>false,'controller'=>'stocks','action'=>'index','new'));?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-exclamation-triangle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $outStock;?></div>
                        <div>Item out of stock</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                      <span class="pull-left"><?php echo $this->Html->link('View Details',array('plugin'=>false,'controller'=>'stocks','action'=>'report'));?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
     <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cubes fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $totalItem;?></div>
                        <div>Items in store</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left"><?php echo $this->Html->link('View Details',array('plugin'=>false,'controller'=>'items','action'=>'index','new'));?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-sm-4 col-lg-4 col-md-4">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">New Item</h3>
            </div>
            <div class="panel-body">
		<?php echo $this->Form->create('Item',array('url'=>array('plugin'=>false,'controller'=>'items','action'=>'add')),array('role' => 'form'));?>
	<fieldset>

	  <div class="form-group">
      <label class=" control-label">Item Code #</label>

		   	<?php echo $this->Form->input('itemCode',array('label'=>false,'div'=>false,'type'=>'text','class'=>'form-control')); ?>
		   	  <p class="help-block">
				<?php echo __('if you didn\'t fill this,the code will be auto generated.');?>
			  </p>

	  </div>

	  <div class="form-group">
      <label class=" control-label">Name</label>

			   	<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>

	  </div>

	  <div class="form-group">
      <label class=" control-label">Minimum Quantity</label>

				<?php echo $this->Form->input('minimum_qty',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>

	  </div>

	  <div class="form-group">
      <label class=" control-label">Maximum Quantity</label>

				<?php echo $this->Form->input('maximum_qty',array('label'=>false,'div'=>false,'class'=>'form-control')); ?>

	  </div>

	  <div class="form-group">
      <label class=" control-label">Unit of Measure</label>

 			<?php echo $this->Form->input('unit_measurement_id',array('div'=>false,'class'=>'form-control select_box','label'=>false,'empty'=>'Choose Unit')); ?>

      </div>
        <?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id'])); ?>


	</fieldset>
	      <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
					<?php echo $this->Form->end(); ?>
	</div>
	</div>
	</div>

    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">New stock transaction</h3>
            </div>
            <div class="panel-body">
               <?php echo $this->Form->create('Stock',array('url'=>array('plugin'=>false,'controller'=>'stocks','action'=>'add')), array('role' => 'form'));?>
            <fieldset>
              <div class="form-group">
                <label class="control-label">Choose an Item</label>
                        <?php echo $this->Form->input('item_id',array('div'=>false,'class'=>'form-control','label'=>false)); ?>

              </div>
              <div class="form-group">
                <label class="control-label">Transaction</label>
                    <?php echo $this->Form->input('stock_transaction',array('div'=>false,'label'=>false,'class'=>'form-control','type'=>'number'));?>
                     <p class="help-block">
                        <?php echo __('To remove stock, add \'-\'. E.g: -200.');?>
                     </p>
              </div>


                <?php echo $this->Form->input('created_by',array('type'=>'hidden','value'=>$userDetails['id']));?>
            </fieldset>
                    <?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
                    <?php echo $this->Form->end(); ?>
            </div>

        </div>
    </div>
	<div class="col-sm-4 col-lg-4 col-md-4">
	<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Stock by date</h3>
            </div>
            <div class="panel-body">
	<?php echo $this->Form->create('DateRange',array('url'=>array('plugin'=>false,'controller'=>'stocks','action'=>'select_by_date')),array('role' => 'form'));?>
     <fieldset>
		<div class="input-daterange input-group" id="datepicker">
			<?php echo $this->Form->input('date_start',array('type'=>'text','class'=>'input-sm form-control col-sm-2','div'=>false,'label'=>false,'placeholder'=>'Start date'));?>
		    <span class="input-group-addon">to</span>
		    <?php echo $this->Form->input('date_end',array('type'=>'text','class'=>'input-sm form-control','div'=>false,'label'=>false,'placeholder'=>'End date'));?>
		</div>
		<br />
		<?php echo $this->Form->button(__('Submit'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
		<?php echo $this->Form->end(); ?>
     </fieldset>


	</div>
    </div>
    </div>
    <div class="col-sm-4 col-lg-4 col-md-4">
	<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">New Unit Measurement</h3>
        </div>
        <div class="panel-body">
             <?php echo $this->Form->create('UnitMeasurement', array('url'=>array('plugin'=>false,'controller'=>'unitmeasurements','action'=>'add')),array('role' => 'form'));?>
          <?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userDetails['id']));?>
          <div class="form-group">
              <label class="control-label">Unit Name</label>
            <?php echo $this->Form->input('name',array('div'=>false,
                'after'=>$this->Form->error('name', array(), array( 'class' => 'help-inline')),
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false,
                'class'=>'form-control'));?>
                <p class="help-block">
                    <?php echo __('e.g: <i>"Kilogram"</i>');?>
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
                    <?php echo __('Key as short of unit. e.g: <i>"KG" for "Kilogram"</i>');?>
                </p>

                </div>
    </fieldset>
        <?php echo $this->Form->button(__('Save'),array('type'=>'submit','class'=>'btn btn-default center-block')); ?>
        <?php echo $this->Form->end();?>


	</div>
    </div>
