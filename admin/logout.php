<?php

session_start();
unset($_SESSION['uname']);
session_destroy();
header("location:login.php");

?>
<!-- All Setted Shiva and this is sending to git as All set SHiva -->