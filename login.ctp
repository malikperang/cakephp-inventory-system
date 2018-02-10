
<div class="row" >
<div class="col-lg-12" style="margin-top:5%">
 <div class="jumbotron">
        <div class="container">
<div class="row">
<div class="col-lg-8">
        <h1>Inventory Management System</h1>
        <p>Easy inventory management system powered by CakePHP.</p>
       
      </div>

<div class="col-lg-4 pull-right">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-key"></i> Login</h3>
        </div>
        <div class="panel-body">
                <?php echo $this->Form->create('User', array('url' => 'login', 'class'=>'form-horizontal','role'=>'form'));?>
    <fieldset>
    <div class="input-group" style="margin-bottom: 25px">
    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <?php echo $this->Form->input('email', array('div'=>false,
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control','placeholder'=>'email'));?>
    </div>

    <div class="input-group" style="margin-bottom: 25px">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <?php echo $this->Form->input('password', array('div'=>false,
            'error' => array('attributes' => array('style' => 'display:none')),
            'label'=>false, 'class'=>'form-control','placeholder'=>'password'));?>
    </div>

    <div class="form-actions">
        <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
        <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
    </div>

</fieldset>
<?php
echo $this->Form->end();
?>

    <div class="text-right">
       <a href="<?php echo $this->Html->url('/users/forgot_password');?>">Forgot Password?<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
</div>
</div>
</div>
