<?php
  session_start();
  // Calculation for this Month
  if(empty($_SESSION['supid'])) header("location: login.php");
  include("connect.php");
  $delivery_team = mysqli_query($con,"select * from team");
?>
<!DOCTYPE html>
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

    <title>Delivary Agent Details</title></title>

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
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Lunch Box</span>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            
            <!-- Layouts -->
            <li class="menu-item ">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Our Leads</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Account Settings">Parents</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="parent_registration_details.php" class="menu-link">
                    <div data-i18n="Account">Parent Registrations</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="update_parent_details.php" class="menu-link">
                    <div data-i18n="Notifications">Update Parent Details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="update_parent_address.php" class="menu-link">
                    <div data-i18n="Connections">Update Parent Address</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <!-- Components -->
            <!-- <li class="menu-header small text-uppercase"> -->
              <!-- <span class="menu-header-text">Student Details</span></li> -->
            <!-- Cards -->
            <!-- User interface -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User interface">Students</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="all_student_list.php" class="menu-link">
                    <div data-i18n="Accordion">All Student Details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="student_wise_orders.php" class="menu-link">
                    <div data-i18n="Alerts">Student Wise Analysis</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="update_student_subscription.php" class="menu-link">
                    <div data-i18n="Badges">Update Subscription</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="allocate_delivary_agent.php" class="menu-link">
                    <div data-i18n="Typography">Allocating Delivary Agent</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Form Elements">Delivary</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="delivary_agent_details.php" class="menu-link">
                    <div data-i18n="Basic Inputs">Delivary Agent Details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="new_delivary_agent.php" class="menu-link">
                    <div data-i18n="Basic Inputs">New Delivary Agent</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="delivary_agent_report.php" class="menu-link">
                    <div data-i18n="Basic Inputs">Delivary Agent Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="updating_delivary_agent_link.php" class="menu-link">
                    <div data-i18n="Input groups">Update Agent Link</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <!-- Misc -->
            <!-- <li class="menu-header small text-uppercase"> -->
              <!-- <span class="menu-header-text">Schools</span></li> -->
              <li class="menu-item ">
                <a href="newschool.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                  <div data-i18n="Analytics">New School</div>
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
            id="layout-navbar" >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              
              <h3 style="padding-top: 20px;">Bhimavaram Online</h3>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="Bhavani/img/avatars/sureshsir.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="Bhavani/img/avatars/sureshsir.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Dr. Suresh Babu</span>
                            <small class="text-muted">Founder BVRMOL</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
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
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Delivary Agent Details</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Agent Name</th>
                          <th>Mobile</th>
                          <th>No of Boxes</th>
                          <th>Schools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($delivery_team)){
                            $boxes = mysqli_fetch_assoc(mysqli_query($con,"select count(*) from subscriptions where delivery_partner={$row['eid']}"));
                            $schools = mysqli_fetch_assoc(mysqli_query($con,"select DISTINCT school_name from schools where sid in (select sid from student where stdid in ( select stdid from subscriptions where delivery_partner = {$row['eid']}))"));
                        ?>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name'] ?></strong></td>
                          <td><?php echo $row['mobile'] ?></td>
                          <td><span class="badge bg-label-primary me-1"><?php echo $boxes['count(*)'] ?></span></td>
                          <td><?php foreach($schools as $school) echo $school.', '; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->

              <hr class="my-5" />

              <!-- Hoverable Table rows -->
              <h3 class="mb-0">Students to Delivery Agents</h3><br>
              <?php  
                $delivery_team = mysqli_query($con,"select * from team");
                while($row = mysqli_fetch_assoc($delivery_team)){
                  $students = mysqli_query($con,"select * from subscriptions where delivery_partner = {$row['eid']}");
              ?>
              <div class="card">
                <h5 class="card-header"><?php echo $row['name'] ?></h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Student Name</th>
                        <th>Parent Name</th>
                        <th>Parent Mobile</th>
                        <th>School</th>
                        <th>Area</th>
                        <th>View Profile</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        while($row1 = mysqli_fetch_assoc($students)){
                          $student = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid = {$row1['stdid']}"));
                          $parent = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid = {$row1['pid']}"));
                          $address = mysqli_fetch_assoc(mysqli_query($con,"select area from address where pid = {$row1['pid']}"));
                          $school = mysqli_fetch_assoc(mysqli_query($con,"select school_name from schools where sid = {$student['school']}"));
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $student['sname'] ?></strong></td>
                        <td><?php echo $parent['pname'] ?></td>
                        <td><a href="tel:<?php echo $parent['pid'] ?>"><?php echo $parent['pid'] ?></a></td>
                        <td><span class="badge bg-label-success me-1"><?php echo $school['school_name'] ?></span></td>
                        <td><?php echo $address['area'] ?></td>
                        <td><a href=""><span class="badge bg-label-info me-1">View Profile</span></a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <br>
              <?php } ?>
              
              <!--/ Hoverable Table rows -->
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
                  <a href="https://github.com/praveentech21" target="_blank" class="footer-link fw-bolder">Sai Praveen</a>
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

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
  </body>
</html>
