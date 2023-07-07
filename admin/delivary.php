<!DOCTYPE html>
<?php
session_start();
if(empty($_SESSION['eid']))
{
    header("location:login.php");
} 
include("connect.php");
$eid=$_SESSION['eid'];
$run1 = mysqli_fetch_assoc(mysqli_query($con,"select * from team where eid='$eid'"));
$run2 = mysqli_query($con,"select * from subscriptions where delivery_partner='$eid'");
?>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="Bhavani/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="Bhavani/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="Bhavani/css/demo.css" />
    <link rel="stylesheet" href="Bhavani/css/style.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="Bhavani/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="Bhavani/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="Bhavani/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <span class="app-brand-logo demo">
              <img src="Bhavani/img/logo.png" alt="Lunch Box" class="img-fluid" />
            </span>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item ">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user "></i>
                <div data-i18n="Analytics">Profile</div>
              </a>
            </li>
            <li class="menu-item ">
              <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-baidu "></i>
                <div data-i18n="Analytics">Students</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <h2 style="padding-top: 18px;">Lunch Box</h2>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="Bhavani/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="Bhavani/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bxl-baidu me-2"></i>
                        <span class="align-middle">Students</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->     
            <div class="container-xxl flex-grow-1 container-p-y">

              <div class="row">
                <div class="row" id="profile">
                  <?php
                    if(mysqli_num_rows($run2)>0){
                      while($row = mysqli_fetch_assoc($run2)){
                        $run3 = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid='{$row['stdid']}'"));
                        $run4 = mysqli_fetch_assoc(mysqli_query($con,"select * from schools where sid='{$run3['school']}'"));
                        $date = date("Y-m-d");
                        $run5 = mysqli_query($con,"select * from delivary where stdid='{$row['stdid']}' and date='$date'");
                        $run7 = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid='{$row['pid']}'"));
                        ?>
                      <section style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                      <div class="container-fluid">
                          <div style=" display:flex; flex-direction:row; flex-wrap: wrap; ">
                              <div>
                                  <img src="../Upload/<?php echo $run3['photo'] ?>" width="200px" height="200px" style="border-radius:10px; ">
                               </div>
                              <div class="p-1" style="padding-left: 0px; ">
                              <p class="mb-0"><?php echo $run3['sname'] ?>  <br>
                              <?php 
                                if(mysqli_num_rows($run5) == 0){echo "<small style='color: red;' >Not Picked </small>";}
                                else{
                                  $run6 = mysqli_fetch_assoc(mysqli_query($con,"select * from trips where tripid='{$run5['tripid']}'"));
                                  if($run5['status'] == 0)
                                  echo "<small style='color: Yellow;' >In Transtion </small>";
                                  else if($run5['status'] == 1)
                                  echo "<small style='color: Green;' >Delivered </small>";
                                }
                                ?>
                              </p>
                              <h><?php echo $run4['school_name'] ?></h><br>
                              
                              <h><a href="<?php echo $run7['address'] ?>"><button type="button" class="btn btn-secondary">Address</button></a> <span class="m-5"><a href="tel:<?php echo $row['pid'] ?>"><button type="button" class="btn btn-info">Call</button></a></span> </h><br> <br>
                              <?php 
                                if(mysqli_num_rows($run5) != 0){
                                  $run6 = mysqli_fetch_assoc(mysqli_query($con,"select * from trips where tripid='{$run5['tripid']}'"));
                                  if($run5['status'] == 0)
                                  echo "<h>picked up @".$run6['pickup_time']." </h><br>";
                                  else if($run5['status'] == 1)
                                  echo "<h>picked up @".$run6['pickup_time']." </h><br>";
                                  echo "<h><h>Droped @".$run6['drop_time']." </h><br>";
                                }
                                ?>
                              <h>
                              <?php 
                                if(mysqli_num_rows($run5) == 0){
                                  echo "<a  onclick='change_status({$row['stdid']},$eid);'><button type='button' class='btn btn-success' onclick='change_status({$row['stdid']},$eid)'>Pickup</button></a>";
                                }
                                else{
                                  $run6 = mysqli_fetch_assoc(mysqli_query($con,"select * from trips where tripid='{$run5['tripid']}'"));
                                  if($run5['status'] == 0)
                                  echo "<a  onclick='change_status({$row['stdid']},$eid)' ><button type='button' class='btn btn-warning'>Drop Out</button></a>";
                                  else if($run5['status'] == 1)
                                  echo "<h3 style='color: green;'>Your Box was Delivered </h3>";
                                }
                                ?>
                              </h>
                              </div>  
                          </div>
                      </div>
                  </section>
                        <?php
                          }
                            }
                          ?>
                </div>
            </div>
              <!-- <span class="badge bg-label-primary me-1">Active</span>
              <span class="badge bg-label-success me-1">Completed</span>
              <span class="badge bg-label-info me-1">Scheduled</span>
              <span class="badge bg-label-warning me-1">Pending</span> -->
              
            </div>

            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://saipraveen.tech" target="_blank" class="footer-link fw-bolder">Sai Praveen</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js vendor/js/core.js -->
    <script src="Bhavani/vendor/libs/jquery/jquery.js"></script>
    <script src="Bhavani/vendor/libs/popper/popper.js"></script>
    <script src="Bhavani/vendor/js/bootstrap.js"></script>
    <script src="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="Bhavani/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="Bhavani/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="Bhavani/js/main.js"></script>

    <!-- Page JS -->
    <script src="Bhavani/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      function change_status(stdid,eid){
        alert("Function Called"+stdid+" "+eid);
        // axaj call to pickup.php
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           console.log(this.responseText);
          }
        };
        xhttp.open("POST", "update_status.php", true);
        var data = "stdid="+stdid+"&eid="+eid;
        xhttp.send(data);
      }
    </script>
  </body>
</html>
