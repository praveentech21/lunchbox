<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$run1 = mysqli_query($con, "select * from parent where pid='0'");
if (isset($_POST['getdetails'])) {
  $mobile = $_POST['mobile'];
  $_SESSION['mobile'] = $mobile;
  $run1 = mysqli_query($con, "select * from parent where pid='$mobile'");
  if (mysqli_num_rows($run1) == 0) {
    echo "<script>alert('No Parent Found')</script>";
  }
}
if (isset($_POST['update'])) {
  $area = $_POST['area'];
  $appartment = $_POST['appartment'];
  $doorno = $_POST['doorno'];
  $pincode = $_POST['pincode'];
  $addresslink = $_POST['addresslink'];
  $mobile = $_SESSION['mobile'];
  $run2 = mysqli_query($con, "update address set area='$area',appartment='$appartment',doorno='$doorno',pincode='$pincode' where pid='{$_SESSION['mobile']}'");
  $run3 = mysqli_query($con, "update parent set address='$addresslink' where pid='{$_SESSION['mobile']}'");
  unset($_SESSION['mobile']);
  if ($run2) {
    echo "<script>alert('Address Updated')</script>";
  } else {
    echo "<script>alert('Address Not Updated')</script>";
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
            <h5 class="card-header">Select Parent</h5>
            <form action="" method="post">
              <div class="card-body">
                <div>
                  <label for="defaultFormControlInput" class="form-label">Parent Mobile Number</label>
                  <input type="number" class="form-control" id="defaultFormControlInput" placeholder="905 2727 402" aria-describedby="defaultFormControlHelp" name="mobile" />
                </div>
                <div class="mt-3">
                  <button type="submit" name="getdetails" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
      <?php
      if (mysqli_num_rows($run1) > 0) {
        $run1 = mysqli_fetch_assoc($run1);
        $run2 = mysqli_fetch_assoc(mysqli_query($con, "select * from address where pid='{$run1['pid']}'"));
      ?>
        <div class="row">
          <div class="col-md-6">
            <form action="" method="post">
              <div class="card mb-4">
                <h5 class="card-header">Update Parent Address</h5>
                <div class="card-body">
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Area </label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['area']; ?>" aria-describedby="defaultFormControlHelp" name="area" />
                  </div>
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Appartment</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['appartment']; ?>" aria-describedby="defaultFormControlHelp" name="appartment" />
                  </div>
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Door No and Address</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['doorno']; ?>" aria-describedby="defaultFormControlHelp" name="doorno" />
                  </div>
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Pincode</label>
                    <input type="number" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['pincode']; ?>" aria-describedby="defaultFormControlHelp" name="pincode" />
                  </div>
                  <div>
                    <label for="defaultFormControlInput" class="form-label">Link</label>
                    <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run1['address']; ?>" aria-describedby="defaultFormControlHelp" name="addresslink" />
                    <div id="defaultFormControlHelp" class="form-text">
                      Set google embede link of location here.
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
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