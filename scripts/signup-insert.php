<?php
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 //add functions php file
 include("php-functions.php");
 
 //link php variables to form variables
 $ho_fname = $_POST['fname'];
 $ho_lname = $_POST['lname'];
 $ho_address = $_POST['adress'];
 $ho_email = $_POST['email'];
 $ho_username = $_POST['uname'];
 //password is hashed
 $ho_pw = crypt($_POST['pword']);
 $ho_city = $_POST['city'];
 $ho_state = $_POST['state'];
 $ho_zip = $_POST['zip'];
 
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
	 echo "Data not inserted";
	 echo "<br>";
	 echo "Closing connection and redirecting...";
	 mysqli_close($conn);
	 //redirects back to our homepage
     redirectHome();
     exit ;
 }else{ //else if query is executed, the following runs
	 echo "<br>";
	 echo "Data inserted";
     echo "<br>";
	 echo "Closing connection and redirecting...";
	 mysqli_close($conn);
	 redirectHome();
     exit;
 }
?>