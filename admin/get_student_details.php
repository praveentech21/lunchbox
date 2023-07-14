<?php
include "connect.php";
if(isset($_GET['agent'])){
    $students_to_agent = mysqli_fetch_assoc(mysqli_query($con,"select * from subscriptions where delivery_partner = '{$_GET['agent']}'"));
    echo "$students_to_agent";

}

?>