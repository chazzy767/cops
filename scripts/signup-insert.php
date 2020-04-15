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
  echo "Error: Email doesn't contain \"@\"" . "<br>";
 }
 
 //checks for .com, .edu, etc.
 if (strpos($ho_email, '.') == false) {
     $valid_flag = false;
  echo "Error: Email doesn't contain top-level domain" . "<br>";
 }
 
	//if there are no errors, then insert data
	if ($valid_flag == true){
		//actual SQL code to put in our DB tables
		$sql = "INSERT INTO Homeowner (ho_fname,
		ho_lname,ho_address,ho_email,ho_username,ho_pw_hash,
		ho_city,ho_state,ho_zip) VALUES ('$ho_fname',
		'$ho_lname','$ho_address','$ho_email','$ho_username',
		'$ho_pw','$ho_city','$ho_state','$ho_zip')";
		
		//checks to see if query was executed/inserted
		if(!mysqli_query($conn,$sql)){
			//echo "Account info not inserted";
		} else { //else if query is executed, the following runs
			//echo "<br>";
			//echo "Account info inserted";
			//echo "<br>";
			
		}
		mysqli_close($conn);
		header("Location: ../index.php",
  true, 303);
	} else {
		mysqli_close($conn);
	}	
	
?>