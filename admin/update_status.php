<?php
    include("connect.php");
    $stdid=$_GET['stdid'];
    $eid=$_GET['eid'];
    $date=date("Y-m-d");
    $time = date("h:i:s");  
    $run1 = mysqli_query($con,"select * from delivary where stdid='$stdid' and date='$date'");
    $run5 = mysqli_fetch_assoc(mysqli_query($con,"select pid from subscriptions where stdid='$stdid'"));  
    if(mysqli_num_rows($run1)==0){
    $run2 = mysqli_query($con,"insert into trips (stdid,date,pickup_time,delivery_by) values ('$stdid','$date','$time','$eid')");
    $run3 = mysqli_fetch_assoc(mysqli_query($con,"select tripid from trips where stdid='$stdid' and date='$date'"));
    $run4 = mysqli_query($con,"insert into delivary (stdid,pid,date,tripid) values ('$stdid',{$run5['pid']},'$date','{$run3['tripid']}')");
    // header("location:delivary.php");
    }
    else{
        $run1 = mysqli_fetch_assoc($run1);
        $run2 = mysqli_query($con,"update trips set drop_time='$time' where tripid='{$run1['tripid']}'");
        $run3 = mysqli_query($con,"update delivary set status=1 where tripid='{$run1['tripid']}'");
        // header("location:delivary.php");
    }
?>