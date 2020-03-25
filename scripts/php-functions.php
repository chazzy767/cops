<?php
 //redirects back to our homepage
 function redirectHome(){
     header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/",
	 true, 303);
 }
	
	//function to grant page access to ADMINS ONLY
	function grantAdmin(){
		if (($_SESSION['logged_in']==true)){
						//If user is admin, add "admin page" button to nav
						if ($_SESSION['user_type']=="admin"){
								//do nothing
						} else {
							 //if user is not admin, deny access
								echo "Permission denied. You are not an admin.";
								mysqli_close($conn);	
								die();
						}
					}
					else {
						//if user isn't logged in at all, deny access
						echo "Permission denied. Log in as admin.";
						mysqli_close($conn);	
						die();
					}
	}
	
	//function to grant page access to CUSTOMERS ONLY
	function grantCustomer(){
		if (($_SESSION['logged_in']==true)){
						//If user is admin, add "admin page" button to nav
						if ($_SESSION['user_type']=="admin"){
								//if user is not admin, deny access
								echo "Permission denied. Customers only.";
								mysqli_close($conn);	
								die();
						} else {
							 //do nothing
						}
					}
					else {
						//if user isn't logged in at all, deny access
						echo "Permission denied. Log in as customer.";
						mysqli_close($conn);	
						die();
					}
	}
	
	
	 
?>
