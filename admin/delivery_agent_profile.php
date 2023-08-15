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

      <div class="col-md-6 col-l  g-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
            <img class="img-fluid d-flex mx-auto my-4" src="Bhavani/img/elements/4.jpg" alt="Card image cap" />
            <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
            <a href="javascript:void(0);" class="card-link">Card link</a>
            <a href="javascript:void(0);" class="card-link">Another link</a>
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
      alert("Function Called" + stdid + " " + eid);
      // axaj call to pickup.php
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };
      xhttp.open("POST", "update_status.php", true);
      var data = "stdid=" + stdid + "&eid=" + eid;
      xhttp.send(data);
    }
  </script>
  <?php include 'fotter.php'; ?>
</body>

</html>