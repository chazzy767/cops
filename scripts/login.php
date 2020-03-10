<?php
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 //add functions php file
 include("php-functions.php");
 
 $myusername = $_POST['uname'];

 //Selects password from row w/ entered username
 $sql = "SELECT ho_pw_hash FROM Homeowner WHERE ho_username = '{$myusername}'";
 $query = mysqli_query($conn,$sql);
 $result = mysqli_fetch_assoc($query);
 
 //Extracts the actual pw string
 $fetched_pw = $result['ho_pw_hash'];
 $mypassword = crypt($_POST['psw'],$fetched_pw);
 
 //Compares passwords
  if (strcmp($mypassword,$fetched_pw)===0){
	 echo "Login successful. Redirecting...";
	 session_start();
	 $_SESSION["session_username"] = $myusername;
	 header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/pages/customerUI.php",
	 true, 303);
 } else{
	 echo "Login unsuccessful.";
 }
 
 
?>