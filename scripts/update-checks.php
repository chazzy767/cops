<?php
 //access session variables
 session_start();
 
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 
 //link php variables to form variables
 $checkboxvar = $_POST['checkboxvar'];
 $user_id = $_SESSION['session_user_id'];
 $timestamp = date("Y-m-d H:i:s");
 $chk_comment = $_POST['comment_field'];

 //loops through each value in array
 //and updates accordingly
 foreach($checkboxvar as $key => $value)
 {
   /* $sql_email = "SELECT ho_email
                 FROM Homeowner
                 INNER JOIN Housecheck 
                 ON Homeowner.homeowner_id = Housecheck.homeowner_id
                 WHERE Housecheck.check_id = '$value'";
    $result = mysqli_query($conn,$sql_email);
    $rows = mysqli_fetch_array($result);
    $temp_email = $rows[0];
    echo $temp_email . "<br>"; */
    
    
   $new_comment = strval($chk_comment[$key]);
   //echo $new_comment . "<br>";
   
   $sql = "UPDATE Housecheck SET chk_value = 'yes', checker_id = '$user_id', chk_at = '$timestamp', chk_comment = '$new_comment'
   WHERE check_id = '$value'";
   
   if(!mysqli_query($conn,$sql)){
      //do nothing
    }else{ 
      //do nothing
    }
 }
 
 //redirect back to admin page
 header( "Location: ../pages/adminProfile.php",
 true, 303);
 
 //exit script
 exit();
?>