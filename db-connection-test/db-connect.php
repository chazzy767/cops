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
//example insert statement to add a new mascot
mysqli_query($con,"INSERT INTO tbl_ouMascots(name, YearCreated)
VALUES (’Grizz’, 1998)");
//example SELECT stament to show the results of the mascots table
$result = mysqli_query($con,"SELECT * FROM ’tbl_ouMascots’ WHERE 1 LIMIT 0, 30; ");
While($row = mysqli_fetch_array($result))
{
echo $row[’name’] . " " . $row[’YearCreated’];
echo "<br>";
}
mysqli_close($con);
?>