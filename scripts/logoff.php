<?php
 session_destroy();
 header("Location: http://secs.oakland.edu/~cmczerny/cops/",
 true, 303);
 session_start();
 $_SESSION['logged_in'] = false;
 exit();
?>