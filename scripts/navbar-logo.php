<?php
//This PHP file generates the navbar for the index page only!!! due to relative paths
 echo ' <ul>
		  <li><a href="index.php">Home</a></li>
		  <li><a href="">Local News</a></li>
		  <li><a href="">Contact</a></li>
		  <li><a href="">About</a></li>
		</ul>
		<div class="container">
	
			<img src="images/logo.jpg" class="logo">
			<button class="login" onclick="location.href = \'pages/loginPG.php\';" type="button"> User Login</button>
			<br>
			<button class="Signup" onclick="location.href = \'pages/signupPG.php\';" type="button"> Sign Up</button>
			<br>
<<<<<<< HEAD
			<button class="Admin" onclick="location.href = \'pages/adminUI.php\';" type="button"> Admin Login</button>
=======
			<button class="admin" onclick="location.href = \'assetes/html/adminUI.php\';" type="button"> Admin Login</button>
>>>>>>> 1c2b1948b0a6499abfa609c4d6caa6941b2fb8a4
		</div>	
			';
?>