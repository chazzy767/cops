<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Officer Profile</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/stylesheet.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	</head>
	<body>
		 <?php include("../scripts/navbar-log-sub-user.php");?>
		 <?php include("../scripts/connect-db.php");?>
		 <?php
			$sql = "SELECT * FROM Housecheck";
			$result = mysqli_query($conn,$sql);

			echo "<table>
			<tr>
			<th>ID</th>
			<th>Date Created</th>
			<th>Leave Date</th>
			<th>Return Date</th>
			</tr>";

			while($row = mysqli_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>" . $row['homeowner_id'] . "</td>";
			echo "<td>" . $row['date_created'] . "</td>";
			echo "<td>" . $row['leave_date'] . "</td>";
			echo "<td>" . $row['return_date'] . "</td>";
			echo "<td><button type=\"button\">Checked</button></td>";
			echo "</tr>";
			}
			echo "</table>";

			mysqli_close($conn);		 
		 ?>
		<div class="container">
			<div class="mainTXT2">
				<h1> Welcome Back Officer! </h1> <p> Thank you for keeping our residents' homes safe!</p>
				<p>Here are a list of homes that need to be checked today:</p>
				<p2> <input type="radio" id="check" name="houseCheck" value="yes"> Smith House <br>
					<input type="radio" id="check" name="houseCheck" value="yes"> Ray House<br>
					<input type="radio" id="check" name="houseCheck" value="yes"> Boucher House<br>
					<input type="radio" id="check" name="houseCheck" value="yes"> Czerny House<br>
				</p2>
				
				<button class="" onclick="location.href = '../../homePG.html';" type="button"> Submit House Check</button>
			</div>
		<link href="https://fonts.googleapis.com/css?family=Raleway" >
		<div class="OfficerNav">
			<a href="../html/history.html">Previous House Checks</a>
		</div>
		</div>
	</body>
</html>