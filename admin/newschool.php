<?php

session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
if (isset($_POST['submit'])) {
  $school_name = $_POST['school_name'];
  $school_address = $_POST['school_address'];
  $run1 = mysqli_query($con, "INSERT INTO `schools`(`school_name`, `school_address`) VALUES ('$school_name','$school_address')");
  if ($run1) {
    echo "<script>alert('School Added Successfully')</script>";
  } else {
    echo "<script>alert('Error Occured')</script>";
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
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">New School</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="post" action="#">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">School Name</label>
                <div class="col-sm-10">
                  <input type="text" name="school_name" class="form-control" id="basic-default-name" placeholder="West Berry" />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-message">Address</label>
                <div class="col-sm-10">
                  <textarea id="basic-default-message" class="form-control" placeholder="Your Address " aria-label="Your Address " aria-describedby="basic-icon-default-message2" name="school_address"></textarea>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" name="submit" class="btn btn-primary">Add School</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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