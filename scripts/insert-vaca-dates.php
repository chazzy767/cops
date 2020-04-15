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
 
	//function for creating range between leave and return dates
	function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {

	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );

	while( $current <= $last ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}

	return $dates;
 }
	
	//creates range using previous function
	$vacation_range = dateRange($chk_l_date, $chk_r_date);
	
	//inserts housecheck dates for each date in range
	foreach($vacation_range as $value){
    $sql = "INSERT INTO Housecheck (homeowner_id,
            leave_date,leave_time) VALUES 
            ('$ho_id','$value','$chk_l_time')";
				echo $value . "<br>";
				if(!mysqli_query($conn,$sql)){
     echo "Vacation date not inserted";
     echo "<br>";
    }else{
			  //do nothing
    }
 }
	mysqli_close($conn);
 header("Location: ../pages/customerUI.php",
 true, 303);
	exit();
?>