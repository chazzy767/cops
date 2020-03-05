<?php
function redirectHome() {
    //redirects back to our homepage
     header("Refresh:3, url=http://www.secs.oakland.edu/~cmczerny/cops/",
	 true, 303);
 }
?>
