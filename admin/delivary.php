<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['eid'])) {
  header("location:login.php");
}
include("connect.php");
$eid = $_SESSION['eid'];
$run1 = mysqli_fetch_assoc(mysqli_query($con, "select * from team where eid='$eid'"));
$run2 = mysqli_query($con, "select * from subscriptions where delivery_partner='$eid'");
?>
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
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h4 class="mt-2 text-muted">Your Lunch Boxes</h4>
          <?php
          if (mysqli_num_rows($run2) > 0) {
            while ($row = mysqli_fetch_assoc($run2)) {
              $run3 = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid='{$row['stdid']}'"));
              $run4 = mysqli_fetch_assoc(mysqli_query($con, "select * from schools where sid='{$run3['school']}'"));
              $date = date("Y-m-d");
              $run5 = mysqli_query($con, "select * from delivary where stdid='{$row['stdid']}' and date='$date'");
              $run7 = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid='{$row['pid']}'"));
          ?>
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $run3['sname'] ?></h5>
                  <div class="card-subtitle text-muted mb-3">
                    <?php
                    if (mysqli_num_rows($run5) == 0) {
                      echo "<small style='color: red;' >Not Picked </small>";
                    } else {
                      $run8 = mysqli_fetch_assoc($run5);
                      $run6 = mysqli_fetch_assoc(mysqli_query($con, "select * from trips where tripid='{$run8['tripid']}'"));
                      if ($run8['status'] == 0)
                        echo "<small style='color: Yellow;' >In Transtion </small>";
                      else if ($run8['status'] == 1)
                        echo "<small style='color: Green;' >Delivered </small>";
                    }
                    ?>
                  </div>
                  <p class="card-text"><?php echo $run4['school_name'] ?></p>
                  <p class="card-text"><?php echo $run7['pname'] ?></p>
                  <?php
                  if (mysqli_num_rows($run5) != 0) {
                    $run6 = mysqli_fetch_assoc(mysqli_query($con, "select * from trips where tripid='{$run8['tripid']}'"));
                    if ($run8['status'] == 0)
                      echo "<p class='card-text'>picked up @" . $run6['pickup_time'] . " </p>";
                    else if ($run8['status'] == 1) {
                      echo "<p class='card-text'>picked up @" . $run6['pickup_time'] . " </p>";
                      echo "<p class='card-text'>Droped @" . $run6['drop_time'] . " </p>";
                    }
                  }
                  ?>
                  <a href="<?php echo $run7['address'] ?>" target="_blank" class="card-link">Address</a>
                  <a href="tel:<?php echo $row['pid'] ?>" class="card-link">Call</a>
                  <a href="#" onclick="change_status(<?php echo ($row['stdid'] . ',' . $eid); ?> );" class="card-link">
                    <?php
                    if (mysqli_num_rows($run5) == 0) {
                      echo "<button type='button' class='btn btn-success'>Pick Up</button>";
                    } else {
                      $run6 = mysqli_fetch_assoc(mysqli_query($con, "select * from trips where tripid='{$run8['tripid']}'"));
                      if ($run8['status'] == 0)
                        echo "<button type='button' class='btn btn-danger'>Drop Box</button>";
                    }
                    ?>
                  </a>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<h3 style='color: red;'>No Lunch Boxes Assigned</h3>";
          }
          ?>
        </div>
      </div>

      <!-- <span class="badge bg-label-primary me-1">Active</span>
              <span class="badge bg-label-success me-1">Completed</span>
              <span class="badge bg-label-info me-1">Scheduled</span>
              <span class="badge bg-label-warning me-1">Pending</span> -->

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
          <a href="https://saipraveen.tech" target="_blank" class="footer-link fw-bolder">Sai Praveen</a>
        </div>
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
  <script>
    function change_status(stdid, eid) {
      // axaj call to pickup.php
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      var data = "?stdid=" + stdid + "&eid=" + eid;
      xhttp.open("GET", "update_status.php" + data, true);
      xhttp.send();
      window.location.reload();
    }
  </script>
  <?php include 'fotter.php'; ?>

</body>

</html>