<?php
//mascots.php
// Change username and password to your MySQL account username and password
$server = "localhost";
$userName = "cmczerny";
$pass = "RZNUq8J2wvaXxKtQ";
$db = "cmczerny";
//create connection
$con=mysqli_connect($server,$userName,$pass,$db);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_close($con);
?>