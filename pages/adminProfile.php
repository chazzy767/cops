<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
	<head>
		<title>Admin Profile</title>
		<?php include "../scripts/head.php"; ?>
	</head>
	<body>
	  <!--adds nav bar and connects to db -->
		 <?php include "../scripts/navbar-logo.php"; ?>
		 <?php include "../scripts/connect-db.php"; ?>
		 <?php session_start(); ?>
		 <?php include "../scripts/php-functions.php"; ?>
		 <?php grantAdmin(); ?>
		<div class="container">
			<div class="mainTXT2">
				<h1> Welcome Back Admin! </h1> <p> Thank you for keeping your residents' homes safe!</p>
				<p>Here are a list of homes that need to be checked today:</p>
					<?php
						//This creates the table of unchecked housechecks
						$sql = "SELECT * FROM Housecheck
														INNER JOIN Homeowner
														ON Housecheck.homeowner_id=Homeowner.homeowner_id
														WHERE Housecheck.chk_value=\"no\"";
						$result = mysqli_query($conn,$sql);
						
						//HOUSECHECK TABLE BEGINS
						echo "<form method=\"post\" action=\"../scripts/update-checks.php\">";
						echo "<table>
						<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Address</th>";
						//<th>Date Created</th>
						echo 
						"<th>Leave Date</th>
						<th>Return Date</th>
						<th>Checked</th>
						</tr>";
						//loop to fill table with all results of query
						while($row = mysqli_fetch_array($result))
						{
						echo "<tr>";
						echo "<td>" . $row['ho_fname'] . "</td>";
						echo "<td>" . $row['ho_lname'] . "</td>";
						echo "<td>" . $row['ho_address'] . "</td>";
						//echo "<td>" . $row['date_created'] . "</td>";
						echo "<td>" . $row['leave_date'] . "</td>";
						echo "<td>" . $row['return_date'] . "</td>";
						//checkboxes for row
						//also creates array to store checkbox data in
						echo "<td><input type=\"checkbox\" name=\"checkboxvar[]\" value=\"" . $row['check_id'] . "\"></td>";
						echo "</tr>";
						}
						echo "</table>";
						//END OF HOUSECHECK TABLE
						echo '<input type="submit" value="Submit Checks">';
						echo "</form>";
						mysqli_close($conn);		 
				  ?>
			</div>
		<link href="https://fonts.googleapis.com/css?family=Raleway" >
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