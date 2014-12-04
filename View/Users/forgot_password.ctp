<div class="row" >
<div class="col-lg-6 col-lg-offset-3" style="margin-top:5%">
  <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-key"></i> Forgot Password</h3>
        </div>
        <div class="panel-body">
                <?php echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-horizontal','role'=>'form'));?>
    <fieldset>
    <div class="input-group" style="margin-bottom: 25px">
    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <?php echo $this->Form->input('email', array('div'=>false,
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control','placeholder'=>'email'));?>
    </div>
    <div class="form-actions">
        <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
        <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
    </div>

</fieldset>
<?php
echo $this->Form->end();
?>

</div>
</div>
