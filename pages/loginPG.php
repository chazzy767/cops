<!DOCTYPE html>
<?php session_start(); ?>
<html>
 <head>
  <title>Login</title>
  <?php include "../scripts/head.php";?>
 </head>
 <body>
 <form action="../scripts/login.php" method="post">
 <?php include "../scripts/navbar-logo.php";?>
 <br>
  <div class="container">
 <div class="back">
  <input class="username" type="text" placeholder="Username" name="uname" required>
  <br>
  <input class="password" type="password" placeholder="Password" name="psw" required>
  <br>
  <button class= "login1" type="submit" >Login</button>
  <br>
  <label class="remember" >
    <input class="remember" type="checkbox" checked="checked" name="remember"> Remember me
  </label>
  <div class="psw">Forgot <a href="#">password?</a></div>
    </div>
 </div>
 </form>
 </body>
</html>