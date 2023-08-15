<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
if (isset($_POST['submit'])) {
  $agentname = $_POST['agentname'];
  $agentphone = $_POST['agentphone'];
  $password = $_POST['password'];
  $agent_type = $_POST['agent_type'];
  $run = mysqli_query($con, "insert into team (name,mobile,pass,type) values ('$agentname','$agentphone','$password','$agent_type')");
  if ($run) {
    echo "<script>alert('New Delivery Agent Added Successfully')</script>";
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

        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">New Delivery Agent</h5>
            </div>
            <div class="card-body">
              <form method="post" action="#">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="agentname" class="form-control" id="basic-default-name" placeholder="New Agent Name" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                  <div class="col-sm-10">
                    <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="905 2727 402" aria-label="905 2727 402" aria-describedby="basic-default-phone" name="agentphone" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="basic-default-name" placeholder="************" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Agent Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="exampleFormControlSelect1" require name="agent_type" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">Founder</option>
                      <option value="2">Partner</option>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
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