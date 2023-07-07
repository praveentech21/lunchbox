<?php
session_start();
if(empty($_SESSION['supid']))
{
    header("location:login.php");
}
include("connect.php");
$supid=$_SESSION['supid'];
$run1 = mysqli_query($con,"select * from team where id='$supid'");
