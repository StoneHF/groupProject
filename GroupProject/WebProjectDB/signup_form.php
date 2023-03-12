<?php
session_start();
include 'config/connn.php';
include 'loginNavbar/loginNavbarr.php';

?>
<html>

<head>


<style>
  body {
    font-family: Arial, sans-serif;
    color: white; 
  }
  h1 {
    text-align: center;
  }
  form {
    max-width: 500px;
    margin: 0 auto;
    text-align: left;
  }
  label {
    display: block;
    margin-bottom: 5px;
  }
  input[type="text"], input[type="password"] {
    width: 80%;
    padding: 10px 15px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  input[type="submit"] {
    width: 80%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
  input[type="email"], input[type="email"] {
    width: 80%;
    padding: 10px 15px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
</style>

<h1>Please Sign up to Continue!</h1>

<form action="process_signupform.php" method="post">
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required minlength="7" ><br>

  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required minlength="3" ><br>


  <label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname" required><br>

  <label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname" required><br>

  <label for="mobile">Mobile:</label>
<input type="text" id="mobile" name="mobile" required pattern="[0-9]*" maxlength="11"><br>



  <input type="submit" name="submit">
</form>






 </body>
</html>

<?php

?>