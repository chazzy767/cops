<!DOCTYPE html>
<html lang="en">
	<head>
	 <title>User</title>
		<?php include("../scripts/sub-head.php"); ?>
	</head>
	<body>
	 <?php include("../scripts/navbar-log-sub-user.php"); ?>	
		<div class="container">
			<div class="mainTXT3">
				<h1> Welcome Back, <?php echo $_SESSION["session_username"];?>! </h1>
				<p> We hope you are having an amazing vacation
				while we make sure your house is safe!</p>
				<p>Your House was most recently checked on:</p>
				<p2> Thursday, March 5th 2020 at 9:30 am </p2>
			</div>

		<div class="userNav">
			<a href="../pages/addVacaPG.php">Add Vacation Dates</a><br>
			<a href="../pages/historyPG.php">Previous House Checks</a>
		</div>
		</div>
	</body>
</html>