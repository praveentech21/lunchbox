<?php
session_start();
include("connect.php");
if (!empty($_SESSION['eid'])) {
  header("location: delivary.php");
} elseif (!empty($_SESSION['supid'])) {
  header("location: index.php");
}
if (isset($_POST['submit'])) {
  $mobile = $_POST['mobile'];
  $pass = $_POST['pass'];
  $run1 = mysqli_query($con, "select * from team where mobile='$mobile' and pass='$pass'");
  if (mysqli_num_rows($run1) > 0) {
    $run2 = mysqli_fetch_array($run1);
    $_SESSION['eid'] = $run2['eid'];
    header("location: delivary.php");
  } else {
    echo "<script>alert('Invalid Username or Password')</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
  <?php include 'bhavani.php'; ?>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder">Lunch Box</span>
              </a>
            </div>
            <!-- /Logo -->
            <form id="formAuthentication" class="mb-3" action="#" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="email" name="mobile" placeholder="Enter your Mobile Number" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="pass" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Sign
                  in</button>
              </div>
            </form>

            <p class="text-center">
              <span>Sig in as Super Admin</span>
              <a href="suplogin.php">
                <span>Super Admin Sign</span>
              </a>
            </p>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="Bhavani/vendor/libs/jquery/jquery.js"></script>
  <script src="Bhavani/vendor/libs/popper/popper.js"></script>
  <script src="Bhavani/vendor/js/bootstrap.js"></script>
  <script src="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="Bhavani/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="Bhavani/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>