<?php
session_start();
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$run1 = mysqli_query($con, "SELECT * FROM `team` WHERE `mobile`='0'");
if (isset($_POST['getdetails'])) {
  $agentnumber = $_POST['agentnumber'];
  $_SESSION['agentnumber'] = $agentnumber;
  $run1 = mysqli_query($con, "SELECT * FROM `team` WHERE `mobile`='$agentnumber'");
  if (mysqli_num_rows($run1) == 0)  echo "<script>alert('No Agent Found')</script>";
}
if (isset($_POST['update'])) {
  $addresslink = $_POST['addresslink'];
  $run2 = mysqli_query($con, "UPDATE `team` SET `address`='$addresslink' WHERE `mobile`='{$_SESSION['agentnumber']}'; ");
  if ($run2) {
    echo "<script>alert('Agent Address Link Updated Successfully')</script>";
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
      <div class="row">

        <div class="col-md-6">
          <div class="card mb-4">
            <h5 class="card-header">Select Agent</h5>
            <form action="#" method="post">
              <div class="card-body">
                <div>
                  <label for="defaultFormControlInput" class="form-label">Agent Mobile Number</label>
                  <input type="number" class="form-control" id="defaultFormControlInput" placeholder="905 2727 402" aria-describedby="defaultFormControlHelp" name="agentnumber" />
                </div>
                <div class="mt-3">
                  <button type="submit" name="getdetails" class="btn btn-primary">Get Details</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
      <?php if (mysqli_num_rows($run1) > 0) { ?>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Update Agent Track Link</h5>
              <div class="card-body">
                <form action="#" method="post">
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Deleviry Agent Link</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Agent Address Link" aria-describedby="defaultFormControlHelp" name="addresslink" />
                    <div id="defaultFormControlHelp" class="form-text">
                      Set google embede link of location here.
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- / Content -->

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
  <?php include 'fotter.php'; ?>
</body>

</html>