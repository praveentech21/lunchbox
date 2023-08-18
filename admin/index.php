<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$subscriptions = mysqli_query($con, "select *,count(*) from subscriptions");
$team = mysqli_query($con, "select * from team");
$date = date("Y-m-d");
$total_scbscriptions = mysqli_fetch_assoc($subscriptions)['count(*)'];
$total_not_pickes = 0;
$total_In_Transtion = 0;
$total_Delivered = 0;
$not_picked_students = mysqli_query($con, "select * from subscriptions where stdid not in (select stdid from delivary where date='$date')");
$picked_students = mysqli_query($con, "select * from delivary where date='$date'");

// Calculation for this Month agent Report
$this_month = date("m");
$this_year = date("Y");
$this_month_working_days = mysqli_num_rows(mysqli_query($con, "SELECT count(*) FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY date; "));

// Calculation for day to day analysis

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
  <?php include 'bhavani.php'; ?>
</head>

<body>
  <?php include 'header.php'; ?>

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
                    while ($row = mysqli_fetch_assoc($team)) {
                      $run1 = mysqli_query($con, "select count(*) from trips where delivery_by='{$row['eid']}' and date='$date'");
                      $total_scbscriptions_of_agent = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner='{$row['eid']}'"))['count(*)'];
                      $pickedup = mysqli_fetch_assoc($run1)['count(*)'];
                      $not_picked = $total_scbscriptions_of_agent - $pickedup;
                      $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select *,count(*) from trips where delivery_by='{$row['eid']}' and date='$date' and drop_time is null"))['count(*)'];
                      $Delivered = $pickedup - $In_Transtion;
                      $total_not_pickes += $not_picked;
                      $total_In_Transtion += $In_Transtion;
                      $total_Delivered += $Delivered;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong><?php echo $row['name'] ?></strong>
                        </td>
                        <td><a href="tel:<?php echo $row['mobile'] ?>"><?php echo $row['mobile'] ?></a>
                        </td>
                        <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?>
                            Boxes</span></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?>
                            Boxes</span></td>
                        <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?>
                            Boxes</span></td>
                      </tr>
                    <?php }
                    $not_picked_percentage = ($total_not_pickes / $total_scbscriptions) * 100;
                    $In_Transtion_percentage = ($total_In_Transtion / $total_scbscriptions) * 100;
                    $Delivered_percentage = ($total_Delivered / $total_scbscriptions) * 100;
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
                  <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                    <?php echo $not_picked_percentage ?> %</small>
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
                  <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                    <?php echo $In_Transtion_percentage; ?> %</small>
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
                        <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
                          <?php echo $Delivered_percentage; ?> %</small>
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
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4" style="height: 500px; overflow:hidden">
          <div class="card h-100" style=" overflow-y: auto;">
            <div div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Not Picked Boxes</h5>
            </div>
            <?php
            foreach ($not_picked_students as $stdid) {
              $run1 = mysqli_fetch_assoc(mysqli_query($con, "select pid from subscriptions where stdid='{$stdid['stdid']}'"));
              $run2 = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid='{$run1['pid']}'"));
              $run3 = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid='{$stdid['stdid']}'"));
            ?>
              <div class="card-body" style="padding-bottom :0%" >
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
        <div class="col-md-6 col-lg-4 order-1 mb-4" style="height: 500px; overflow:hidden">
          <div class="card h-100" style=" overflow-y: auto;">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">In Transition Boxes</h5>
            </div>
            <?php
            foreach ($picked_students as $stdid) {
              if ($stdid['status'] == 0) {
                $run1 = mysqli_fetch_assoc(mysqli_query($con, "select pid from subscriptions where stdid='{$stdid['stdid']}'"));
                $run2 = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid='{$run1['pid']}'"));
                $run3 = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid='{$stdid['stdid']}'"));
            ?>
                <div class="card-body" style="padding-bottom :0%">
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
            <?php }
            } ?>
          </div>
        </div>
        <!--/ In Transition Boxes -->

        <!-- Delivered Boxes -->
        <div class="col-md-6 col-lg-4 order-2 mb-4" style="height: 500px; overflow:hidden">
          <div class="card h-100"  style=" overflow-y: auto;">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="card-title m-0 me-2">Delivered Boxes</h5>
            </div>
            <?php
            foreach ($picked_students as $stdid) {
              if ($stdid['status'] == 1) {
                $run1 = mysqli_fetch_assoc(mysqli_query($con, "select pid from subscriptions where stdid='{$stdid['stdid']}'"));
                $run2 = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid='{$run1['pid']}'"));
                $run3 = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid='{$stdid['stdid']}'"));
            ?>
                <div class="card-body" style="padding-bottom :0%">
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
            <?php }
            } ?>
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
                <th>No of Boxes</th>
                <th>Not Picked</th>
                <th>In Transition</th>
                <th>Delivared</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $delivery_team = mysqli_query($con, "select * from team");
              while ($row1 = mysqli_fetch_assoc($delivery_team)) {
                $no_of_boxes = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner='{$row1['eid']}'"))['count(*)'];
                $run1 = mysqli_query($con, "select count(*) from trips where delivery_by='{$row1['eid']}' and month(date)='$this_month' and year(date)='$this_year'");
                $total_scbscriptions_of_agent = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner='{$row1['eid']}'"))['count(*)'];
                $pickedup = mysqli_fetch_assoc($run1)['count(*)'];
                $not_picked = ($total_scbscriptions_of_agent * $this_month_working_days) - $pickedup;
                $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select *,count(*) from trips where delivery_by='{$row1['eid']}' and month(date)='$this_month' and year(date)='$this_year' and drop_time is null"))['count(*)'];
                $Delivered = $pickedup - $In_Transtion;
                $delivery_agent = mysqli_fetch_assoc(mysqli_query($con, "select * from team where eid='{$row1['eid']}'"));
              ?>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                    <strong><?php echo $delivery_agent['name'] ?></strong>
                  </td>
                  <td><a href="tel:<?php echo $delivery_agent['mobile'] ?>"><?php echo $delivery_agent['mobile'] ?></a>
                  </td>
                    <td><span class="badge bg-label-info me-1"><?php echo $no_of_boxes ?> Boxes</span>  
                  <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Boxes</span>
                  </td>
                  <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Boxes</span>
                  </td>
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

      <div class="row" >
        <!-- This Month Day to Day Delivery Analysis -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <h5 class="card-header">This Month Day to Day Delivery Analysis</h5>
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
                    $day_to_day = mysqli_query($con, "select *,count(*) from delivary where month(date)='$this_month' and year(date)='$this_year' group by date order by date asc");
                    while ($row = mysqli_fetch_assoc($day_to_day)) {
                      $pickedup = $row['count(*)'];
                      $not_picked = $total_scbscriptions - $pickedup;
                      $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from delivary where date = '{$row['date']}' and status = 0"))['count(*)'];
                      $Delivered = $pickedup - $In_Transtion;

                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong><?php echo $row['date'] ?></strong>
                        </td>
                        <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?>
                            Boxes</span></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?>
                            Boxes</span></td>
                        <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?>
                            Boxes</span></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <br>
          <div class="card">
            <h5 class="card-header">This Month Student Wise Deliverary Analysis</h5>
            <div class="card-body">
              <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>Student Name</th>
                    <th>Delivery Agent</th>
                      <th>Not Picked Up </th>
                      <th>In Transition</th>
                      <th>Delivered</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $student_wise = mysqli_query($con, "select * from student ");
                    while ($row = mysqli_fetch_assoc($student_wise)) {
                      $subscriptions_datails = mysqli_fetch_assoc(mysqli_query($con, "select delivery_partner from subscriptions where stdid='{$row['stdid']}'"));
                      $delivery_agent_name = mysqli_fetch_assoc(mysqli_query($con, "select name from team where eid='{$subscriptions_datails['delivery_partner']}'"))['name'];
                      $run1 = mysqli_fetch_assoc(mysqli_query($con, "select status,count(*) from delivary where stdid='{$row['stdid']}'"));
                      $pickedup = $run1['count(*)'];
                      $not_picked = $this_month_working_days - $pickedup;
                      $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from delivary where stdid = '{$row['stdid']}' and status = 0"))['count(*)'];
                      $Delivered = $pickedup - $In_Transtion;
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong><?php echo $row['sname'] ?></strong>
                        </td>
                        <td><?php if(!empty($delivery_agent_name)) echo $delivery_agent_name; else echo "No Agent allocated till Now" ?></td>
                        <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?>
                            Pending</span></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?>
                            Active</span></td>
                        <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?>
                            Scheduled</span></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!--/ This Month Day to Day Delivery Analysis -->

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
                        $subscribed_parents = mysqli_query($con, "select *,count(*) from subscriptions group by pid ORDER BY COUNT(*) DESC");
                        while ($row = mysqli_fetch_assoc($subscribed_parents)) {
                          $run1 = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid='{$row['pid']}'"));
                        ?>
                          <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                              <strong><?php echo $run1['pname'] ?></strong>
                            </td>
                            <td><span class="badge bg-label-info me-1"><?php echo $row['count(*)'] ?>
                                Childs</span></td>
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
        <!--/ Student Wise Deliverary Analysis -->

      </div>
      <!--/ Monthly Report Ends Here Shiva -->

    <!-- </div> -->
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
          <a href="https://github.com/praveentech21" target="_blank" class="footer-link fw-bolder">Sai
            Praveen</a>
        </div>

      </div>
    </footer>
    <!-- / Footer -->

  </div>
  <!-- Content wrapper -->

  <?php include 'fotter.php'; ?>
</body>

</html>