<?php
 //connects to our OU COPS db
 include("../scripts/connect-db.php");
 echo "<br>";
 echo "Inserting data...";
 echo "<br>";
 
 $sql = "INSERT INTO Homeowner (ho_fname, ho_lname, ho_address,
 ho_email, ho_username, ho_city, ho_state, ho_zip)
 VALUES
 ('$_POST[fname]', '$_POST[lname]', '$_POST[adress]', '$_POST[email]', 
 '$_POST[uname]', '$_POST[city]', '$_POST[state]', '$_POST[zip]')";
 echo "Closing connection and redirecting...";
 header("Refresh:2, url=http://www.secs.oakland.edu/~cmczerny/cops/", true, 303);
 exit ;
?>