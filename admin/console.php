<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
$students = mysqli_query($con, "select * from student ");
$delivery_team = mysqli_query($con, "select * from team");

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

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

                                                                <td><a href='#editEmployeeModal' class='edit' data-toggle='modal' data-sno=\$sno\>edit</a></td>
                                                            </tr>
                                                            <!-- Edit Modal HTML -->
                                                            <div id="editEmployeeModal" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form id="editForm" novalidate>
                                                                            <div class="modal-body">
                                                                                <h5 class="mb-0">Update Parent Details</h5>
                                                                                <div class="card-body">
                                                                                    <form method="post" action="#">
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="basic-icon-default-fullname">Parent
                                                                                                Name</label>
                                                                                            <div class="input-group input-group-merge">
                                                                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                                                                <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="<?php echo $run1['pname']; ?>" aria-describedby="basic-icon-default-fullname2" name="pname" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="basic-icon-default-phone">Phone
                                                                                                No</label>
                                                                                            <div class="input-group input-group-merge">
                                                                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                                                                                <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="<?php echo $run1['pid']; ?>" aria-label="<?php echo $run1['pid']; ?>" aria-describedby="basic-icon-default-phone2" name="pid" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="basic-icon-default-phone">Alternative
                                                                                                Phone</label>
                                                                                            <div class="input-group input-group-merge">
                                                                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                                                                                <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="<?php echo $run1['altphone']; ?>" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" name="altphone" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="basic-icon-default-email">Email</label>
                                                                                            <div class="input-group input-group-merge">
                                                                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                                                                <input type="email" id="basic-icon-default-email" class="form-control" placeholder="<?php echo $run1['email']; ?>" aria-label="john.doe" aria-describedby="basic-icon-default-email2" name="email" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label" for="basic-icon-default-fullname">Password</label>
                                                                                            <div class="input-group input-group-merge">
                                                                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-lock-open-alt"></i>
                                                                                                </span>
                                                                                                <input type="password" class="form-control" id="basic-icon-default-fullname" placeholder="..........." aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" name="pass" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="defaultFormControlInput" class="form-label">Area
                                                                                            </label>
                                                                                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['area']; ?>" aria-describedby="defaultFormControlHelp" name="area" />
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="defaultFormControlInput" class="form-label">Appartment</label>
                                                                                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['appartment']; ?>" aria-describedby="defaultFormControlHelp" name="appartment" />
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="defaultFormControlInput" class="form-label">Door No
                                                                                                and Address</label>
                                                                                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['doorno']; ?>" aria-describedby="defaultFormControlHelp" name="doorno" />
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="defaultFormControlInput" class="form-label">Pincode</label>
                                                                                            <input type="number" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['pincode']; ?>" aria-describedby="defaultFormControlHelp" name="pincode" />
                                                                                        </div>
                                                                                        <div>
                                                                                            <label for="defaultFormControlInput" class="form-label">Link</label>
                                                                                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run1['address']; ?>" aria-describedby="defaultFormControlHelp" name="addresslink" />
                                                                                            <div id="defaultFormControlHelp" class="form-text">
                                                                                                Set google embede link of
                                                                                                location here.
                                                                                            </div>
                                                                                        </div> <br>
                                                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Edit Modal HTML -->

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
                                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong><?php echo $row['name'] ?></strong>
                                                                </td>
                                                                <td><?php echo $row['mobile'] ?></td>
                                                                <td><span class="badge bg-label-primary me-1"><?php echo $boxes['count(*)'] ?></span>
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
        $(document).ready(function() {


            // Function to update the error message and apply the red border to the input field
            function updateErrorMessage(inputElement, isValid, errorMessage, errorElementId) {
                if (!isValid) {
                    $(`#${errorElementId}`).text(errorMessage).show();
                    $(inputElement).addClass("is-invalid");
                } else {
                    $(`#${errorElementId}`).hide();
                    $(inputElement).removeClass("is-invalid");
                }
            }

            $("#editForm").submit(function(event) {
                event.preventDefault();
                var editId = $("#editId").val();
                var editName = $("#editName").val();
                var editMobile = $("#editMobile").val();
                var editEmail = $("#editEmail").val();

                if (!editName) {
                    updateErrorMessage(document.getElementById("editName"), false, "Member name cannot be empty.", "editNameError");
                    return;
                }

                var emails = editEmail.split(',').map(function(email) {
                    return email.trim();
                });

                // Send the updated data to the server using AJAX
                $.ajax({
                    type: "POST",
                    url: "update_member.php",
                    data: {
                        sno: editId,
                        name: editName,
                        mobile: editMobile,
                        email: emails,
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            // Update the table with the edited member data
                            updateTableWithEditedMember(data.editedMember);

                            // Close the edit modal
                            $("#editMemberModal").modal("hide"); // Close the modal after a successful update
                        } else {
                            // Handle the error case if needed
                            alert(data.error); // Display the specific error message from the server
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJAX Error:", error);
                        alert("Error updating member. Please check the console for more information.");
                    },
                });
            });


            // Function to update the table with edited member data and perform an action
            function updateTableWithEditedMember(editedMember) {
                var tableBody = $("#membersTableBody");
                var editedRow = tableBody.find("tr[data-sno='" + editedMember.sno + "']");

                // Update the table row with the edited data
                editedRow.find("td.course-title").html("<b>" + editedMember.name + "</b>");
                editedRow.find("td:nth-child(3)").text(editedMember.mobile ? editedMember.mobile : "");
                editedRow.find("td:nth-child(4)").text(editedMember.email ? editedMember.email : "");

                // Show the success alert
                $("#updateSuccessAlert").fadeIn().delay(1000).fadeOut();

                // Reload the page after the modal is closed following an update
                $(document).on("hidden.bs.modal", "#editMemberModal", function() {
                    location.reload(); // Reload the page
                });
            }

            // Handle Edit button click
            $(document).on("click", ".edit", function() {
                var sno = $(this).data("sno");
                var name = $(this).closest("tr").find("td:nth-child(2)").text();
                var mobile = $(this).closest("tr").find("td:nth-child(3)").text();
                var email = $(this).closest("tr").find("td:nth-child(4)").text();

                $("#editId").val(sno);
                $("#editSno").val(sno);
                $("#editName").val(name);
                $("#editMobile").val(mobile);
                $("#editEmail").val(email);
            });

            // Existing JavaScript code for Delete button click and other functionalities...
        });
    </script>
    <?php include 'fotter.php'; ?>
</body>

</html>