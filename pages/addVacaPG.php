<!DOCTYPE html>
<html>
 <head>
		<title>Add a Vacation</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/stylesheet.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<?php include("../scripts/sub-head.php"); ?>
	</head>
	<body>
		<form action="../scripts/insert-vaca-dates.php" method="post">
		<?php include("../scripts/navbar-log-sub-user.php");?>
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