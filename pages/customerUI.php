<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
	<head>
	 <title>User</title>
		<?php include "../scripts/head.php"; ?>
	</head>
	<body>
	 <?php include "../scripts/navbar-logo.php"; ?>
		<?php include "../scripts/connect-db.php"; ?>
  <?php include "../scripts/php-functions.php"; ?>
  <?php grantCustomer(); ?>
  <?php
   $user_id = $_SESSION['session_user_id'];
			
		 $sql = "SELECT * FROM Housecheck
											INNER JOIN Homeowner
											ON Housecheck.homeowner_id=Homeowner.homeowner_id
											WHERE Housecheck.homeowner_id='$user_id' 
											AND Housecheck.chk_value=\"yes\"
											AND Housecheck.chk_at = (select max(Housecheck.chk_at) 
											from Housecheck
											where homeowner_id = '$user_id')";

			$result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result);
   mysqli_close($conn);
   
   $most_recent_check = $row['chk_at'];
   
		 ?>	
		<div class="container">
			<div class="mainTXT3">
				<h1> Welcome Back, <?php echo $_SESSION["session_username"];?>! </h1>
				<p> We hope you are having an amazing vacation
				while we make sure your house is safe!</p>
				<p>Your House was most recently checked:</p>
				<?php echo '<p2>' . $most_recent_check . '</p2>'; ?>
			</div>
			<div class="userNav">
				<a href="../pages/addVacaPG.php">Add Vacation Dates</a><br>
				<a href="../pages/historyPGUser.php">Previous House Checks</a>
			</div>
		</div>
	</body>
</html>