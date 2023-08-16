<?php 
include 'connect.php';
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM parent WHERE pid = '$pid'" ));

    header('Content-Type: application/json');
    echo json_encode($data);

} else {
    echo "Invalid request";
}
?>