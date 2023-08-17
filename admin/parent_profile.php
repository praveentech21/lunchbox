<?php
include 'connect.php';
$parent = mysqli_fetch_assoc(mysqli_query($con, "select * from parent where pid = '{$_GET['parent']}'"));
$subscr = mysqli_query($con, "select * from subscriptions where pid = '{$_GET['parent']}'");
$this_month = date("m");
$this_year = date("Y");
$working_days_of_this_month = mysqli_query($con, "SELECT `date` FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY `date` order by date asc");
$total_working_days = mysqli_num_rows($working_days_of_this_month);
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

                <div class="card mb-4">

                    <h5 class="card-header">Parent Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <p>Name : <b><?php echo $parent['pname'] ?></b> </p>
                        <p>Phone : <b><?php echo $parent['pid'] ?></b> </p>
                        <p>Email : <b><?php echo $parent['email'] ?></b> </p>
                        <p>Address :<a href="<?php echo $parent['address'] ?>">Address</a></p>
                    </div>
                    <hr class="my-0" />
                    <!-- /Account -->
                </div>

                <?php while ($row = mysqli_fetch_assoc($subscr)) {
                    $student = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid = '{$row['stdid']}'"));
                    $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid = '{$student['school']}'"))['school_name'];
                    $delivery_agent = mysqli_fetch_assoc(mysqli_query($con, "select name from team where eid = '{$row['delivery_partner']}'"))['name'];
                    $delivered = mysqli_num_rows(mysqli_query($con, "select * from delivary where stdid = '{$row['stdid']}' and status = 1"));
                    $in_transit = mysqli_num_rows(mysqli_query($con, "select * from delivary where stdid = '{$row['stdid']}' and status = 0"));
                    $not_pickedup = $total_working_days - $in_transit - $delivered;
                ?>

                    <div class="card mb-4">

                        <h5 class="card-header"><?php echo $student['sname'] ?></h5>
                        <!-- Account -->

                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../Upload/<?php echo $student['photo'] ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="card-body">
                                <p>School : <b><?php echo "$school" ?></b> </p>
                                <p>Roll Number : <b><?php echo $student['rollno'] ?></b></p>
                                <p>Delivery Agent : <b><?php echo $delivery_agent ?></b></p>
                            </div>
                        </div>

                        <!-- Borderless Table -->
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
                                                $check_status_of_box = mysqli_fetch_assoc(mysqli_query($con, "select status from delivary where stdid = '{$row['stdid']}' and date = '{$rama['date']}'"));
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
                        <!--/ Borderless Table -->


                        <!-- /Account -->
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