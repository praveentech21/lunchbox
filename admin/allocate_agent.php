<?php
  session_start();
  // Calculation for this Month
  if(empty($_SESSION['supid'])) header("location: login.php");
  include("connect.php");
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $agent = $_GET['agent'];
    $stdid = $_GET['stdid'];
    $run1 = mysqli_query($con, "UPDATE `subscriptions` SET `delivery_partner`='$agent' WHERE stdid='$stdid'");
    if($run1){
      echo "<script>alert('Agent Allocated Successfully')</script>";
      echo "<script>window.location.href='allocate_delivary_agent.php'</script>";
    }
    else{
      echo "<script>alert('Error Occured')</script>";
      echo "<script>window.location.href='allocate_delivary_agent.php'</script>";
    }
    }
?>