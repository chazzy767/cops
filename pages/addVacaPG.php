<!DOCTYPE html>
<?php session_start(); ?>
<html>
 <head>
		<title>Add a Vacation</title>
		<?php include "../scripts/head.php"; ?>
	</head>
	<body>
	 <?php include "../scripts/navbar-logo.php";?>
		<?php include "../scripts/php-functions.php"; ?>
  <?php grantCustomer(); ?>	
		<form action="../scripts/insert-vaca-dates.php" method="post">
		<br>
			<div class="container">
				<div class="add">
					<div class="tab">Date of Residence's Absence
						<p><input id="inputLDate" placeholder="Leave Date (YYYY-MM-DD)" name="leaveDate"></p>
						<p><input id="inputLTime" placeholder="Leave Time (HH:MM:SS)" name="leaveTime"></p>
						<p><input id="inputRDate" placeholder="Return Date (YYYY-MM-DD)" name="returnDate"></p>
						<p><input id="inputRTime" placeholder="Return Time (HH:MM:SS)" name="returnTime"></p>
					</div>
				 <button type="submit" id="subBtn">Submit</button>
				</div>
			</div>
		</form>
	</body>
</html>