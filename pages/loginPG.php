<!DOCTYPE html>
<html>
	<head>
		<?php include("../scripts/sub-head.php"); ?>
	</head>
	<body>
	<form action="login.php" method="post">
	<?php include("../scripts/navbar-log-sub-login.php");?>
	<br>
  <div class="container">
 <div class="back">
    <input class="username" type="text" placeholder="Username" name="uname" required>
	<br>
    <input class="password" type="password" placeholder="Password" name="psw" required>
	<br>
    <button class= "login1" type="button" onclick="location.href = '../html/customerUI.html';" >Login</button>
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