<!DOCTYPE html>
<html lang="en">
<head>
	<title>Article List</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url("Assets/css/bootstrap.min.css")?>">
</head>
<body>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/CI/admin">Admin panel</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/CI/">Homes</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="index">Login</a>
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
</html>