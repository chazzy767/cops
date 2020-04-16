<?php
 session_start();
 //connects to our OU COPS db
 include("../scripts/connect-db.php");

 //add functions php file
 include("php-functions.php");
 
 //echo "User ID: ".$_SESSION["session_user_id"]."<br>";
 $ho_id = $_SESSION["session_user_id"];
 
 //link housecheck fields to php values
 $chk_l_date = mysqli_real_escape_string($conn, $_POST['leaveDate']);
 $chk_l_time = mysqli_real_escape_string($conn, $_POST['leaveTime']);
 $chk_r_date = mysqli_real_escape_string($conn, $_POST['returnDate']);
 $chk_r_time = mysqli_real_escape_string($conn, $_POST['returnTime']);
	
	$todays_date = date("Y-m-d");
	
	$compare_today_date = new DateTime($todays_date);
	$compare_l_date = new DateTime($chk_l_date);
	$compare_r_date = new DateTime($chk_r_date);
	
	//initialize validity flag as true
	$valid_flag = true;
	
	function validateDate($date, $format = 'Y-m-d')
  {
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
  }
	
	//validates dates for format
	$l_date_format = validateDate($chk_l_date);
	$r_date_format = validateDate($chk_r_date);
	
	if ($l_date_format == false){
		echo "Error: Leave date is in wrong format.<br>";
		$valid_flag = false;
	}
		
	if ($r_date_format == false){
		echo "Error: Leave date is in wrong format.<br>";
		$valid_flag = false;
	}
	
	//BEGINNING OF TIME VALIDATION
	//checks to see if time is in HH:mm
	function isTime($time)
	{
	 return preg_match("#([0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}#", $time);
	}
	
	$l_time_format = isTime($chk_l_time);
	$r_time_format = isTime($chk_r_time);
	
	if ($l_time_format == false){
		echo "Error: Leave time is in wrong format.<br>";
		$valid_flag = false;
	}
	
	if ($r_time_format == false){
		echo "Error: Return time is in wrong format.<br>";
		$valid_flag = false;
	}
	//END OF TIME VALIDATION
	
	//function for creating range between leave and return dates
	function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {

	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );
 if ($valid_flag == true){
	}
	while( $current <= $last ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}

	return $dates;
 }
	
	
	//creates range using previous function
	$vacation_range = dateRange($chk_l_date, $chk_r_date);
	
	//count element in array for validation
	$vacation_count = count($vacation_range);
	echo "Vacation Range: " . $vacation_count . " days.<br>";
	
	//if leave date is later than return date, raise flag
	if ($compare_l_date > $compare_r_date){
		echo "Error: Leave date is later than return date. <br>";
		$valid_flag = false;
	}
	
	//makes sure leave date is later than today
	if ($compare_l_date < $compare_today_date){
		echo "Error: Leave date is before today's date.<br>";
		$valid_flag = false;
	}
	
	//makes sure return date is later than today
	if ($compare_r_date < $compare_today_date){
		echo "Error: Return date is before today's date.<br>";
		$valid_flag = false;
	}
	
	//if count is longer than 2 weeks, raise flag
	//this is so db doesn't get flooded
	if ($vacation_count > 14){
		echo "Error: Vacation is too long. Must be 14 or less. <br>";
		$valid_flag = false;
	}
	
	//kills if errors have occured.
	if ($valid_flag == false){
		echo "Errors in submission. Please correct and resubmit.";
		mysqli_close($conn);
		exit();
	}
	
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