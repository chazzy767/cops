<?php
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 //add functions php file
 include("php-functions.php");
 
 $myusername = $_POST['uname'];
 $mypassword = $_POST['psw'];
 echo "Unencrypted pw: ".$mypassword."<br>";
 
 //Selects password from row w/ entered username
 $sql = "SELECT ho_pw_hash FROM Homeowner WHERE ho_username = '{$myusername}'";
 $query = mysqli_query($conn,$sql);
 $result = mysqli_fetch_assoc($query);
 
 //Extracts the actual pw string
 $fetched_pw = $result['ho_pw_hash'];
 
 //Displays pw from query
 echo "Fetched pw: ".$fetched_pw."<br>";
 
 //Encrypts entered pw to compare
 $mypassword = crypt($mypassword,$fetched_pw);
 
 echo "<br>";
 echo "Encryped entered pw: ".$mypassword."<br>";
 
 //Compares passwords
 checkPWs();
 
?>