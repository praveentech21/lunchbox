<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$subscriptions = mysqli_query($con, "select *,count(*) from subscriptions");
$team = mysqli_query($con, "select * from team");
$date = date("Y-m-d");
$total_scbscriptions = mysqli_fetch_assoc($subscriptions)['count(*)'];
$total_not_pickes = 0;
$total_In_Transtion = 0;
$total_Delivered = 0;
$not_picked_students = mysqli_query($con, "select * from subscriptions where stdid not in (select stdid from delivary where date='$date')");
$picked_students = mysqli_query($con, "select * from delivary where date='$date'");

// Calculation for this Month agent Report
$this_month = date("m");
$this_year = date("Y");
$this_month_working_days = mysqli_num_rows(mysqli_query($con, "SELECT count(*) FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY date; "));

// Calculation for day to day analysis

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
            <h5 class="card-header">Allocate Students to Agent</h5>
            <div class="card-body">
              <div>
                <label for="smallSelect" class="form-label">Select Agent</label>
                <select id="smallSelect" class="form-select form-select-sm">
                  <option>Select Agent</option>
                  <option value="9581981888">jagadish</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div id="students_to_agent"></div>
      <!-- Hoverable Table rows -->
      <div class="card">
        <h5 class="card-header">Allocating Delivery Agent to Students</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Parent Name</th>
                <th>Area</th>
                <th>School</th>
                <th>Delivary Agent</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> echo
                    $student['sname'] </strong></td>
                <td> echo $parent['pname'] </td>
                <td> echo $address['area'] </td>
                <td><span class="badge bg-label-success me-1">echo $school['school_name'] </span></td>
                <form action="allocate_agent.php" method="get">
                  <input type="hidden" name="stdid">
                  <td>
                    <div>
                      <select id="smallSelect" name="agent" class="form-select form-select-sm">
                        <option>select agent</option>
                      </select>
                    </div>
                  </td>
                  <td><input type="submit" class="btn btn-sm btn-outline-success"></td>
                </form>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Hoverable Table rows -->
    </div>
    <!--/ Monthly Report Ends Here Shiva -->


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
  <script>
    const smallSelect = document.getElementById('smallSelect');
    const students = document.getElementById('students_to_agent');

    smallSelect.addEventListener("change", function() {
      const agents_selected = smallSelect.value;

      //Making xml https request
      const std_dets = new XMLHttpRequest();
      std_dets.open("GET", "get_student_details.php?agent=" + agents_selected, true);
      std_dets.onreadystatechange = function() {
        if (std_dets.readyState === 4 & std_dets.status === 200) {
          const data_students = JSON.parse(std_dets.responseText);
          console.log(data_students);
          // Sending Data to display ie to students_to_agent container
          sendtodisplay(data_students);
        }
      };
      std_dets.send();
    });

    function sendtodisplay(data) {
      students.innerHTML = data;
      // for(let i = 0; i <data.length; i++){
      //   const item = data[i];
      // }

    }
  </script>
  <?php include 'fotter.php'; ?>
</body>

</html>