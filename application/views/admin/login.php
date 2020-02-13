<!DOCTYPE html>
<html lang="en">
<head>
	<title>Article List</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url("Assets/css/bootstrap.min.css")?>">
</head>
<body>

<section id="navbar">	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">admin login</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/CI/">home</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="index"></a>
      </li> 

<?php
  if($this->session->userdata('id')){
?>
   <li><a class="nav-link" href="<?= base_url('admin/logout'); ?>">Logout</a></li>
   <?php
  }
  ?>
      </li>
</ul>
    

</nav>
</section>
<section id="main">
<div class="container">
<?php echo form_open('Admin/index');?>
  <fieldset>
    <legend>Admin login</legend>
    <?php if($error=$this->session->flashdata('msg')):
      $msg_class=$this->session->flashdata('msg_class')
      ?> 
  <div class="row">
  <div class="col-lg-6">
  <div class="alert <?= $msg_class ?>">
  <?php echo $error ?>
  </div>
  </div>
  </div>
<?php  endif;?>
    <div class="row">
    	<div class="col-lg-4">
    <div class="form-group">
      <label for="exampleInputEmail1">User Name</label>
       <?php echo form_input (['class'=>'form-control','name'=>'uname','placeholder'=>'user name','value'=>set_value('uname')]); ?>
    </div>
     </div>
     <div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('uname'); ?>
     </div>
 </div>
 <div class="row">
     <div class="col-lg-4">
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
       
      <?php echo form_password(['class'=>'form-control','name'=>'password','placeholder'=>'password','value'=>set_value('password')]);  ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('password'); ?>
     </div>
</div>
    
    </fieldset>
    <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']) ?>
     
   <?php echo form_reset(['type'=>'reset','class'=>'btn btn-secondary','value'=>'reset']) ?>

   <a href="signup_user">signe up? </a>
  </fieldset>
 </div>
 </section>
<?php include('footer.php');?>
</html>