<?php
 session_start();
 session_destroy();
 setcookie("masuk",null, time()-180);
 header("Location: login.php");
 exit();
?>