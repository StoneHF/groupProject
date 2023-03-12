<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'config/connn.php';
include 'loginNavbar/loginNavbarr.php';
?>


<head>
  <style>
    /* Add any styling for the page here */
  </style>
</head>


<html>

  <body>
   <!-- <h1> Please Login </h1>

  <form action="process_loginn.php" method="post"> 
  Email: <input type="text" name="email"><br>
  <br>
  Password: <input type="password" name="password"><br> 
  <input type ="submit" name="submit">
  </form>
-->

  <div class="container vh-100">
	<div class="row justify-content-center h-100">
		<div class="card w-50 my-auto shadow ">
			<div class="card-header text-center">
				Sign in Here
			</div>
	<div class="card-body">
		<form action="process_loginform.php" method="post">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" class="form-control" name="email" />
			</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" class="form-control" name="password" />
		</div>
			<input type="submit" class="btn btn-primary w-100" value="Login" name="Login">
		</form>
		<div class="card-footer text-right">
			<small>&copy;</small>
		</div>
	</div>
		</div>
	</div>
</div>




 </body>
</html>
