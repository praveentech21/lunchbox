<?php
  session_start();
  // Calculation for this Month
  if(empty($_SESSION['supid'])) header("location: login.php");
  include("connect.php");
  $subscriptions = mysqli_query($con,"select *,count(*) from subscriptions");
  $team = mysqli_query($con,"select * from team");
  $date = date("Y-m-d");
  $total_scbscriptions = mysqli_fetch_assoc($subscriptions)['count(*)'];
  $total_not_pickes = 0;
  $total_In_Transtion = 0;
  $total_Delivered = 0;
  $not_picked_students = mysqli_query($con,"select * from subscriptions where stdid not in (select stdid from delivary where date='$date')");
  $picked_students = mysqli_query($con,"select * from delivary where date='$date'");

  // Calculation for this Month agent Report
  $this_month = date("m");
  $this_year = date("Y");
  $this_month_working_days = mysqli_num_rows(mysqli_query($con,"SELECT count(*) FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY date; "));

  // Calculation for day to day analysis

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

    <title>Lunch Box Dashboard</title>

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
          <div class="app-brand demo ">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Lunch Box</span>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            
            <!-- Layouts -->
            <li class="menu-item active">
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
                <li class="menu-item">
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
            <!-- Today Report Starts Here Shiva -->
            <div class="row">
                
                
                <!-- Today Delivary Agent Report Starts Here Shiva -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                  <h5 class="card-header">Today Delivary Agent Report</h5>
                  <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Agent Name</th>
                          <th>Mobile</th>
                          <th>Not Picked Up </th>
                          <th>In Transition</th>
                          <th>Delivered</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($row = mysqli_fetch_assoc($team)){
                            $run1 = mysqli_query($con,"select count(*) from trips where delivery_by='{$row['eid']}' and date='$date'");
                            $total_scbscriptions_of_agent = mysqli_fetch_assoc(mysqli_query($con,"select count(*) from subscriptions where delivery_partner='{$row['eid']}'"))['count(*)'];
                            $pickedup = mysqli_fetch_assoc($run1)['count(*)'];
                            $not_picked =$total_scbscriptions_of_agent - $pickedup;
                            $In_Transtion = mysqli_fetch_assoc(mysqli_query($con,"select *,count(*) from trips where delivery_by='{$row['eid']}' and date='$date' and drop_time is null"))['count(*)'];
                            $Delivered =$pickedup - $In_Transtion;
                            $total_not_pickes += $not_picked;
                            $total_In_Transtion += $In_Transtion;
                            $total_Delivered += $Delivered;
                        ?>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['name'] ?></strong></td>
                          <td><a href="tel:<?php echo $row['mobile'] ?>"><?php echo $row['mobile'] ?></a></td>
                          <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Boxes</span></td>
                          <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Boxes</span></td>
                          <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?> Boxes</span></td>
                        </tr>
                        <?php }
                            $not_picked_percentage = ($total_not_pickes/$total_scbscriptions)*100;
                            $In_Transtion_percentage = ($total_In_Transtion/$total_scbscriptions)*100;
                            $Delivered_percentage = ($total_Delivered/$total_scbscriptions)*100;
                        ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  </div>
                </div>
                <!--/ Today Delivary Agent Report Ends Here Shiva -->
                <!-- Data Cards Here Shiva -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </div>
                          </div>
                          <span class="d-block mb-1">Not Picked Up</span>
                          <h3 class="card-title text-nowrap mb-2"><?php echo $total_not_pickes; ?> Boxes</h3>
                          <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> <?php echo $not_picked_percentage ?> %</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/cc-warning.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">In Transition</span>
                          <h3 class="card-title mb-2"><?php echo $total_In_Transtion; ?> Boxes</h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> <?php echo $In_Transtion_percentage; ?> %</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/cc-success.png" alt="Credit Card" class="rounded" />
                            </div>
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Delivered Boxes</h5>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> <?php echo $Delivered_percentage; ?> %</small>
                                <h3 class="mb-0"><?php echo $total_Delivered; ?> Boxes</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Data Cards Here Shiva -->
            </div>
            <!-- Today Report Ends Here Shiva -->
              <!-- Boxes Details starts Here Shiva -->
              <div class="row">
                <!-- Not Picked Boxes -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Not Picked Boxes</h5>
                    </div>
                    <?php 
                      foreach($not_picked_students as $stdid){
                        $run1 = mysqli_fetch_assoc(mysqli_query($con,"select pid from subscriptions where stdid='{$stdid['stdid']}'"));
                        $run2 = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid='{$run1['pid']}'"));
                        $run3 = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid='{$stdid['stdid']}'"));
                    ?>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../Upload/<?php echo $run3['photo'] ?>" height="76px" width="76px" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1"><?php echo $run3['sname'] ?></small>
                              <h6 class="mb-0"><?php echo $run2['pname'] ?></h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <a href="tel:<?php echo $run2['pid'] ?>"><button type="button" class="btn btn-info">Call</button></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <?php } ?>
                </div>
                </div>
                <!--/ Not Picked Boxes -->

                <!-- In Transition Boxes -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">In Transition Boxes</h5>
                    </div>
                    <?php 
                      foreach($picked_students as $stdid){
                        if($stdid['status'] == 0) {
                        $run1 = mysqli_fetch_assoc(mysqli_query($con,"select pid from subscriptions where stdid='{$stdid['stdid']}'"));
                        $run2 = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid='{$run1['pid']}'"));
                        $run3 = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid='{$stdid['stdid']}'"));
                    ?>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../Upload/<?php echo $run3['photo'] ?>" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1"><?php echo $run3['sname'] ?></small>
                              <h6 class="mb-0"><?php echo $run2['pname'] ?></h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <a href="tel:<?php echo $run2['pid'] ?>"><button type="button" class="btn btn-info">call</button></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <?php }} ?>
                  </div>
                </div>
                <!--/ In Transition Boxes -->

                <!-- Delivered Boxes -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Delivered Boxes</h5>
                    </div>
                    <?php 
                      foreach($picked_students as $stdid){
                        if($stdid['status'] == 1) {
                        $run1 = mysqli_fetch_assoc(mysqli_query($con,"select pid from subscriptions where stdid='{$stdid['stdid']}'"));
                        $run2 = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid='{$run1['pid']}'"));
                        $run3 = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid='{$stdid['stdid']}'"));
                    ?>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../Upload/<?php echo $run3['photo'] ?>" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1"><?php echo $run3['sname'] ?></small>
                              <h6 class="mb-0"><?php echo $run2['pname'] ?></h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <a href="tel:<?php echo $run2['pid'] ?>"><button type="button" class="btn btn-info">call</button></a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <?php }} ?>
                  </div>
                </div>
                <!--/ Delivered Boxes -->
              </div> 
              <!--/ Boxes Details ends Here Shiva -->   

            <!-- This Month Delivery Agent Report Starts Here Shiva -->
            <hr class="my-5" />
            <div class="card">  
                <h5 class="card-header">This Month Delivery Agent Report</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Agent Name</th>
                        <th>Mobile Number</th>
                        <th>Not Picked</th>
                        <th>In Transition</th>
                        <th>Delivared</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $delivery_team = mysqli_query($con,"select * from team");
                        while($row1 = mysqli_fetch_assoc($delivery_team)){
                          $run1 = mysqli_query($con,"select count(*) from trips where delivery_by='{$row1['eid']}' and month(date)='$this_month' and year(date)='$this_year'");
                          $total_scbscriptions_of_agent = mysqli_fetch_assoc(mysqli_query($con,"select count(*) from subscriptions where delivery_partner='{$row1['eid']}'"))['count(*)'];
                          $pickedup = mysqli_fetch_assoc($run1)['count(*)'];
                          $not_picked =($total_scbscriptions_of_agent * $this_month_working_days) - $pickedup;
                          $In_Transtion = mysqli_fetch_assoc(mysqli_query($con,"select *,count(*) from trips where delivery_by='{$row1['eid']}' and month(date)='$this_month' and year(date)='$this_year' and drop_time is null"))['count(*)'];
                          $Delivered =$pickedup - $In_Transtion;
                          $delivery_agent = mysqli_fetch_assoc(mysqli_query($con,"select * from team where eid='{$row1['eid']}'"));
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $delivery_agent['name'] ?></strong></td>
                        <td><a href="tel:<?php echo $delivery_agent['mobile'] ?>"></a><?php echo $delivery_agent['mobile'] ?></td>
                        <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Boxes</span></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Boxes</span></td>
                        <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?> Boxes</span></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
            <hr class="my-5" />
              <!--/ This Month Delivery Agent Report Ends Here Shiva -->

              <!-- Monthly Report Starts Here Shiva -->

              <div class="row">
                <!-- Day to Day Delivery Analysis -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                  <h5 class="card-header">Day to Day Delivery Analysis</h5>
                  <div class="card-body">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Not Picked Up </th>
                            <th>In Transition</th>
                            <th>Delivered</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $day_to_day = mysqli_query($con,"select *,count(*) from delivary where month(date)='$this_month' and year(date)='$this_year' group by date order by date asc");
                            while($row = mysqli_fetch_assoc($day_to_day)){
                              $pickedup = $row['count(*)'];
                              $not_picked =$total_scbscriptions - $pickedup;
                              $In_Transtion = mysqli_fetch_assoc(mysqli_query($con,"select count(*) from delivary where date = '{$row['date']}' and status = 0"))['count(*)'];
                              $Delivered =$pickedup - $In_Transtion;

                          ?>
                          <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['date'] ?></strong></td>
                            <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Boxes</span></td>
                            <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Boxes</span></td>
                            <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?> Boxes</span></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
                <!--/ Day to Day Delivery Analysis -->

                <!-- Subscribed Parents -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-12 mb-4">
                      <div class="card">
                      <h5 class="card-header">Subscribed Parents</h5>
                        <div class="card-body">
                        <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Parent Name</th>
                          <th>No of Child</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $subscribed_parents = mysqli_query($con,"select *,count(*) from subscriptions group by pid");
                          while($row = mysqli_fetch_assoc($subscribed_parents)){
                            $run1 = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid='{$row['pid']}'"));
                        ?>
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $run1['pname'] ?></strong></td>
                          <td><span class="badge bg-label-info me-1"><?php echo $row['count(*)'] ?> Childs</span></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Subscribed Parents -->

                
                <!-- Student Wise Deliverary Analysis -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                  <h5 class="card-header">Student Wise Deliverary Analysis</h5>
                  <div class="card-body">
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Student Name</th>
                            <th>Not Picked Up </th> 
                            <th>In Transition</th>
                            <th>Delivered</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $student_wise = mysqli_query($con,"select * from student ");
                            while($row = mysqli_fetch_assoc($student_wise)){
                              $run1 = mysqli_fetch_assoc(mysqli_query($con,"select status,count(*) from delivary where stdid='{$row['stdid']}'"));
                              $pickedup = $run1['count(*)'];
                              $not_picked =$this_month_working_days - $pickedup;
                              $In_Transtion = mysqli_fetch_assoc(mysqli_query($con,"select count(*) from delivary where stdid = '{$row['stdid']}' and status = 0"))['count(*)'];
                              $Delivered =$pickedup - $In_Transtion;
                          ?>
                          <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['sname'] ?></strong></td>
                            <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Pending</span></td>
                            <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Active</span></td>
                            <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?> Scheduled</span></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
                <!--/ Student Wise Deliverary Analysis -->
                
            </div>
            <!--/ Monthly Report Ends Here Shiva -->
              
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
