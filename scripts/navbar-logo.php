<?php
//This PHP file generates the navbar for the index page only!!! due to relative paths
 echo ' <ul>
		  <li><a href="index.php">Home</a></li>
		  <li><a href="">News</a></li>
		  <li><a href="../pages/contactPG.php">Contact</a></li>
		  <li><a href="../pages/about.php">About</a></li>
		</ul>
		<div class="container">
	
			<img src="images/logo.jpg" class="logo">
			<button class="login" onclick="location.href = \'pages/loginPG.php\';" type="button"> User Login</button>
			<br>
			<button class="Signup" onclick="location.href = \'pages/signupPG.php\';" type="button"> Sign Up</button>
			<br>
			
		</div>	
			';
?>