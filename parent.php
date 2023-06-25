<?php
include "connect.php";
session_start();
if(empty($_SESSION['uname'])){
    header("location:login.php");
}  
else{
    $uname = $_SESSION['uname'];
    $run = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pmobile = '$uname'"));
    $roll = $run['rollno'];
    $runn = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `student` WHERE rollno = '$roll'"));
    $sch = $runn['school'];
    $runr = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `schools` WHERE `SNO`=$sch"));
    // echo "{$runn['roll']}";

}?>

<!-- All Setted Shiva and this is sending to git as All set SHiva -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BO LUNCH BOX</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

        <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>SRKR Engineering College, MCR Web Solutions, Bhimavaram, 534204</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+91 9010972333</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>bolunchbox@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/bo_lunchbox"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100091071965266"><i class="fab fa-facebook-f fw-normal"></i></a>
             

                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/bo_lunchbox/"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-3 py-3 py-lg-0" style=" background: rgb(29,253,241); background: linear-gradient(51deg, rgba(29,253,241,1) 0%, rgba(202,200,18,1) 100%); "  >
        <a href="parent.php" class="navbar-brand p-0">
               <table>
                    <tr>
                        <td><h1 class="m-0"><i class="fa fa-user-tie me-lg-4"></i>LUNCH BOX</h1> </td>
                    </tr>
                 </table>
            </a>              
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#profile" class="nav-item nav-link">Profile</a>
                    <a href="#notify" class="nav-item nav-link ">Notification</a> 
                    <a href="#track" class="nav-item nav-link">Live Track</a>
                    <div class="nav-item dropdown">
                   
    <a  class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> Menu</a>
    <div class="dropdown-menu m-0">
        <a href="#contact" class="dropdown-item">Contact</a>
        <!-- <a href="notification.html" class="dropdown-item">Price Plane</a> -->
        <a href="pay.php" class="dropdown-item">Payment</a>
        <a href="#track" class="dropdown-item">Live Track</a>
        <a href="logout.php" class="dropdown-item">Log Out</a>
    </div>
    </div>
    </div>
</div>
        </nav>

        
    </div>
    <!-- Navbar End -->
    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
 
    <!-- Profile -->
    <br><br>
    <section id="profile">
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Parent</h5>
                        

                            <table style="width: 90%;">
                                <tr style="text-align: center;">
                                    <td>
                                        <h1 class="mb-0"> <?php echo"{$run['pname']}" ?> </h1>
                                    </td>
                                    <td>
                                        <h4 class="mb-0"><?php echo"{$run['pmobile']}" ?> </h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0"><?php echo"{$run['address']}" ?>   </h4>
                                    </td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td>
                                        <h4 class="mb-0"> <?php echo"{$run['email']}" ?>  </h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0"><?php echo"{$run['email']}" ?></h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0"> <?php echo"{$run['school']}" ?> </h4>
                                    </td>
                                </tr>
                            </table>
                           


                    </div>
                    <div class="section-title position-relative pb-3 mb-5">
                            <h5 class="fw-bold text-primary text-uppercase">About Child</h5>
                            <table style="width: 90%;">
                                <tr style="text-align: center;">
                                    <td>
                                        <h1 class="mb-0"><?php echo"{$runn['sname']}" ?>  </h1>
                                    </td>
                                    <td>
                                        <h4 class="mb-0"><?php echo"{$runn['sclass']}./{$run['rollno']}" ?> </h4>
                                    </td>
                                    <td>
                                        <h4 class="mb-0"><?php echo"{$run['address']}" ?> </h4>
                                    </td>
                                    
                                </tr> 
                                <tr style="text-align: center;">
                                    <td>
                                        <h1 class="mb-0"></h1>
                                    </td>
                                    <td>
                                        <h4 class="mb-0">  <a style="border-radius: 15px" href="addchild.php" class="btn btn-primary py-2 px-4 ms-3"> ADD CHILD </a>
                                        </h4>   
                                    </td>
                                    <td>
                                        <h4 class="mb-0"></h4>
                                    </td>
                                </tr>  
                            </table>
                            
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- About End -->


    <!-- Notification stated -->
    <section id="notify">
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7"></a>

                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i></a>
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Notification</h5>
                        <h1 class="mb-0">Status of Box</h1>
                    </div>
                    <?php
                    $result = mysqli_fetch_assoc(mysqli_query($con,"select status from day where pmobile = '$uname'"));
                    if($result['status'] == 0 || $result['status'] == 1 || $result['status'] == 2 ){
                        echo '<p class="mb-4">Your Box is not collected delivared </p>';
                    }
                    if($result['status'] == 1 || $result['status'] == 2) {
                        echo '<p class="mb-4">Your Box is Collected</p>';
                    }
                    if($result['status'] == 2) {
                        echo '<p class="mb-4">Your Box is Delivared</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Notification Ended -->

    <!-- Live Track -->
    <section id="track" class="container m-5 p-5">
        <div class="center wow fadeInUp" data-wow-delay="0.3s">
            <div class="">
                <table class="container">
                    <tr>
                        <td>
                            <p style="text-align:center ;" >FOR WESTBERRY HIGH SCHOOL</p>
                        </td>
                        <td>
                            <P style="text-align:center ;" >FOR BHARATHI VIDYABHAVANS SCHOOL</P>
                        </td>
                    </tr>
                    <tr>
                        <TD class="">  <a href="https://trck.at/1qx1POXwpj"><img src="img/track.png" alt=""></a>      </TD>
                        <TD class="">  <a href="https://trck.at/1qx1POXwpj"><img src="img/track.png" alt=""></a>      </TD>
                    </tr>
                </table>
            </div>
           
        </div>
    </section>       
    
    <!-- Contac form -->
    <section id="contact">
<!-- Contact Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
            <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">+91 9010972333</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Email to get Query</h5>
                        <h4 class="text-primary mb-0">bolunchbox@gmail.com</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                        style="width: 60px; height: 60px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Visit our office</h5>
                        <h4 class="text-primary mb-0">SRKREC,Tech Center</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                <form class="mt-5 pt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name"
                                style="height: 55px;" id="p_name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email"
                                style="height: 55px;" id="p_mail">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject"
                                style="height: 55px;" id="p_subject">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0 bg-light px-4 py-3" rows="4"
                                placeholder="Message" id="p_msg"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" onclick="chaitanya();">Send
                                Message</button>
                        </div>
                    </div>
                </form>
                <script>
                    function chaitanya() {

                        var p_name = document.getElementById("p_name").value;
                        var p_mail = document.getElementById("p_mail").value;
                        var p_subject = document.getElementById("p_subject").value;
                        var p_msg = document.getElementById("p_msg").value;

                        var url = "https://wa.me/9848823311?text="
                            + "Thanks For Contacting LUNCHBOX...!" + "%0a" + "%0a"
                            + "Full Name  : " + p_name + "%0a"
                            + "Email: " + p_mail + "%0a"
                            + "Subject : " + p_subject + "%0a"
                            + "Message  : " + p_msg + "%0a" + "0%a";
                        // + "Visit Us Here!"+ "%0a" +"";
                        window.open(url, '_blank').focus();
                    }
                </script>
            </div>


            <div class="col-6 md-6 wow slideInUp" data-wow-delay="0.6s">
                <img class="position-relative rounded w-100 h-100" src="img/lunchbox.png" frameborder="0"
                    style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </img>
            </div>
        </div>

    </div>




</div>
</div>
<!-- Contact End-->
</section>
    <!-- contact form end -->

    <!-- Vendor Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                <img src="img/bvrm.png" alt="">
                <img src="img/srkr.png" alt="">
                <img src="img/idealab.png" alt="">
                <img src="img/tech.png" alt="">
                <img src="img/csd.png" alt="">
                <img src="img/bio.png" alt="">
                <img src="img/mcr.jpeg" alt="">
                <img src="img/startup.jpeg" alt="">
                <img src="img/srkr.png" alt="">
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
                        pickup and delivery service.</p>

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
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="img/lunchbox-1.png" style="object-fit: cover;">
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
    <a href="#upside" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>