<?php include('header.php'); ?>
<div class="container">
<?php echo form_open('Admin/signup_user');?>
  <fieldset>
    <legend>User Registration</legend>

    <?php if($user=$this->session->flashdata('user')):
      $user_class=$this->session->flashdata('user_class');
      ?> 
  <div class="row">
  <div class="col-lg-6">
  <div class="alert <?= $user_class ?>">
  <?php echo $user; ?>
  </div>
  </div>
  </div>
<?php  endif;?>

    <div class="row">
    	<div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputEmail1">User Name</label>
       <?php echo form_input (['class'=>'form-control','name'=>'username','placeholder'=>'user name','value'=>set_value('username')]); ?>
    </div>
     </div>
     <div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('username'); ?>
     </div>
 </div>
 <div class="row">
     <div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
       
      <?php echo form_password(['class'=>'form-control','name'=>'password','placeholder'=>'password','value'=>set_value('password')]);  ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('password'); ?>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputPassword1">First name</label>
       
      <?php echo form_input(['class'=>'form-control','name'=>'firstname','placeholder'=>'first name','value'=>set_value('firstname')]);  ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('firstname'); ?>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputPassword1">Last name</label>
       
      <?php echo form_input(['class'=>'form-control','name'=>'lastname','placeholder'=>'last name','value'=>set_value('lastname')]);  ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('lastname'); ?>
     </div>
</div>
<div class="row">
     <div class="col-lg-6">
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
       
      <?php echo form_input(['class'=>'form-control','name'=>'email','placeholder'=>'email address','value'=>set_value('email')]);  ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('email'); ?>
     </div>
</div>
    </fieldset>
    <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']) ?>
     
   <?php echo form_reset(['type'=>'reset','class'=>'btn btn-secondary','value'=>'reset']) ?>
  </fieldset>
 </div>
<?php include('footer.php');?>