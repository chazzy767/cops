<?php
 session_start();
	//connects to our OU COPS db
 include("../scripts/connect-db.php");

 //add functions php file
 include("php-functions.php");
	
	echo "User ID: ".$_SESSION["session_user_id"]."<br>";
	$ho_id = $_SESSION["session_user_id"];
	
 //link housecheck fields to php values
 $chk_l_date = mysqli_real_escape_string($conn, $_POST['leaveDate']);
 $chk_l_time = mysqli_real_escape_string($conn, $_POST['leaveTime']);
 $chk_r_date = mysqli_real_escape_string($conn, $_POST['returnDate']);
 $chk_r_time = mysqli_real_escape_string($conn, $_POST['returnTime']);
	
 //finds the user id for the new account
 $sql = "INSERT INTO Housecheck (homeowner_id,
									leave_date,return_date,leave_time,return_time) VALUES 
									('$ho_id','$chk_l_date','$chk_r_date','$chk_l_time',
									'$chk_r_time')";
 
	
	if(!mysqli_query($conn,$sql)){
			echo "Vacation not inserted";
			echo "<br>";
			mysqli_close();
	} else{ //else if query is executed, the following runs
				mysqli_close();
				header("Location: ../pages/customerUI.php",
				true, 303);
				exit;
	}
?>