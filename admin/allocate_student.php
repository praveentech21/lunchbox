<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
// Agent Deatils
$agent = mysqli_query($con, "select * from team");

$students = mysqli_query($con, "SELECT * FROM `student` JOIN subscriptions WHERE student.stdid = subscriptions.stdid ORDER BY subscriptions.delivery_partner ASC");

if(isset($_POST['allocate_student_to_agent'])){
  if($students_to_assign = $_POST['students_to_assign']){
    foreach($students_to_assign as $std){
      mysqli_query($con, "update subscriptions set delivery_partner = '{$_POST['agent']}' where stdid = '{$std}'");    
    }
  }
  else echo "<script>alert('Please Select Students to Assign')</script>";
  
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
      <form action="#" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <h5 class="card-header">Allocate Students to Agent</h5>
              <div class="card-body">
                <div>
                  <label for="smallSelect" class="form-label">Select Agent</label>
                  <select id="smallSelect" name="agent" class="form-select form-select-sm" required>
                    <option value="">Select Agent</option>
                    <?php while ($row = mysqli_fetch_assoc($agent)) { ?>
                      <option value="<?php echo $row['eid'] ?>"><?php echo $row['name'] ?></option>
                    <?php } ?>
                  </select> <br>
                  <button type="submit" class="btn btn-primary" name="allocate_student_to_agent">Allocate to Agent</button>
                </div>
              </div>
            </div>
          </div>
        </div>

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
                  <th>Present Agent</th>
                  <th>Update</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php while ($student = mysqli_fetch_assoc($students)) { 
                  $sub = mysqli_fetch_assoc(mysqli_query($con, "select * from subscriptions where stdid ='{$student['stdid']}'"));
                  $parent = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid = '{$sub['pid']}'"));
                  $address = mysqli_fetch_assoc(mysqli_query($con, "select * from address where pid = '{$sub['pid']}'"));
                  $del_agent = mysqli_fetch_assoc(mysqli_query($con, "select name from team where eid = '{$sub['delivery_partner']}'"))['name'];
                  $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid = '{$student['school']}'"))['school_name'];
                  ?>
                  <tr>
                    <td><strong> <?php echo $student['sname'] ?></strong></td>
                    <td><?php echo $parent['pname'] ?></td>
                    <td><?php echo '<span class="badge bg-label-primary me-1">'.$address['area'].'</span>' ?></td>
                    <td><?php echo '<span class="badge bg-label-success me-1">'.$school.'</span>'; ?></td>
                    <td><?php if($sub['delivery_partner'] == 0) echo '<span class="badge bg-label-info me-1">No Agent Asigned</span>'; else echo '<span class="badge bg-label-info me-1">'.$del_agent.'</span>' ?></td>
                    <td><?php if($sub['delivery_partner'] != 0){   ?><a href="remove_agent.php?agent=<?php echo $student['stdid'] ?>" >Deallocate</a> <?php } else { ?><input type="checkbox" name="students_to_assign[]" id="<?php echo $student['stdid'] ?>" value="<?php echo $student['stdid'] ?>"> <label for="<?php echo $student['stdid'] ?>"> Select</label> <?php } ?>  </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </form>
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