<?php

include "connect.php";
session_start();
$schools = mysqli_query($con, "select * from schools");
if (isset($_POST['submit']) && isset($_FILES['photo'])) {

    $image_name=$_FILES['photo']['name'];
    $image_tempname=$_FILES['photo']['tmp_name'];
    $image_error=$_FILES['photo']['error'];
    if($image_error === 0){
      $image_extension=pathinfo($image_name,PATHINFO_EXTENSION);
      $image_extension=strtolower($image_extension);
      $all_Img_ext = array('jpg','png','jpeg');
      if(in_array($image_extension,$all_Img_ext)){
        $image_new_name=uniqid('IMG-',true).'.'.$image_extension;
        $image_uplode_path = 'Upload/'.$image_new_name;
        move_uploaded_file($image_tempname,$image_uplode_path);
      }   
      else{
        echo "<script>alert('You have uploding wrong type data')</script>";
      }     
    }
    else{
        echo "<script>alert('Unknow Error Occured')</script>";
        header("location:register.php");
    }
  $pid = $_POST['pid'];
  $pass = $_POST['pass'];
  $pname = $_POST['pname'];
  $email = $_POST['email'];
  $altphone = $_POST['altphone'];
  $sname = $_POST['sname'];
  $school = $_POST['school'];
  $rollno = $_POST['rollno'];
  $sclass = $_POST['sclass'];
  $sec = $_POST['sec'];
  $gender = $_POST['gender'];
  $photo = $image_new_name;
  $area = $_POST['area'];
  $appartment = $_POST['appartment'];
  $doorno = $_POST['doorno'];
  $pincode = $_POST['pincode'];
  $run1 = mysqli_query($con,"insert into parent (`pid`, `pass`, `pname`, `email`,`altphone`) values ('$pid','$pass','$pname','$email','$altphone') ");
  $run2 = mysqli_query($con,"insert into student (`sname`, `school`, `rollno`, `sclass`, `sec`, `gender`,`photo`) VALUES ('$sname', '$school', '$rollno', '$sclass', '$sec','$gender','$photo')");
  $run3 = mysqli_fetch_assoc(mysqli_query($con,"select stdid from student where sname='$sname' and school='$school' and rollno='$rollno' and sclass='$sclass' and sec='$sec' and gender='$gender' "));
  $stdid = $run3['stdid'];
  $run4 = mysqli_query($con,"insert into subscriptions (`pid`, `stdid` ) values ('$pid', '$stdid')");
  $run5 = mysqli_query($con,"INSERT INTO `address` (`pid`, `area`, `appartment`, `doorno`, `pincode`) VALUES ('$pid', '$area', '$appartment', '$doorno', '$pincode')");
  $_SESSION['uname'] = $pid;
  header("location:parent.php");
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
    <!-- <link href="Bhavani/lib/animate/animate.min.css" rel="stylesheet"> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Bhavani/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Bhavani/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="Bhavani/css/form.css">
    <style>

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
                <a href="parent.php#profile" class="nav-item nav-link">Profile</a>
                <a href="parent.php#status" class="nav-item nav-link">Box Status</a>
                <a href="parent.php#track" class="nav-item nav-link">Box Tracking</a>
                <a href="parent.php#daily" class="nav-item nav-link">Daily Status</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                    <div class="dropdown-menu m-0">
                        <a href="addchild.php" class="dropdown-item">Add Child</a>
                        <a href="pay.php" class="dropdown-item">Payment</a>
                        <a href="parent.php#subscription" class="dropdown-item">Subscription</a>
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
            
            <form action="#" method="post" enctype="multipart/form-data" class="row m-5">
          <section id="Parent_Details">
            <div class="href-target" id="structure"></div>
            <h1>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2" />
                <polyline points="2 17 12 22 22 17" />
                <polyline points="2 12 12 17 22 12" />
              </svg>
              Parent Details

            </h1>
            <p>Basic Details about parents</p>
      
            <div class="nice-form-group">
              <label>Name</label>
              <input name="pname" type="text" placeholder="Parent Name" />
            </div>

            <div class="nice-form-group">
                <label>Phone Number</label>
                <input name="pid" type="tel" placeholder="Parent phonenumber"   class="icon-left" />
              </div>

              <div class="nice-form-group">
                <label>Alternate Phone Number</label>
                <input name="altphone" type="tel" placeholder="Alternate phonenumber"  class="icon-left" />
              </div>

              <div class="nice-form-group">
                <label>Email</label>
                <input name="email" type="email" placeholder="Your email" value="" class="icon-left" />
              </div>
        

              <div class="nice-form-group">
                <label>Password</label>
                <input name="pass" type="password" placeholder="Your password" class="icon-left" />
              </div>
          </section>

          <section id="Student_Details">
            <div class="href-target" id="structure"></div>
            <h1>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2" />
                <polyline points="2 17 12 22 22 17" />
                <polyline points="2 12 12 17 22 12" />
              </svg>
              Child Details
            </h1>
            <p>Basic Details about their Child</p>
      
            <div class="nice-form-group">
              <label>Name</label>
              <input name="sname" type="text" placeholder="Child Name" />
            </div>

            <div class="nice-form-group">
                <label>Child School</label>
                <select name="school" required>
                  <option value="">Please select Your Child School</option>
                  <?php while($row = mysqli_fetch_assoc($schools)){ ?>
                  <option value= <?php echo $row['sid'] ?> ><?php echo $row['school_name'] ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="nice-form-group">
                <label>Roll Number</label>
                <input name="rollno" type="text" placeholder="Child Roll Number" />
            </div>

            <div class="nice-form-group">
                <label>Class</label>
                <select name="sclass">
                  <option value=0>Please select Your Child Class</option>
                  <option value=1>First Class</option>
                  <option value=2>Second Class</option>
                  <option value=3>Third Class</option>
                  <option value=4>Foruth Class</option>
                  <option value=5>Fifth Class</option>
                  <option value=6>Sixth Class</option>
                  <option value=7>Seventh Class</option>
                  <option value=8>Eighth Class</option>
                  <option value=9>Ninth Class</option>
                  <option value=10>Tenth Class</option>

                </select>
                
            </div>
           
            <div class="nice-form-group">
                <label>Section</label>
                <input name="sec" type="text" placeholder="Child Section" />
            </div>
            
            <div class="nice-form-group">
            <label>File upload</label>
            <input type="file" name="photo" />
            </div>

            <fieldset class="nice-form-group">
                <legend>Child Gender</legend>
                <div class="nice-form-group">
                  <input name="gender" type="radio" name="gender" id="boy" value=2 />
                  <label for="boy">Boy</label>
                </div>
        
                <div class="nice-form-group">
                  <input name="gender" type="radio" name="gender" id="girl" value=1 />
                  <label for="girl">Girl</label>
                </div>

              </fieldset>

          </section>
          <section id="Address">
            <div class="href-target" id="structure"></div>
            <h1>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2" />
                <polyline points="2 17 12 22 22 17" />
                <polyline points="2 12 12 17 22 12" />
              </svg>
              House Address
            </h1>
            <p>Detail Address of the house to collect Lunch Box</p>
      
            <div class="nice-form-group">
              <label>Area</label>
              <input name="area" type="text" placeholder="Your Area" />
            </div>
              
              <div class="nice-form-group">
                <label>Appartment</label>
                <input name="appartment" type="text" placeholder="Your Appartment" />
              </div>

              <div class="nice-form-group">
                <label>Door No and Address</label>
                <input name="doorno" type="text" placeholder="Your Door No and Address" />
              </div>

              <div class="nice-form-group">
                <label>Pincode</label>
                <input name="pincode" type="text" placeholder="Your Pincode" />
              </div>

            <details>
                <summary>
                    <button type="submit" name="submit" class="toggle-code" >submit</button>
                </summary>
            </details>
            
          </section>
          
          
      </section>

            </form>
      
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