<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
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
        <h5 class="card-header">Subscribed Parent Details</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>No. of Childs</th>
                <th>View Profile</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $subscribed_parents = mysqli_query($con, "select *,count(*) from subscriptions group by pid");
              while ($row = mysqli_fetch_assoc($subscribed_parents)) {
                $run1 = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid='{$row['pid']}'"));
                $address = mysqli_fetch_assoc(mysqli_query($con, "select * from address where pid = '{$row['pid']}'"))
              ?>
                <tr>
                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                    <strong><?php echo $run1['pname'] ?></strong>
                  </td>
                  <td><a href="tel:<?php echo $run1['pid'] ?>"><?php echo $run1['pid'] ?></a></td>
                  <td><?php echo $address['area'] ?></td>
                  <td><?php echo $row['count(*)'] ?></td>
                  <td><a href="parent_profile.php?parent=<?php echo $run1['pid'] ?>"><span class="badge bg-label-info me-1">View Profile</span></a></td>
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