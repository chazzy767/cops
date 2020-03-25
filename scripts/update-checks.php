<?php
//link php variables to form variables
	$checkboxvar = $_POST['checkboxvar'];
 foreach($checkboxvar as $key => $value)
{
  echo $value;
		echo '<br>';
}
 echo "Update Checks.";
?>