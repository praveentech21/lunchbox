<?php

session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$run1 = mysqli_query($con, "select * from parent where pid='0'");
if (isset($_POST['getdetails'])) {
  $pid = $_POST['pid'];
  $run1 = mysqli_query($con, "select * from parent where pid='$pid'");
  if (mysqli_num_rows($run1) == 0) {
    echo "<script>alert('No Parent Found')</script>";
  }
}
if (isset($_POST['update'])) {
  $run2 = mysqli_query($con, "UPDATE `student` SET `subscription_date` = '{$_POST['subdate']}' WHERE `student`.`stdid` = '{$_POST['stdid']}'");
  if ($run2) {
    echo "<script>alert('Parent Details Updated Successfully')</script>";
  } else {
    echo "<script>alert('Parent Details Updation Failed')</script>";
  }
}

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
      <form action="#" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Update Student Subscription</h5>
              <div class="card-body">
                <div>
                  <label for="defaultFormControlInput" class="form-label">Parent Mobile Number</label>
                  <input type="number" class="form-control" id="defaultFormControlInput" placeholder="905 2727 402" aria-describedby="defaultFormControlHelp" name="pid" />
                </div>
                <div class="mt-3">
                  <button type="submit" name="getdetails" class="btn btn-primary">Get Details</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <?php
      if (mysqli_num_rows($run1) > 0) {
        $subsctiption_details = mysqli_query($con, "select * from subscriptions where pid='$pid'");
        while ($row = mysqli_fetch_assoc($subsctiption_details)) {
          $student_details = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid='{$row['stdid']}'"));
      ?>
          <form action="#" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="card mb-4">
                  <h5 class="card-header"><?php echo $student_details['sname'] ?></h5>
                  <div class="card-body">
                    <div>
                      <label for="defaultFormControlInput" class="form-label">Subscribed Date</label>
                      <input class="form-control" name="subdate" type="date" id="html5-date-input" />
                      <input type="hidden" name="stdid" value="<?php echo $student_details['stdid'] ?>">
                    </div>
                    <div class="mt-3">
                      <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
      <?php }
      } ?>
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