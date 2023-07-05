<?php
include "connect.php";
session_start();
if(empty($_SESSION["uname"])){
    header("location:login.php");
}
else {
    $pid = $_SESSION['uname'];
    $run1 = mysqli_fetch_assoc(mysqli_query($con,"select pname,email,altphone,address from parent where pid='$pid'"));
    $run2 = mysqli_query($con,"select * from subscriptions where pid='$pid'");
    $stdids = array();
    while ($row = mysqli_fetch_assoc($run2)){
        array_push($stdids,"$row[stdid]"); 
    }
    foreach ($stdids as $stdid) {
        $run3 = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid ='$stdid'"));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BO LUNCH BOX</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- All Setted Shiva and this is sending to git as All set SHiva -->
    <!-- Favicon -->
    <link href="Bhavani/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Bhavani/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Bhavani/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Bhavani/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="Bhavani/css/form.css">
    <style>

table {

  font-family: arial, sans-serif;

  border-collapse: collapse;

  width: 100%;

}

td, th {

  border: 1px solid #dddddd;

  text-align: left;

  padding: 8px;

}

tr:nth-child(even) {

  background-color: #dddddd;

}

</style>
</head>

<body style="background-color: white;">
<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>SRKR Engineering College, MCR Web Solutions, Bhimavaram, 534204
                </small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91 9010972333</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>bolunchbox@gmail.com</small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/bo_lunchbox"><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100091071965266"><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/bo_lunchbox/"><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://www.youtube.com/channel/UCLfhE5z624iHsoNADjPUSSg"><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Carousel Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
           <table>
                <tr>
                    <td style="border: none;"><h1 class="m-0"><i class="fa fa-user-tie me-lg-4"></i>LUNCH BOX</h1> </td>
                </tr>
             </table>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="#profile" class="nav-item nav-link">Profile</a>
                <a href="#status" class="nav-item nav-link">Box Status</a>
                <a href="#track" class="nav-item nav-link">Box Tracking</a>
                <a href="#daily" class="nav-item nav-link">Daily Status</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                    <div class="dropdown-menu m-0">
                        <a href="addchild.php" class="dropdown-item">Add Child</a>
                        <a href="pay.php" class="dropdown-item">Payment</a>
                        <a href="#subscription" class="dropdown-item">Subscription Details</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

    <!-- Body of the site -->
    <div class="demo-page">
       
        <main class="demo-page-content">
            <br><br><br><br><br>
            <!-- profile Starts Hear Shiva -->
                <section id="profile" style="background-color:  #f1ebea ;">
                    <h2>Student Profile</h2>
                    <div class="row">
                        <?php
                            echo '<h3>Parent Name:'.$run1["pname"].'</h3>
                            <h3>Parent Mobile:'.$pid.'</h3>';
                            if(isset($run1["address"]))
                            echo '<h3>Parent Address:'.$run1["address"].'</h3>';
                        ?>
                    </div>  
                    <h2>Student Details</h2>
                    <div class="row">
                        <?php
                           foreach ($stdids as $stdid) {
                            $run3 = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid ='$stdid'"));
                            $run4 = mysqli_fetch_assoc(mysqli_query($con,"select * from schools where sid ='{$run3["school"]}'"));
                            echo '<div><section style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                            <div class="container-fluid">
                                <div style=" display:flex; flex-direction:row; flex-wrap: wrap; ">
                                    <div>
                                    <img style="height: 180px; width: 180px;" src="Upload/'.$run3["photo"].'" style="border-radius:10px;">
                                    </div>
                                   <div class="p-2 m-3">
                                   <h2>'.$run3["sname"].'</h2>
                                   <p>School Name:'.$run4["school_name"].'</p>
                                   <p>Roll NO: '.$run3["rollno"].'</p>
                                   <p>Class: '.$run3["sclass"].'</p>
                                   </div>
                                   </div>
                               </div>
                               </section>
                               </div>';
                        } 
                        ?>
                    </div>                        
                </section> <br>
                <!-- Profile Ends Hear Shiva -->
                       
                <!-- Status Strats Hear Shiva -->
            <section style="background-color:  #f1ebea ;" id="status">
                 <table style="background-color: #ffffff;">

                <tr>

                  <th>Action</th>
                                    
                  <th>Status</th>
                                    
                 <th>Time</th>

                </tr>

                <tr>

                 <td>PickUp</td>

                 <td>Maria Anders</td>

                 <td>Germany</td>

                </tr>

                <tr>

                    <td>Drop </td>

                    <td>Francisco Chang</td>

                    <td>Mexico</td>

                </tr>
                </table>
            </section> <br>
                <!-- Status Ends Hear SHiva -->
                
                <!-- Track Starts Hear Shiva -->
                <section id="track" style="background-color:  #f1ebea ;">
                <h3>Track Your Child Lunch Box : <button type="button" class="btn btn-danger">Track</button></h3>
                </section> <br>
                <!-- Track Ends Hear Shiva -->
                        
                <!-- Daily status Starts Hear Shiva -->
                <section style="background-color:  #f1ebea ;" id="daily">
                    <table style="background-color: #ffffff;">

                        <tr>
                                            
                          <th>Action</th>
                                            
                          <th>Status</th>
                                            
                         <th>Pick Up Time</th>

                         <th>Drop Time</th>
                                            
                        </tr>

                        <tr>                        

                         <td>PickUp</td>                        

                         <td>Maria Anders</td>                      

                         <td>Germany</td>
                         
                         <td>Germany</td>

                        </tr>                       
                    </table>
                </section> <br>
                <!-- Daily Ends Starts Hear Shiva -->

                <!-- Subscription Detais Starts Hear SHiva -->
                <section id="subscription" style="background-color:  #f1ebea ;">
                <table style="background-color: #ffffff;">

                    <tr>

                      <th>Action</th>

                      <th>Status</th>

                     <th>Time</th>

                    </tr>

                    <tr>

                     <td>PickUp</td>

                     <td>Maria Anders</td>

                     <td>Germany</td>

                    </tr>

                    <tr>

                        <td>Drop </td>

                        <td>Francisco Chang</td>

                        <td>Mexico</td>

                    </tr>
                </table>
                </section>
                <!-- Subscription Detais Starts Ends SHiva -->
            </main>
        </div>
    

<!-- !-- Vendor Start -->
<div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.9s">
<div class="container py-4 mb-4">
    <div class="bg-white">
        <div class="owl-carousel vendor-carousel">
            <img src="Bhavani/img/srkr.png" alt="">
            <img src="Bhavani/img/bvrm.png" alt="">
            <img src="Bhavani/img/mcr.jpeg" alt="">
            <img src="Bhavani/img/csd.png" alt="">
            <img src="Bhavani/img/idealab.png" alt="">
            <img src="Bhavani/img/tech.png" alt="">
            <img src="Bhavani/img/bio.png" alt="">
            <!-- <img src="Bhavani/img/startup.jpeg" alt=""> -->
            
        </div>
    </div>
</div>
</div>
<!-- Vendor End -->
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container">
    <div class="row gx-5">
        <div class="col-lg-4 col-md-6 footer-about">
            <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>LUNCH BOX</h1>
                </a>
                <p class="mt-3 mb-4">Most Schools these days are located far away from the village/city and 
                    most children are carrying lunch boxes with them.
                      it will be difficult for the children to eat the early cooked & 
                    packed food at lunch time.This problem exists in almost all cities, towns  where students 
                    commute to school by bus.
                    so this problem can be solved by a 
                    pickup and delivery service.
                </p>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="text-light mb-0">Get In Touch</h3>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        <p class="mb-0">Idea Lab, SRKR Marg, Chinnamiram, Bhimavaram, Andhra Pradesh 534202</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-envelope-open text-primary me-2"></i>
                        <p class="mb-0">bolunchbox@gmail.com</p>
                    </div>
                    <div class="d-flex mb-2">
                        <i class="bi bi-telephone text-primary me-2"></i>
                        <p class="mb-0">+91 9010972333</p>
                    </div>
                    <div class="d-flex mt-4">
                        <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="text-light mb-0">Popular Links</h3>
                    </div>
                    <div class="link-animated d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="index.html"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="about.html"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="price.html"><i class="bi bi-arrow-right text-primary me-2"></i>Price Paln</a>
                        <a class="text-light" href="contact.html"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                

                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="Bhavani/img/lunchbox-1.png" style="object-fit: cover;">
                    </div>
                </div>
                    
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid text-white" style="background: #061429;">
<div class="container text-center">
    <div class="row justify-content-end">
        <div class="col-lg-8 col-md-6">
            <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                <p>©Developed By Team Vitual Bridge</p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="Bhavani/lib/wow/wow.min.js"></script>
<script src="Bhavani/lib/easing/easing.min.js"></script>
<script src="Bhavani/lib/waypoints/waypoints.min.js"></script>
<script src="Bhavani/lib/counterup/counterup.min.js"></script>
<script src="Bhavani/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="Bhavani/js/main.js"></script>
</body>

</html> 