<?php
//This PHP file generates the navbar for the index page only!!! due to relative paths
 echo ' <ul>
		  <li><a href="index.php">Home</a></li>
		  <li onclick="location.href='https://cityofpleasantridge.org/news/';"> Local News </li>
		  <li><a href="">Contact</a></li>
		  <li><a href="">About</a></li>
		</ul>
		<div class="container">
	
			<img src="images/logo.jpg" class="logo">
			<button class="login" onclick="location.href = \'pages/loginPG.php\';" type="button"> User Login</button>
			<br>
			<button class="Signup" onclick="location.href = \'pages/signupPG.php\';" type="button"> Sign Up</button>
			<br>
			';
?>