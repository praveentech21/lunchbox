<?php
// Include your database connection
include 'connect.php'; // Adjust the file name as per your configuration

// Check if the request is coming via AJAX
    if (isset($_POST['updateparent'])) {
        
        // Assuming you have sanitized the input data, otherwise, make sure to sanitize it
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $altphone = $_POST['altphone'];
        $email = $_POST['email'];
        $pincode = $_POST['pincode'];
        $doorno = $_POST['doorno'];
        $appartment = $_POST['appartment'];
        $area = $_POST['area'];
        $addresslink = $_POST['addresslink'];

        // Update the parent details in the database
        $stmt = $con->prepare("UPDATE `parent` SET `pname`=? ,`email`=?,`altphone`=?,`address`=? WHERE `pid` = ?");
        $stmt->bind_param("sssss", $pname, $email, $altphone, $addresslink, $pid);
        $addr = $con->prepare("UPDATE `address` SET `area`=?,`appartment`=?,`doorno`=?,`pincode`=? WHERE `pid` = ?");
        $addr->bind_param("sssss", $area, $appartment, $doorno, $pincode, $pid);


        if ($stmt->execute() and $addr->execute()) {
            header("Location: console.php#pop3");
        } else {
            $response = array("error" => "Error updating parent details");
            echo "<script>alert('Parent Details Updation Failed')</script>  ";
        }
        
        // Send JSON response
    }
    else if(isset($_POST['updatestudent'])){
        $sname = $_POST['sname'];
        $rollno = $_POST['rollno'];
        $school = $_POST['school'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        $gender = $_POST['gender'];
        $subdate = $_POST['subdate'];
        $stdid = $_POST['stdid'];
        
        $stmt = $con->prepare("UPDATE `student` SET `sname`=?,`school`=?,`rollno`=?,`sclass`=?,`sec`=?,`gender`=?,`subscription_date`=? WHERE `rollno` =? ");
        $stmt->bind_param("ssssssss", $sname, $school, $rollno, $class, $section, $gender, $subdate, $rollno);
        if ($stmt->execute()) {
            header("Location: console.php#pop3");
        } else {
            $response = array("error" => "Error updating student details");
            echo "<script>alert('Student Details Updation Failed')</script>  ";
        }
        
    }
    elseif (isset($_POST['updateagentdetails'])){
        $agentmobile = $_POST['agentmobile'];
        $agentname = $_POST['agentname'];
        $eid = $_POST['eid'];

        $stmt = $con->prepare("UPDATE `team` SET `name`=?,`mobile`=? WHERE `eid` =?");
        $stmt->bind_param("sss", $agentname, $agentmobile, $eid);
        if ($stmt->execute()) {
            header("Location: console.php#pop3");
        } else {
            $response = array("error" => "Error updating agent details");
            echo "<script>alert('Agent Details Updation Failed')</script>  ";
        }

    }
?>
