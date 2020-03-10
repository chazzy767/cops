<?php
 echo "Logging off and redirecting...";
 session_destroy();
 header( "Refresh:2; url=http://secs.oakland.edu/~cmczerny/cops/",
 true, 303);
?>