<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$this_month = date("m");
$this_year = date("Y");
$total_scbscriptions = mysqli_fetch_assoc(mysqli_query($con, "select *,count(*) from subscriptions"))['count(*)'];
$this_month_working_days = mysqli_num_rows(mysqli_query($con, "SELECT count(*) FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY date; "));
$total_not_picked = 0;
$total_in_transition = 0;
$total_delivered = 0;

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
      <div class="row">
        <div class="row">


          <!-- Total Revenue -->
          <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
              <h5 class="card-header">Monthly Delivary Agent Report</h5>
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
                      $delivery_team = mysqli_query($con, "select * from team");
                      while ($row1 = mysqli_fetch_assoc($delivery_team)) {
                        $run1 = mysqli_query($con, "select count(*) from trips where delivery_by='{$row1['eid']}' and month(date)='$this_month' and year(date)='$this_year'");
                        $total_scbscriptions_of_agent = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner='{$row1['eid']}'"))['count(*)'];
                        $pickedup = mysqli_fetch_assoc($run1)['count(*)'];
                        $not_picked = ($total_scbscriptions_of_agent * $this_month_working_days) - $pickedup;
                        $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select *,count(*) from trips where delivery_by='{$row1['eid']}' and month(date)='$this_month' and year(date)='$this_year' and drop_time is null"))['count(*)'];
                        $Delivered = $pickedup - $In_Transtion;
                        $delivery_agent = mysqli_fetch_assoc(mysqli_query($con, "select * from team where eid='{$row1['eid']}'"));
                        $total_delivered += $Delivered;
                        $total_in_transition += $In_Transtion;
                        $total_not_picked += $not_picked;
                        $not_picked_percentage = ($total_not_picked / $total_scbscriptions) * 100;
                        $In_Transtion_percentage = ($total_in_transition / $total_scbscriptions) * 100;
                        $Delivered_percentage = ($total_delivered / $total_scbscriptions) * 100;
                      ?>

                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong><?php echo $delivery_agent['name'] ?></strong>
                          </td>
                          <td><a href="tel: <?php echo $delivery_agent['mobile'] ?>"><?php echo $delivery_agent['mobile'] ?></a>
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
          </div>
          <!--/ Total Revenue -->

          <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
              <div class="col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="BHavani/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                      </div>
                      <!-- <div class="dropdown">
                                <button
                                  class="btn p-0"
                                  type="button"
                                  id="cardOpt4"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                > -->
                      <i class="bx bx-dots-vertical-rounded"></i>
                      <!-- </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div> -->
                    </div>
                    <span class="d-block mb-1">Not Picked Up</span>
                    <h3 class="card-title text-nowrap mb-2"><?php echo $total_not_picked ?> Boxes
                    </h3>
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
                        <img src="BHavani/img/icons/unicons/cc-warning.png" alt="Credit Card" class="rounded" />
                      </div>
                      <!-- <div class="dropdown">
                                <button
                                  class="btn p-0"
                                  type="button"
                                  id="cardOpt4"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                > -->
                      <i class="bx bx-dots-vertical-rounded"></i>
                      <!-- </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div> -->
                    </div>
                    <span class="fw-semibold d-block mb-1">In Transition</span>
                    <h3 class="card-title mb-2"><?php echo $total_in_transition ?> Boxes</h3>
                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                      <?php echo $In_Transtion_percentage ?> %</small>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                      <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <img src="BHavani/img/icons/unicons/cc-success.png" alt="Credit Card" class="rounded" />
                        </div>
                        <div class="card-title">
                          <h5 class="text-nowrap mb-2">Delivered Boxes</h5>
                        </div>
                        <div class="mt-sm-auto">
                          <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
                            <?php echo $Delivered_percentage ?> %</small>
                          <h3 class="mb-0"><?php echo $total_delivered  ?>Boxes</h3>
                        </div>
                      </div>
                      <div id="profileReportChart"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <hr class="my-5" />
      <?php
      $delivery_team = mysqli_query($con, "select * from team");
      while ($row1 = mysqli_fetch_assoc($delivery_team)) {
        $students = mysqli_query($con, "select * from subscriptions where delivery_partner = {$row1['eid']}");
        $total_boxes_assigned = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner = {$row1['eid']}"))['count(*)'];
      ?>

        <h3 class="mb-0"><?php echo $row1['name'] ?></h3><br>

        <div class="card">
          <h5 class="card-header">Day to Day Delivery Report </h5>
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Date </th>
                  <th>Day</th>
                  <th>Not Picked</th>
                  <th>In Transition</th>
                  <th>Delivared</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $day_to_day = mysqli_query($con, "select *,count(*) from delivary where tripid in (select tripid from trips where delivery_by = {$row1['eid']}) and month(date)='$this_month' and year(date)='$this_year' group by date order by date asc");
                while ($row = mysqli_fetch_assoc($day_to_day)) {
                  $pickedup = $row['count(*)'];
                  $not_picked = $total_boxes_assigned - $pickedup;
                  $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from delivary where tripid in(select tripid from trips where delivery_by = {$row1['eid']} ) and date = '{$row['date']}' and status = 0"))['count(*)'];
                  $Delivered = $pickedup - $In_Transtion;
                ?>

                  <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                      <strong><?php echo $row['date'] ?></strong>
                    </td>
                    <td>Albert Cook</td>
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
        </div> <br>

        <div class="card">
          <h5 class="card-header">Student Wise Report</h5>
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Parent Name</th>
                  <th>Not Picked</th>
                  <th>In Transition</th>
                  <th>Delivared</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $student_wise = mysqli_query($con, "select * from student where stdid in (select stdid from subscriptions where delivery_partner = {$row1['eid']}) ");
                while ($row = mysqli_fetch_assoc($student_wise)) {
                  $subscriptions = mysqli_fetch_assoc(mysqli_query($con, "select pid from subscriptions where stdid ='{$row['stdid']}' "));
                  $parent = mysqli_fetch_assoc(mysqli_query($con, "select pname from parent where pid = '{$subscriptions['pid']}'"));
                  $run1 = mysqli_fetch_assoc(mysqli_query($con, "select status,count(*) from delivary where stdid='{$row['stdid']}'"));
                  $pickedup = $run1['count(*)'];
                  $not_picked = $total_boxes_assigned - $pickedup;
                  $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from delivary where stdid = '{$row['stdid']}' and status = 0 and month(date)='$this_month' and year(date)='$this_year'"))['count(*)'];
                  $Delivered = $pickedup - $In_Transtion;
                ?>
                  <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                      <strong><?php echo $row['sname'] ?></strong>
                    </td>
                    <td><?php echo $parent['pname'] ?></td>
                    <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Pending</span>
                    </td>
                    <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Active</span>
                    </td>
                    <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?> Completed</span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <hr class="my-5" />
      <?php } ?>



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