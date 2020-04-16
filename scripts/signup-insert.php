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
 $ho_phone = mysqli_real_escape_string($conn, $_POST['phone']);
 
 //password is hashed
 $ho_pw = mysqli_real_escape_string($conn, crypt($_POST['pword']));
 $ho_city = mysqli_real_escape_string($conn, $_POST['city']);
 $ho_state = mysqli_real_escape_string($conn, $_POST['state']);
 $ho_zip = mysqli_real_escape_string($conn, $_POST['zip']);
 
 $valid_flag = true;
 
 //Validates email
 if (!filter_var($ho_email, FILTER_VALIDATE_EMAIL)) {
   echo "Error: Email is invalid" . "<br>";
   $valid_flag = false;
 }
 
 //validates to see if email exists
 $sql_e = "SELECT *
           FROM Homeowner
           WHERE ho_email = '$ho_email'";
 $res_e = mysqli_query($conn, $sql_e);
 
 if(mysqli_num_rows($res_e) > 0){
     $valid_flag = false;
     echo "Error: Email already taken.<br>"; 
 }
 
 //validates phone number
 if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $ho_phone)) {
  //do nothing
 } else {
  $valid_flag = false;
  echo "Error: Phone number is not valid." . "<br>";
 }
 
 //validates zip code
 if(preg_match("/^([0-9]{5})(-[0-9]{4})?$/",$ho_zip)) {
  //do nothing
 } else {
  $valid_flag = false;
  echo "Error: Zip code is not valid." . "<br>";
 }
 
 //validates username
 $sql_u = "SELECT * FROM Homeowner WHERE ho_username='$ho_username'";
 $res_u = mysqli_query($conn,$sql_u);
 
 if (mysqli_num_rows($res_u) > 0){
  $valid_flag = false;
  echo "Error: Username is taken" . "<br>";
 } else {
  //do nothing
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
  echo "Data not inserted as form contains errors. Please go back, correct, and re-submit";
  mysqli_close($conn);
 } 
 
?>