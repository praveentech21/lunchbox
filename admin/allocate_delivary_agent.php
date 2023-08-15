<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$subscription = mysqli_query($con, "select * from subscriptions ");

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/"
    data-template="vertical-menu-template-free">

<head>
    <?php include 'bhavani.php'; ?>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
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
                            <?php
              while ($row = mysqli_fetch_assoc($subscription)) {
                $student = mysqli_fetch_assoc(mysqli_query($con, "select * from student where stdid = '{$row['stdid']}'"));
                $parent = mysqli_fetch_assoc(mysqli_query($con, "select pname from parent where pid = '{$row['pid']}'"));
                $address = mysqli_fetch_assoc(mysqli_query($con, "select area from address where pid = '{$row['pid']}'"));
                $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid = '{$student['school']}'"));
                $team_members = mysqli_query($con, "select name,eid from team ");
                $team = array();
                while ($row = mysqli_fetch_assoc($team_members)) $team[] = $row;

              ?>
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong><?php echo $student['sname'] ?></strong></td>
                                <td><?php echo $parent['pname'] ?></td>
                                <td><?php echo $address['area'] ?></td>
                                <td><span
                                        class="badge bg-label-success me-1"><?php echo $school['school_name'] ?></span>
                                </td>
                                <form action="allocate_agent.php" method="get">
                                    <input type="hidden" name="stdid" value=<?php echo $student['stdid'] ?>>
                                    <td>
                                        <div>
                                            <select id="smallSelect" name="agent" class="form-select form-select-sm">
                                                <option>select agent</option>
                                                <?php foreach ($team as $agent) { ?>
                                                <option value=<?php echo $agent['eid'] ?>><?php echo $agent['name'] ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td><input type="submit" class="btn btn-sm btn-outline-success"></td>
                                </form>
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