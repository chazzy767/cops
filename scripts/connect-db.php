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
 }
 //lets user know of successful connection
 echo "Success!";
?>