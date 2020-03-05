<!DOCTYPE html>
<html>
	<head>
		<?php include("../scripts/sub-head.php"); ?>
	</head>
	<body>
	<form action="login.php" method="post">
	<?php include("../scripts/navbar-log-sub.php");?>
	<br>
  <div class="container">
    <label for="uname" style="text-align:center;"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
	<br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
	<br>
    <button type="button" onclick="location.href = '../html/customerUI.html';" >Login</button>
	<br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" >
 
    <div class="psw">Forgot <a href="#">password?</a></div>
  </div>
	</form>
	</body>
</html>