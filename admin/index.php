<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$students = mysqli_query($con, "select * from student ");
$delivery_team = mysqli_query($con, "select * from team");

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/"
    data-template="vertical-menu-template-free">

<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Then load Bootstrap JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php include 'bhavani.php'; ?>
    <style>
    .nav-tabs .nav-link.active {
        font-weight: bold;
        background-color: transparent;
        border-bottom: 3px solid #03b0d4;
        border-right: none;
        border-left: none;
        border-top: none;
    }
    </style>
    <style>
    /* Modal styles */
.modal .modal-dialog {
    max-width: 90%; /* Adjust the maximum width as needed */
    margin: 10vh auto; /* Center the modal vertically and horizontally */
}
.modal .modal-content {
    border-radius: 3px;
    font-size: 14px;
}
.modal .modal-header, .modal .modal-footer {
    padding: 10px 15px; /* Adjust padding for header and footer */
}
.modal .modal-body {
    max-height: 60vh; /* Set the maximum height for the body */
    overflow-y: auto; /* Allow vertical scrolling if content exceeds max height */
    padding: 0 15px; /* Adjust padding as needed */
}
.modal .modal-footer {
    background: #ecf0f1;
    border-radius: 0 0 3px 3px;
    padding: 10px 15px; /* Adjust padding for footer */
}
.modal .modal-title {
    display: inline-block;
    font-size: 18px; /* Increase font size for title */
}
.modal .form-control {
    border-radius: 2px;
    box-shadow: none;
    border-color: #dddddd;
    font-size: 14px; /* Adjust font size for input fields */
}
.modal textarea.form-control {
    resize: vertical;
}
.modal .btn {
    border-radius: 2px;
    min-width: 100px;
    font-size: 14px; /* Adjust font size for buttons */
}
.modal form label {
    font-weight: normal;
}
#successAlert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
/* ... Existing styles ... */
/* Hide the warning messages initially */
#nameError,
#mobileError,
#emailError {
    display: none;
}
/* Custom styles for invalid input fields */
input.is-invalid {
    border-color: red !important;
}

    </style>

</head>

<body>
    <?php include 'header.php'; ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center ">
                                <nav class="nav-justified ">
                                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#pop1"
                                            role="tab" aria-controls="pop1" aria-selected="true">Parent Details</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#pop2"
                                            role="tab" aria-controls="pop2" aria-selected="false">Student Details</a>
                                        <a class="nav-item nav-link" id="pop3-tab" data-toggle="tab" href="#pop3"
                                            role="tab" aria-controls="pop3" aria-selected="false">Newly Launched</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="pop1" role="tabpanel"
                                        aria-labelledby="pop1-tab">
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
                                                            <td><a
                                                                    href="tel:<?php echo $run1['pid'] ?>"><?php echo $run1['pid'] ?></a>
                                                            </td>
                                                            <td><?php echo $address['area'] ?></td>
                                                            <td><?php echo $row['count(*)'] ?></td>

                                                            <td><a href='#editEmployeeModal' class='edit'
                                                                    data-toggle='modal' data-sno=\$sno\><i
                                                                        class='material-icons' data-toggle='tooltip'
                                                                        title='Edit'>&#xE254;</i></a></td>
                                                        </tr>

                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/ Hoverable Table rows -->
                                    <div class="tab-pane fade" id="pop2" role="tabpanel" aria-labelledby="pop2-tab">
                                        <!-- Hoverable Table rows -->
                                        <div class="card">
                                            <h5 class="card-header">Student Details</h5>
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Student Name</th>
                                                            <th>Parent Name</th>
                                                            <th>Parent Mobile</th>
                                                            <th>School</th>
                                                            <th>SUbscribed On</th>
                                                            <th>View Profile</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        <?php
                            while ($row = mysqli_fetch_assoc($students)) {
                              $pid = mysqli_fetch_assoc(mysqli_query($con, "select pid from subscriptions where stdid = {$row['stdid']}"));
                              $parent = mysqli_fetch_assoc(mysqli_query($con, "select pname from parent where pid='{$pid['pid']}'"));
                              $school = mysqli_fetch_assoc(mysqli_query($con, "select school_name from schools where sid='{$row['school']}'"));
                              $date = date_create($row['subscription_date']);
                              $date = date_format($date, "d-m-Y");
                            ?>
                                                        <tr>
                                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                <strong><?php echo $row['sname'] ?></strong>
                                                            </td>
                                                            <td><?php echo $parent['pname'] ?></td>
                                                            <td><a
                                                                    href="tel:<?php echo $pid['pid'] ?>"><?php echo $pid['pid'] ?></a>
                                                            </td>
                                                            <td><span
                                                                    class="badge bg-label-success me-1"><?php echo $school['school_name'] ?></span>
                                                            </td>
                                                            <td>Subscribed On : <?php echo $date ?></td>
                                                            <td><a href=""><span class="badge bg-label-info me-1">View
                                                                        Profile</span></a></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--/ Hoverable Table rows -->
                                    </div>
                                    <div class="tab-pane fade" id="pop3" role="tabpanel" aria-labelledby="pop3-tab">
                                        <!-- Bordered Table -->
                                        <div class="card">
                                            <h5 class="card-header">Delivary Agent Details</h5>
                                            <div class="card-body">
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Agent Name</th>
                                                                <th>Mobile</th>
                                                                <th>No of Boxes</th>
                                                                <!-- <th>Schools</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                while ($row = mysqli_fetch_assoc($delivery_team)) {
                  $boxes = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner={$row['eid']}"));
                  // $schools = mysqli_fetch_assoc(mysqli_query($con, "select DISTINCT school_name from schools where sid in (select sid from student where stdid in ( select stdid from subscriptions where delivery_partner = {$row['eid']}))"));
                ?>
                                                            <tr>
                                                                <td><i
                                                                        class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong><?php echo $row['name'] ?></strong>
                                                                </td>
                                                                <td><?php echo $row['mobile'] ?></td>
                                                                <td><span
                                                                        class="badge bg-label-primary me-1"><?php echo $boxes['count(*)'] ?></span>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ Bordered Table -->


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <!-- / Content -->

        <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog" style="max-width: 400px;">
        <div class="modal-content">
            <div class="modal-header">
            <div class="card mb-4">
                                                <div
                                                    class="card-header d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0">Update Parent
                                                        Details</h5>
                                                </div>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="popup-overlay" id="popupOverlay">
                    <div class="popup-container">
                        <div class="popup-content">
                            <span class="close-button" id="closeButton">&times;</span>
                            <form id="editForm" method="post" action="#">
                                <div class="row">
                                    <!-- ... Existing form content ... -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Footer content -->
            </div>
        </div>
    </div>
</div>



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