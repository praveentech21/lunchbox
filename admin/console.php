<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$students = mysqli_query($con, "select * from student ");
$delivery_team = mysqli_query($con, "select * from team");
$schools = mysqli_query($con, "select * from schools");

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .nav-tabs .nav-link.active {
            font-weight: bold;
            background-color: transparent;
            border-bottom: 3px solid #03b0d4;
            border-right: none;
            border-left: none;
            border-top: none;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
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

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            max-width: 80%;
            max-height: 80%;
            /* Set a maximum height for the content */
            overflow: auto;
            /* Enable scrolling if content exceeds max-height */
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .card-header .float-end {
            margin-top: -10px;
            /* Adjust this value as needed */
            margin-right: -10px;
            /* Adjust this value as needed */
        }
    </style>

    <?php include 'bhavani.php'; ?>


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
                                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#pop1" role="tab" aria-controls="pop1" aria-selected="true">Parent Details</a>
                                        <a class="nav-item nav-link" id="pop2-tab" data-toggle="tab" href="#pop2" role="tab" aria-controls="pop2" aria-selected="false">Student Details</a>
                                        <a class="nav-item nav-link" id="pop3-tab" data-toggle="tab" href="#pop3" role="tab" aria-controls="pop3" aria-selected="false">Delivery Team</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="pop1" role="tabpanel" aria-labelledby="pop1-tab">
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
                                                                <td><a href="tel:<?php echo $run1['pid'] ?>"><?php echo $run1['pid'] ?></a>
                                                                </td>
                                                                <td><?php echo $address['area'] ?></td>
                                                                <td><?php echo $row['count(*)'] ?></td>

                                                                <td>
                                                                    <a href='#editEmployeeModal' class='edit' data-toggle='modal' data-addresslink="<?php echo $run1['address'] ?>" data-pid="<?php echo $run1['pid'] ?>" data-pname="<?php echo $run1['pname'] ?>" data-altphone="<?php echo $run1['altphone'] ?>" data-email="<?php echo $run1['email'] ?>" data-pincode="<?php echo $address['pincode'] ?>" data-doorno="<?php echo $address['doorno'] ?>" data-appartment="<?php echo $address['appartment'] ?>" data-area="<?php echo $address['area'] ?>"><span class="badge bg-label-info me-1">View Profile</span></a>
                                                                </td>
                                                            </tr>

                                                        <?php } ?>
                                            </div>
                                            <!-- Existing PHP code ... -->

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
                                                            <td><a href="tel:<?php echo $pid['pid'] ?>"><?php echo $pid['pid'] ?></a>
                                                            </td>
                                                            <td><span class="badge bg-label-success me-1"><?php echo $school['school_name'] ?></span>
                                                            </td>
                                                            <td><?php echo $date ?></td>
                                                            <td><a href="#" class="open-popup" data-target="popup-1" data-stdid="<?php echo $row['stdid'] ?>" data-sname="<?php echo $row['sname'] ?>" data-rollno="<?php echo $row['rollno'] ?>" data-school="<?php echo $row['school'] ?>" data-pname="<?php echo $parent['pname'] ?>" data-gender="<?php echo $row['gender'] ?>" data-subscription="<?php echo $row['subscription_date'] ?>" data-class="<?php echo $row['sclass'] ?>" data-section="<?php echo $row['sec'] ?>"><span class="badge bg-label-info me-1">View Profile</span></a></td>

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
                                        <h5 class="card-header">Delivary Agent Details
                                            <div class="float-end">
                                                <a href="new_delivary_agent.php"><button class="btn btn-success me-2">Add</button></a>
                                            </div>
                                        </h5>
                                        <div class="card-body">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Agent Name</th>
                                                            <th>Mobile</th>
                                                            <th>No of Boxes</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row = mysqli_fetch_assoc($delivery_team)) {
                                                            $boxes = mysqli_fetch_assoc(mysqli_query($con, "select count(*) from subscriptions where delivery_partner={$row['eid']}"));
                                                        ?>
                                                            <tr>
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong><?php echo $row['name'] ?></strong>
                                                                </td>
                                                                <td><?php echo $row['mobile'] ?></td>
                                                                <td><span class="badge bg-label-primary me-1"><?php echo $boxes['count(*)'] ?></span>
                                                                </td>
                                                                <td><a href="#" class="open-popup" data-target="popup-2" data-agentname="<?php echo $row['name'] ?>" data-noofboxes="<?php echo $boxes['count(*)'] ?>" data-agentmobile="<?php echo $row['mobile'] ?>" data-eid="<?php echo $row['eid'] ?>" data-agentlink="<?php echo $row['address'] ?>"><span class="badge bg-label-info me-1">View Profile</span></a></td>
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

    <!-- Parent Popup Starts here shiva -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="update_member.php" id="editForm">
                    <div class="modal-body">
                        <h5 class="mb-0">Update Parent Details</h5><br>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Parent
                                Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="pname" aria-describedby="basic-icon-default-fullname2" name="pname" />
                                <input type="hidden" name="pid" id="pid">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Alternative
                                Phone</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                <input type="text" id="altphone" class="form-control phone-mask" aria-describedby="basic-icon-default-phone2" name="altphone" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" id="email" class="form-control" aria-label="john.doe" aria-describedby="basic-icon-default-email2" name="email" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Area
                            </label>
                            <input type="text" class="form-control" id="area" aria-describedby="defaultFormControlHelp" name="area" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Appartment</label>
                            <input type="text" class="form-control" id="appartment" aria-describedby="defaultFormControlHelp" name="appartment" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Door No
                                and Address</label>
                            <input type="text" class="form-control" id="doorno" aria-describedby="defaultFormControlHelp" name="doorno" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" aria-describedby="defaultFormControlHelp" name="pincode" />
                        </div>
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Link</label>
                            <input type="text" class="form-control" id="addresslink" aria-describedby="defaultFormControlHelp" name="addresslink" />
                            <div id="defaultFormControlHelp" class="form-text">
                                Set google embede link of location here.
                            </div>
                        </div class="mb-3"> <br>
                        <div class="mb-3">
                            <a href=""><input type="submit" name="updateparent" value="submit" class="btn btn-primary"></a>
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Parent Popup Ends here shiva  -->

    <!-- phpup of student profile starts here shiva -->
    <div class="popup" id="popup-1">
        <div class="popup-content">

            <div class="card mb-4">
                <h5 class="card-header">Student Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="Bhavani/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" id="stdnamelabel" class=" me-2 mb-4" tabindex="0"></label>
                            <p class="text-muted mb-0" id="sonof"></p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="update_member.php">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Student Name</label>
                                <input class="form-control" type="text" id="sname" name="sname" autofocus />
                                <input type="hidden" name="stdid" id="stdid">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Roll Number</label>
                                <input class="form-control" type="text" name="rollno" id="rollno" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="school">school</label>
                                <select id="school" name="school" class="select2 form-select">
                                    <option value="">Select school</option>
                                    <?php while ($rowa = mysqli_fetch_assoc($schools)) { ?>
                                        <option value="<?php echo $rowa['sid'] ?>"><?php echo $rowa['school_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Parent Name</label>
                                <input type="text" disabled class="form-control" id="s_pname" name="s_pname" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Class</label>
                                <input type="text" class="form-control" id="class" name="class" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Section </label>
                                <input class="form-control" type="text" id="section" name="section" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="select2 form-select">
                                    <option value="">Select Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">subscriped Date</label>
                                <input class="form-control" type="date" id="subdate" name="subdate" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" name="updatestudent" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

            <a href="#" class="close-popup">Close</a>
        </div>
    </div>
    <!-- phpup of student profile Ends here shiva -->

    <!-- phpup of Delivery Agent profile starts here shiva -->
    <div class="popup" id="popup-2">
        <div class="popup-content">

            <div class="card mb-4">
                <h5 class="card-header" id="agentlable">Student Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="Bhavani/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <p class="mb-0" id="agentmobilelable"></p>
                            <p class="mb-0" id="noofboxestoagent"></p>
                            <a href="" class="mb-0" id="agentlinklable"></a>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="deliveragent" method="POST" action="update_member.php">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Agent Name</label>
                                <input class="form-control" type="text" id="agentname" name="agentname" autofocus />
                                <input type="hidden" name="eid" id="eid">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Mobile Number</label>
                                <input class="form-control" type="text" name="agentmobile" id="agentmobile" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Agent Link</label>
                                <input class="form-control" type="text" name="agentlink" id="agentlink" />
                            </div>
                            <div class="mt-2">
                                <button type="submit" name="updateagentdetails" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

            <a href="#" class="close-popup">Close</a>
        </div>
    </div>
    <!-- popup of Delivery Agent profile Ends here shiva -->

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
        document.addEventListener("DOMContentLoaded", function() {
            const openPopupLinks = document.querySelectorAll(".open-popup");
            const closePopupButtons = document.querySelectorAll(".close-popup");
            const popups = document.querySelectorAll(".popup");

            openPopupLinks.forEach((link) => {
                link.addEventListener("click", (e) => {
                    e.preventDefault();
                    const targetPopupId = link.getAttribute("data-target");
                    const targetPopup = document.getElementById(targetPopupId);
                    targetPopup.style.display = "block";
                });
            });

            closePopupButtons.forEach((button) => {
                button.addEventListener("click", () => {
                    const popup = button.closest(".popup");
                    popup.style.display = "none";
                });
            });

            popups.forEach((popup) => {
                popup.addEventListener("click", (e) => {
                    if (e.target === popup) {
                        popup.style.display = "none";
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".edit", function() {
                var parentPname = $(this).data('pname');
                var parentAltphone = $(this).data('altphone');
                var parentEmail = $(this).data('email');
                var parentPincode = $(this).data('pincode');
                var parentDoorno = $(this).data('doorno');
                var parentAppartment = $(this).data('appartment');
                var parentArea = $(this).data('area');
                var parentAddresslink = $(this).data('addresslink');
                var pid = $(this).data('pid');

                $("#pname").val(parentPname);
                $("#altphone").val(parentAltphone);
                $("#email").val(parentEmail);
                $("#pincode").val(parentPincode);
                $("#doorno").val(parentDoorno);
                $("#appartment").val(parentAppartment);
                $("#area").val(parentArea);
                $("#addresslink").val(parentAddresslink);
                $("#pid").val(pid);
            });

            $(document).on("click", ".open-popup", function() {
                var stdid = $(this).data("stdid");
                var sname = $(this).data("sname");
                var rollno = $(this).data("rollno");
                var school = $(this).data("school");
                var pname = $(this).data("pname");
                var classs = $(this).data("class");
                var section = $(this).data("section");
                var subdate = $(this).data("subdate");
                var gender = $(this).data("gender");
                var subscription = $(this).data("subscription");

                if (gender == 2) {
                    gender = "Male"
                } else if (gender == 1) {
                    gender = "Female"
                } else {
                    gender = "Other"
                }

                if (school == 1) {
                    school = "Westberry School"
                } else if (school == 2) {
                    school = "Bhavans"
                } else if (school == 3) {
                    school = "Eurokids"
                }

                $("#stdnamelabel").html(sname);
                $("#sonof").html(pname);

                $("#sname").val(sname);
                $("#rollno").val(rollno);
                $("#class").val(classs);
                $("#section").val(section);
                $("#country").val(school);
                $("#subdate").val(subdate);
                $("#gender").val(gender);
                $("#subdate").val(subscription);
                $("#s_pname").val(pname);
                $("#stdid").val(stdid);
                // since this is a droupdow i want the correct option to be selected
                // 
                var selectedSchool = school; // Replace with the actual selected school name

                var schoolDropdown = document.getElementById("school");
                for (var i = 0; i < schoolDropdown.options.length; i++) {
                    if (schoolDropdown.options[i].text === selectedSchool) {
                        schoolDropdown.selectedIndex = i;
                        break;
                    }
                }

                var selectedGender = gender; // Replace with the actual selected school name

                var schoolGender = document.getElementById("gender");
                for (var i = 0; i < schoolGender.options.length; i++) {
                    if (schoolGender.options[i].text === selectedGender) {
                        schoolGender.selectedIndex = i;
                        break;
                    }
                }

                // for Delivery Agent Starts Here Shiva

                var agentname = $(this).data("agentname");
                var agentmobile = $(this).data("agentmobile");
                var noofboxes = $(this).data("noofboxes");
                var eid = $(this).data("eid");
                var agentlink = $(this).data("agentlink");

                $("#agentlable").html(agentname);
                $("#agentmobilelable").html("Mobile : " + agentmobile);
                $("#noofboxestoagent").html("No of boxes Deliver : " + noofboxes);
                $("#agentlinklable").html(agentlink);
                $("#agentlinklable").attr("href", agentlink);


                $("#agentname").val(agentname);
                $("#agentmobile").val(agentmobile);
                $("#eid").val(eid);
                $("#agentlink").val(agentlink);




            });


        });
    </script>

    <?php include 'fotter.php'; ?>
</body>

</html>