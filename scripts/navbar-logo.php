<?php
 session_start();
 //This PHP file generates the navbar for the index page only!!! due to relative paths
 echo '<ul>
							<li><a href="http://www.secs.oakland.edu/~cmczerny/cops/index.php">Home</a></li>
							<li><a href="https://cityofpleasantridge.org/news/">
							Local News</a></li>
							<li><a href="http://www.secs.oakland.edu/~cmczerny/cops/pages/contactPG.php">Contact</a></li>
							<li><a href="http://www.secs.oakland.edu/~cmczerny/cops/pages/about.php">About</a></li>
							</ul>
							<div class="container">
							<img src="http://www.secs.oakland.edu/~cmczerny/cops/images/logo.jpg" class="logo">';
	 if($_SESSION['logged_in']==false)
    {
    echo '<button class="login" onclick=location.href="http://www.secs.oakland.edu/~cmczerny/cops/pages/loginPG.php"; type="button"> User Login</button>
										<br>
										<button class="Signup" onclick=location.href="http://www.secs.oakland.edu/~cmczerny/cops/pages/signupPG.php"; type="button"> Sign Up</button>
										<br>';
			 }else {
					echo '<button class="logoff" onclick=location.href="http://www.secs.oakland.edu/~cmczerny/cops/scripts/logoff.php"; type="button"> Log Off</button>
											<br>';
				}
		echo '</div>';	
?>