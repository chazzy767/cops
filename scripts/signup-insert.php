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
	 echo "Homeowner info not inserted";
	 echo "<br>";
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
 $chk_l_date = $_POST['leaveDate'];
 $chk_l_time = $_POST['leaveTime'];
 $chk_r_date = $_POST['returnDate'];
 $chk_r_time = $_POST['returnTime'];
 
 //sql to insert into housecheck table
 $sql_housecheck = "INSERT INTO Housecheck (homeowner_id,
 leave_date,return_date,leave_time,return_time) VALUES 
 ('$fetched_id','$chk_l_date','$chk_r_date','$chk_l_time',
 '$chk_r_time')";
 
 if(!mysqli_query($conn,$sql_housecheck)){
	 echo "Housecheck info not inserted";
	 echo "<br>";
	 mysqli_close();
 }else{ //else if query is executed, the following runs
	 echo "<br>";
	 echo "Housecheck info inserted";
	 mysqli_close();
	 $_SESSION["session_user_id"];
	 header( "Refresh:2; url=http://secs.oakland.edu/~cmczerny/cops/pages/customerUI.php",
	 true, 303);
     exit;
 }
?>