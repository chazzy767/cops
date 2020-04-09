<?php
 //access session variables
 session_start();
 
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 
 //link php variables to form variables
 $checkboxvar = $_POST['checkboxvar'];
 $user_id = $_SESSION['session_user_id'];
 $timestamp = date("Y-m-d H:i:s");
 
	

 //loops through each value in array
 //and updates accordingly
 foreach($checkboxvar as $key => $value)
 {
   $sql = "UPDATE Housecheck SET chk_value = 'yes', checker_id = '$user_id', chk_at = '$timestamp'
   WHERE check_id = '$value'";
			
   if(!mysqli_query($conn,$sql)){
      //do nothing
    }else{ 
      //do nothing
    }
 }
	
	//close sql connection		
 mysqli_close($conn);
 
 //redirect back to admin page
 header( "Location: ../pages/adminProfile.php",
 true, 303);
 
 //exit script
 exit();
?>