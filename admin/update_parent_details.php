<?php
session_start();

// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$run1 = mysqli_query($con, "select * from parent where pid='0'");
if (isset($_POST['getdetails'])) {
  $pid = $_POST['pid'];
  $_SESSION['pid'] = $pid;
  $run1 = mysqli_query($con, "select * from parent where pid='$pid'");
  if (mysqli_num_rows($run1) == 0) {
    echo "<script>alert('No Parent Found')</script>";
  }
}
if (isset($_POST['update'])) {
  $mobile = $_POST['pid'];
  $pname = $_POST['pname'];
  $altphone = $_POST['altphone'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $run2 = mysqli_query($con, "update parent set pid='$mobile',pname='$pname',altphone='$altphone',email='$email',pass='$pass' where pid='{$_SESSION['pid']}'");
  unset($_SESSION['pid']);
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

      <div class="row">
        <div class="col-md-6">
          <div class="card mb-4">
            <h5 class="card-header">Select the Parent</h5>
            <form action="#" method="post">
              <div class="card-body">
                <div>
                  <label for="defaultFormControlInput" class="form-label">Parent Mobile Number</label>
                  <input type="text" class="form-control" id="defaultFormControlInput" placeholder="905 2727 402" aria-describedby="defaultFormControlHelp" type="number" name="pid" />
                </div>
                <div class="mt-3">
                  <button type="submit" name="getdetails" class="btn btn-primary">Get Details</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php
      if (mysqli_num_rows($run1) > 0) {
        $run1 = mysqli_fetch_assoc($run1);
      ?>
        <div class="row">

          <div class="col-xl">
            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Update Parent Details</h5>
              </div>
              <div class="card-body">
                <form method="post" action="#">
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Parent Name</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                      <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="<?php echo $run1['pname']; ?>" aria-label="<?php echo $run1['pname']; ?>" aria-describedby="basic-icon-default-fullname2" name="pname" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                      <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="<?php echo $run1['pid']; ?>" aria-label="<?php echo $run1['pid']; ?>" aria-describedby="basic-icon-default-phone2" name="pid" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Alternative Phone</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                      <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="<?php echo $run1['altphone']; ?>" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" name="altphone" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input type="email" id="basic-icon-default-email" class="form-control" placeholder="<?php echo $run1['email']; ?>" aria-label="john.doe" aria-describedby="basic-icon-default-email2" name="email" />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Password</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-lock-open-alt"></i>
                      </span>
                      <input type="password" class="form-control" id="basic-icon-default-fullname" placeholder="..........." aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="pass" />
                    </div>
                  </div>
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      <?php
      }
      ?>


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