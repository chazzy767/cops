<?php
 //This PHP file generates the navbar for subpages only!!! due to relative paths
 echo '<div class="container">
			<img src="../images/logo.jpg" class="logo">
			<button class="login" onclick="location.href = \'../pages/loginPG.php\';" type="button"> Login</button>
			<br>
			<button class="Signup" onclick="location.href = \'../pages/signupPG.php\';" type="button"> Sign Up</button>
		</div>	
			<ul>
			  <li><a href="../index.php">Home</a></li>
			  <li><a href="https://cityofpleasantridge.org/news/">Local News</a></li>
			  <li><a href="">Contact</a></li>
			  <li><a href="">About</a></li>
			</ul>';
?>