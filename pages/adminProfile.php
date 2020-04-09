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
					<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
					<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
					<script src="https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.js"></script>
					<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/place-search-js/v1.0.0/place-search.css"/>

					<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
					<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

					<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
					<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
					<script type="text/javascript">
      window.onload = function() {
        L.mapquest.key = 'XxcIZeWfqd8Q7LpWz1YivoaSI1r88P5m';

        var map = L.mapquest.map('map', {
          center: [37.7749, -122.4194],
          layers: L.mapquest.tileLayer('map'),
          zoom: 13,
          zoomControl: false
        });

        L.control.zoom({
          position: 'topright'
        }).addTo(map);

        L.mapquest.directionsControl({
          routeSummary: {
            enabled: false
          },
          narrativeControl: {
            enabled: true,
            compactResults: false
          }
        }).addTo(map);
      }
					</script>
    </div>
  </div>
 </body>
</html>