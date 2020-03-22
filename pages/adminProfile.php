<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Officer Profile</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/stylesheet.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php include("../scripts/sub-head.php"); ?>
	</head>
	<body>
		 <?php include("../scripts/navbar-logo.php");?>
		 <?php include("../scripts/connect-db.php");?>
		 
		<div class="container">
			<div class="mainTXT2">
				<h1> Welcome Back Officer! </h1> <p> Thank you for keeping our residents' homes safe!</p>
				<p>Here are a list of homes that need to be checked today:</p>
					<?php
						//This creates the table of unchecked housechecks
						$sql = "SELECT * FROM Housecheck
														INNER JOIN Homeowner
														ON Housecheck.homeowner_id=Homeowner.homeowner_id
														WHERE Housecheck.chk_value=\"no\"";
						$result = mysqli_query($conn,$sql);

						echo "<table>
						<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Address</th>
						<th>Date Created</th>
						<th>Leave Date</th>
						<th>Return Date</th>
						</tr>";

						while($row = mysqli_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>" . $row['ho_fname'] . "</td>";
						echo "<td>" . $row['ho_lname'] . "</td>";
						echo "<td>" . $row['ho_address'] . "</td>";
						echo "<td>" . $row['date_created'] . "</td>";
						echo "<td>" . $row['leave_date'] . "</td>";
						echo "<td>" . $row['return_date'] . "</td>";
						echo "<td><button type=\"button\">Checked</button></td>";
						echo "</tr>";
						}
						echo "</table>";

						mysqli_close($conn);		 
				   ?>
			</div>
		<link href="https://fonts.googleapis.com/css?family=Raleway" >
		<div class="OfficerNav">
			<a href="../pages/historyPG.php">Previous House Checks</a>
		</div>
		 <!-- Google Maps Div -->
		 <div id="map">
			</div>
				<script>
				 //Function to generate Google Map
					function initMap() {
					// The location of Uluru
					var uluru = {lat: -25.344, lng: 131.036};
					// The map, centered at Uluru
					var map = new google.maps.Map(
					document.getElementById('map'), {zoom: 4, center: uluru});
					// The marker, positioned at Uluru
					var marker = new google.maps.Marker({position: uluru, map: map});
					}
					initMap();
				</script>
				<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzcm8v9SjlvxqJqnoQPOdS5zTYWp7MpMw&callback=initMap">
				</script>
		</div>
	</body>
</html>