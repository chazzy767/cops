<?php
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 //add functions php file
 include("php-functions.php");
 
 $myusername = $_POST['uname'];

 //Selects password and user type from row w/ entered username
 $sql = "SELECT ho_pw_hash, user_type, homeowner_id FROM Homeowner WHERE ho_username = '{$myusername}'";
 $query = mysqli_query($conn,$sql);
 $result = mysqli_fetch_assoc($query);
 
 //Extracts the actual pw string
 $fetched_pw = $result['ho_pw_hash'];
 $mypassword = crypt($_POST['psw'],$fetched_pw);
 $user_type = $result['user_type'];
	$user_id = $result['homeowner_id'];
 
 echo 'User Type: '.$user_type.'<br>';
 //Compares passwords
  if (strcmp($mypassword,$fetched_pw)===0){
	 echo "Login successful. Redirecting...";
		//start storing user's info for session
	 session_start();
	 $_SESSION["session_username"] = $myusername;
	 $_SESSION["user_type"] = $user_type;
		$_SESSION["session_user_id"] = $user_id;
	 if ($user_type == "standard"){
		 header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/pages/customerUI.php",
	     true, 303);
	 } elseif ($user_type == "admin"){
		 header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/pages/adminProfile.php",
	     true, 303);
	 } else {
		 header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/",
	     true, 303);
	 }
 } else{
	 echo "Login unsuccessful.";
 }
 
 
?>