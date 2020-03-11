<?php
 $servername = "localhost";
 $username = "cmczerny";
 $password = "RZNUq8J2wvaXxKtQ";
 $db = "cmczerny";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password,$db);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 } elseif (!mysqli_select_db($conn, 'cmczerny')){
	 //db not selected error
	 //echo "Database not selected";
 } else
 {
	 //lets user know of successful connection
	 //echo "Connected to COPS DB";
	 //echo "<br><br>";
 } 
?>