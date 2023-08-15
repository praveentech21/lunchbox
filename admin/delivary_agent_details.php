<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$delivery_team = mysqli_query($con, "select * from team");
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
                while ($row = mysqli_fetch_assoc($delivery_team)) {
                  $boxes = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner={$row['eid']}"));
                  $schools = mysqli_fetch_assoc(mysqli_query($con, "select DISTINCT school_name from schools where sid in (select sid from student where stdid in ( select stdid from subscriptions where delivery_partner = {$row['eid']}))"));
                ?>
                  <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                      <strong><?php echo $row['name'] ?></strong>
                    </td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><span class="badge bg-label-primary me-1"><?php echo $boxes['count(*)'] ?></span>
                    </td>
                    <td><?php foreach ($schools as $school) echo $school . ', '; ?></td>
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
      $delivery_team = mysqli_query($con, "select * from team");
      while ($row = mysqli_fetch_assoc($delivery_team)) {
        $students = mysqli_query($con, "select * from subscriptions where delivery_partner = {$row['eid']}");
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
                while ($row1 = mysqli_fetch_assoc($students)) {
                  $student = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid = {$row1['stdid']}"));
                  $parent = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid = {$row1['pid']}"));
                  $address = mysqli_fetch_assoc(mysqli_query($con, "select area from address where pid = {$row1['pid']}"));
                  $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid = {$student['school']}"));
                ?>
                  <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                      <strong><?php echo $student['sname'] ?></strong>
                    </td>
                    <td><?php echo $parent['pname'] ?></td>
                    <td><a href="tel:<?php echo $parent['pid'] ?>"><?php echo $parent['pid'] ?></a></td>
                    <td><span class="badge bg-label-success me-1"><?php echo $school['school_name'] ?></span>
                    </td>
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