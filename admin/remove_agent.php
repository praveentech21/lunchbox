<?php
    include 'connect.php';
    if(isset($_GET['agent'])){
        $agent = $_GET['agent'];
        $run = mysqli_query($con,"update subscriptions set delivery_partner = '0' where stdid = '$agent'");
        if($run){
            header("location:allocate_student.php");
        }
        else{
            echo "<script>alert('Agent Removal Failed')</script>";
            header("location:allocate_student.php");
        }

    }
?>