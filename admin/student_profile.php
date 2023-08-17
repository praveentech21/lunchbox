<?php 
    if(!isset($_GET['stdid'])) header("location:console.php");

    include 'connect.php'; 
    $student = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid = '{$_GET['stdid']}'"));
    $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid = '{$student['school']}'"))['school_name'];
    $subscr = mysqli_fetch_assoc(mysqli_query($con, "select * from subscriptions where stdid = '{$_GET['stdid']}'"));
    $parent_name = mysqli_fetch_assoc(mysqli_query($con, "select pname from parent where pid = '{$subscr['pid']}'"))['pname'];
    $delivery_agent = mysqli_fetch_assoc(mysqli_query($con, "select name from team where eid = '{$subscr['delivery_partner']}'"))['name'];
    $schools = mysqli_query($con, "select * from schools");
    $delivered = mysqli_num_rows(mysqli_query($con, "select * from delivary where stdid = '{$subscr['stdid']}' and status = 1"));
    $in_transit = mysqli_num_rows(mysqli_query($con, "select * from delivary where stdid = '{$subscr['stdid']}' and status = 0"));
    $this_month = date("m");
$this_year = date("Y");
$working_days_of_this_month = mysqli_query($con, "SELECT `date` FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY `date` order by date asc");
$total_working_days = mysqli_num_rows($working_days_of_this_month);

    $not_pickedup = $total_working_days - $in_transit - $delivered;

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/"
    data-template="vertical-menu-template-free">

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

                <div class="card mb-4">
                    <h5 class="card-header">Name</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="Bhavani/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="card-body">
                                <p>School : <b><?php echo "$school" ?></b> </p>
                                <p>Roll Number : <b><?php echo $student['rollno'] ?></b></p>
                                <p>Delivery Agent : <b><?php echo $delivery_agent ?></b></p>
                            </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="update_member.php">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="sname" class="form-label">Student Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="sname"
                              name="sname"
                              value="<?php echo $student['sname'] ?>"
                              autofocus
                            />
                            <input type="hidden" name="stdid" value="$student['sname']">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="rollno" class="form-label">Roll Number</label>
                            <input class="form-control" type="text" name="rollno" id="rollno" value="<?php echo $student['rollno'] ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="school">School</label>
                            <select id="school" name="school" class="select2 form-select">
                              <option value="">Select school</option>
                              <?php while ($row = mysqli_fetch_assoc($schools)) { ?>
                                <option value="<?php echo $row['sid'] ?>" <?php if($row['sid'] == $student['school']) echo "selected" ?> ><?php echo $row['school_name'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="pname" class="form-label">Parent Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="pname"
                              name="pname"
                              disabled
                              value="<?php echo $parent_name ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="class" class="form-label">Class</label>
                            <input
                              type="text"
                              class="form-control"
                              id="class"
                              name="class"
                              value="<?php echo $student['sclass'] ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="section">Section</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="section"
                                name="section"
                                class="form-control"
                                value="<?php echo $student['sec'] ?>"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="gender">Gender</label>
                            <select id="gender" name="gender" class="select2 form-select">
                              <option value="">Select</option>
                              <option value="2" <?php if($student['gender'] == '2') echo 'selected' ?> >Boys</option>
                              <option value="1" <?php if($student['gender'] == '1') echo 'selected' ?> >Girls</option>
                              <option value="0" <?php if($student['gender'] == '0') echo 'selected' ?> >Others</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="subdate" class="form-label">Subscription Date</label>
                            <input
                              type="text"
                              class="form-control"
                              id="subdate"
                              name="subdate"
                              value="<?php echo $student['subscription_date'] ?>"
                            />
                            <small>Date formate yyyy - mm -DD</small>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="updatestudent" class="btn btn-primary me-2">Save changes</button>
                        </div>
                      </form>
                    </div>
                    <div class="card">
                            <h5 class="card-header">This Month Delivery Report</h5>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($rama = mysqli_fetch_assoc($working_days_of_this_month)){
                                                $check_status_of_box = mysqli_fetch_assoc(mysqli_query($con, "select status from delivary where stdid = '{$_GET['stdid']}' and date = '{$rama['date']}'"));
                                        ?>
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $rama['date'] ?></strong></td>
                                            <td><?php if(empty($check_status_of_box)) echo '<span class="badge bg-label-warning me-1">Not Picked</span>'; elseif($check_status_of_box == 0) echo '<span class="badge bg-label-primary me-1">In Transtion</span>'; else echo '<span class="badge bg-label-success me-1">Completed</span>'; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <!-- /Account -->
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