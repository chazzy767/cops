<?php
 function redirectHome(){
    //redirects back to our homepage
     header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/",
	 true, 303);
 }
 
 function checkPWs(){
  //Compares entered pw and fetched pw
  if (strcmp($mypassword,$fetched_pw)===0){
	 echo "Passwords match.";
 } else{
	 echo "Passwords do not match.";
 }
 }
	 
?>
