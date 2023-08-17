<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
// Calculation for this Month agent Report
$this_month = date("m");
$this_year = date("Y");
$this_month_working_days = mysqli_num_rows(mysqli_query($con, "SELECT count(*) FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY date; "));

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
      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">Subscribed Parent Details</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Area</th>
                <th>Delivery Agent</th>
                <th>Not Picked Up</th>
                <th>In Transtion</th>
                <th>Delivered</th>
                <th>View Profile</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $student_wise = mysqli_query($con, "select * from student");
              while ($row = mysqli_fetch_assoc($student_wise)) {
                $run1 = mysqli_fetch_assoc(mysqli_query($con, "select status,count(*) from delivary where stdid='{$row['stdid']}'"));
                $pickedup = $run1['count(*)'];
                $not_picked = $this_month_working_days - $pickedup;
                $In_Transtion = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from delivary where stdid = '{$row['stdid']}' and status = 0"))['count(*)'];
                $Delivered = $pickedup - $In_Transtion;
                $subscription = mysqli_fetch_assoc(mysqli_query($con, "select * from subscriptions where stdid = '{$row['stdid']}'"));
                $delivery_agent = mysqli_fetch_assoc(mysqli_query($con, "select name from team where eid = '{$subscription['delivery_partner']}'"));
                $address = mysqli_fetch_assoc(mysqli_query($con, "select area from address where pid = '{$subscription['pid']}'"));
              ?>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                    <strong><?php echo $row['sname'] ?></strong>
                  </td>
                  <td><?php echo $address['area'] ?></td>
                  <td><?php if(!empty($delivery_agent['name'])) echo $delivery_agent['name']; else echo "No Agent Allocated" ?></td>
                  <td><span class="badge bg-label-warning me-1"><?php echo $not_picked ?> Pending</span>
                  </td>
                  <td><span class="badge bg-label-primary me-1"><?php echo $In_Transtion ?> Active</span>
                  </td>
                  <td><span class="badge bg-label-success me-1"><?php echo $Delivered ?> Scheduled</span>
                  </td>
                  <td><a href="student_profile.php?stdid=<?php echo $row['stdid'] ?>"><span class="badge bg-label-info me-1">View Profile</span></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
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