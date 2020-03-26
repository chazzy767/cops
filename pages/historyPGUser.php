<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<title>History of House Checks for User</title>
		<?php include "../scripts/head.php"; ?>
	</head>
	<body>
	 <?php include "../scripts/navbar-logo.php";?>
		<?php include "../scripts/connect-db.php"; ?>
		<?php include "../scripts/php-functions.php"; ?>
  <?php grantCustomer(); ?>		
		<form action="login.php" method="post">
		<br>
			<div class="container">
				<div class="hisTXT">
				 <p9> House Check History </p9>
     <?php
					 //Establish local variable for sql
					 $user_id = $_SESSION['session_user_id'];
						//This creates the table of unchecked housechecks
						$sql = "SELECT * FROM Housecheck
														INNER JOIN Homeowner
														ON Housecheck.homeowner_id=Homeowner.homeowner_id
														WHERE Housecheck.chk_value=\"yes\" 
														AND Housecheck.homeowner_id='$user_id'";
						$result = mysqli_query($conn,$sql);
						
						//HOUSECHECK HISTORY TABLE BEGINS
						echo "<table>
						<tr>
						<th>Leave Date</th>
						<th>Return Date</th>
						<th>Check Completed</th>
						<th>Completed By</th>
						</tr>";
						//<th>Date Created</th>
						//loop to fill table with all results of query
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['leave_date'] . "</td>";
							echo "<td>" . $row['return_date'] . "</td>";
							echo "<td>" . $row['chk_at'] . "</td>";
							//Concatenates checker first and last name
							echo "<td>" . $row['ho_fname'] . " " . $row['ho_lname'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
						//END OF HOUSECHECK HISTORY TABLE
						mysqli_close($conn);		 
				  ?>					
				</div>
			</div>
		</form>
	</body>
</html>