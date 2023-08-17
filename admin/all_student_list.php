<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$students = mysqli_query($con, "select * from student ");

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
        <h5 class="card-header">Student Details</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Parent Name</th>
                <th>Parent Mobile</th>
                <th>School</th>
                <th>SUbscribed On</th>
                <th>View Profile</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              while ($row = mysqli_fetch_assoc($students)) {
                $pid = mysqli_fetch_assoc(mysqli_query($con, "select pid from subscriptions where stdid = {$row['stdid']}"));
                $parent = mysqli_fetch_assoc(mysqli_query($con, "select pname from parent where pid='{$pid['pid']}'"));
                $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid='{$row['school']}'"));
                $date = date_create($row['subscription_date']);
                $date = date_format($date, "d-m-Y");
              ?>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                    <strong><?php echo $row['sname'] ?></strong>
                  </td>
                  <td><?php echo $parent['pname'] ?></td>
                  <td><a href="tel:<?php echo $pid['pid'] ?>"><?php echo $pid['pid'] ?></a></td>
                  <td><span class="badge bg-label-success me-1"><?php echo $school['school_name'] ?></span>
                  </td>
                  <td>Subscribed On : <?php echo $date ?></td>
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