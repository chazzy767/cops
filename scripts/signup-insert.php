<?php
 session_start();
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 //add functions php file
 include("php-functions.php");
 
 //link php variables to form variables
 $ho_fname = mysqli_real_escape_string($conn, $_POST['fname']);
 $ho_lname = mysqli_real_escape_string($conn, $_POST['lname']);
 $ho_address = mysqli_real_escape_string($conn, $_POST['adress']);
 $ho_email = mysqli_real_escape_string($conn, $_POST['email']);
 $ho_username = mysqli_real_escape_string($conn, $_POST['uname']);
 //password is hashed
 $ho_pw = mysqli_real_escape_string($conn, crypt($_POST['pword']));
 $ho_city = mysqli_real_escape_string($conn, $_POST['city']);
 $ho_state = mysqli_real_escape_string($conn, $_POST['state']);
 $ho_zip = mysqli_real_escape_string($conn, $_POST['zip']);
 
 $valid_flag = true;
 
 //checks if string is less than 6 characters
 //the minimum to contain @, domain, and .xxx
 if(strlen($ho_email)<6){
	 $valid_flag = false;
 }
 
 //checks for "@" symbol
 if (strpos($ho_email, '@') == false) {
     $valid_flag = false;
	 echo "Email doesn't contain \"@\"";
 }
 
 //checks for .com, .edu, etc.
 if (strpos($ho_email, '.') == false) {
     $valid_flag = false;
	 echo "Email doesn't contain top-level domain";
 }
 
 
 
 #test echo to see if variables work
 #echo "Username: ".$ho_username;
 #echo "<br>";
 
 //actual SQL code to put in our DB tables
 $sql = "INSERT INTO Homeowner (ho_fname,
 ho_lname,ho_address,ho_email,ho_username,ho_pw_hash,
 ho_city,ho_state,ho_zip) VALUES ('$ho_fname',
 '$ho_lname','$ho_address','$ho_email','$ho_username',
 '$ho_pw','$ho_city','$ho_state','$ho_zip')";
 
 //checks to see if query was executed/inserted
 if(!mysqli_query($conn,$sql)){
	 echo "Homeowner info not inserted";
	 echo "<br>";
		mysqli_close($conn);
		die();
 }else{ //else if query is executed, the following runs
	 echo "<br>";
	 echo "Homeowner info inserted";
     echo "<br>";
 }
 
 //finds the user id for the new account
 $sql2 = "SELECT homeowner_id FROM Homeowner WHERE ho_username = 
 '{$ho_username}'";
 $query2 = mysqli_query($conn,$sql2);
 $id_result = mysqli_fetch_assoc($query2);
 
 $fetched_id = $id_result['homeowner_id'];

 
 //echoes user id
 echo "User ID: ".$fetched_id;
 
 //link housecheck fields to php values
 $chk_l_date = mysqli_real_escape_string($conn, $_POST['leaveDate']);
 $chk_l_time = mysqli_real_escape_string($conn, $_POST['leaveTime']);
 $chk_r_date = mysqli_real_escape_string($conn, $_POST['returnDate']);
 $chk_r_time = mysqli_real_escape_string($conn, $_POST['returnTime']);
 
 //sql to insert into housecheck table
 $sql_housecheck = "INSERT INTO Housecheck (homeowner_id,
 leave_date,return_date,leave_time,return_time) VALUES 
 ('$fetched_id','$chk_l_date','$chk_r_date','$chk_l_time',
 '$chk_r_time')";
 
 if(!mysqli_query($conn,$sql_housecheck)){
	 echo "Housecheck info not inserted";
	 echo "<br>";
	 mysqli_close($conn);
		die();
		//if user isn't logged in at all, deny access
 }else{ //else if query is executed, the following runs
	 echo "<br>";
	 echo "Housecheck info inserted";
	 mysqli_close();
		//Redirect to login with new account
	 header( "Refresh:2; url=http://secs.oakland.edu/~cmczerny/cops/pages/loginPG.php",
	 true, 303);
  exit;
 }
?>