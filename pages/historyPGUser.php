<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<title>History of House Checks for User</title>
		<?php include "../scripts/head.php"; ?>
	</head>
	<body>
	 <?php include "../scripts/navbar-logo.php";?>
		<?php include "../scripts/php-functions.php"; ?>
  <?php grantCustomer(); ?>		
		<form action="login.php" method="post">
		<br>
			<div class="container">
				<div class="hisTXT">
				 <p9> House Check History </p9> 
				</div>
			</div>
		</form>
	</body>
</html>