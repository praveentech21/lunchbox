<?php
session_start();
// Calculation for this Month
if (empty($_SESSION['supid'])) header("location: login.php");
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/"
    data-template="vertical-menu-template-free">

<head>
    <?php include 'bhavani.php'; ?>
    <style>
    /* Styles for the popup overlay */
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    /* Styles for the popup container */
    .popup-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        padding: 20px;
    }

    /* Styles for the popup content */
    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        max-height: 80vh;
        /* Set a maximum height */
        overflow-y: auto;
        /* Add vertical scroll if content exceeds the height */
        width: 100%;
        max-width: 400px;
        /* Set a maximum width */
    }

    /* Close button */
    .close-button {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Media query for responsiveness */
    @media (max-width: 768px) {
        .popup-content {
            max-width: 90%;
            /* Adjust maximum width for smaller screens */
        }
    }
    </style>
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
                                <td><button class="editButton" data-id="1">View Profile</button></td>
                            </tr>
                            <div class="popup-overlay" id="popupOverlay">
                                <div class="popup-container">
                                    <div class="popup-content">
                                        <span class="close-button" id="closeButton" style="color: red;"> &times;</span>
                                        <div class="row">

                                            <div class="col-xl">
                                                <div class="card mb-4">
                                                    <div
                                                        class="card-header d-flex justify-content-between align-items-center">
                                                        <h5 class="mb-0">Update Parent Details</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <form method="post" action="#" id="editForm">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-icon-default-fullname">Parent
                                                                    Name</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-fullname2"
                                                                        class="input-group-text"><i
                                                                            class="bx bx-user"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="basic-icon-default-fullname"
                                                                        placeholder="<?php echo $run1['pname']; ?>"
                                                                        aria-label="<?php echo $run1['pname']; ?>"
                                                                        aria-describedby="basic-icon-default-fullname2"
                                                                        name="pname" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-icon-default-phone">Phone No</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-phone2"
                                                                        class="input-group-text"><i
                                                                            class="bx bx-phone"></i></span>
                                                                    <input type="number" id="basic-icon-default-phone"
                                                                        class="form-control phone-mask"
                                                                        placeholder="<?php echo $run1['pid']; ?>"
                                                                        aria-label="<?php echo $run1['pid']; ?>"
                                                                        aria-describedby="basic-icon-default-phone2"
                                                                        name="pid" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-icon-default-phone">Alternative
                                                                    Phone</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-phone2"
                                                                        class="input-group-text"><i
                                                                            class="bx bx-phone"></i></span>
                                                                    <input type="number" id="basic-icon-default-phone"
                                                                        class="form-control phone-mask"
                                                                        placeholder="<?php echo $run1['altphone']; ?>"
                                                                        aria-label="658 799 8941"
                                                                        aria-describedby="basic-icon-default-phone2"
                                                                        name="altphone" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-icon-default-email">Email</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span class="input-group-text"><i
                                                                            class="bx bx-envelope"></i></span>
                                                                    <input type="email" id="basic-icon-default-email"
                                                                        class="form-control"
                                                                        placeholder="<?php echo $run1['email']; ?>"
                                                                        aria-label="john.doe"
                                                                        aria-describedby="basic-icon-default-email2"
                                                                        name="email" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-icon-default-fullname">Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span id="basic-icon-default-fullname2"
                                                                        class="input-group-text"><i
                                                                            class="bx bx-lock-open-alt"></i>
                                                                    </span>
                                                                    <input type="password" class="form-control"
                                                                        id="basic-icon-default-fullname"
                                                                        placeholder="..........." aria-label="John Doe"
                                                                        aria-describedby="basic-icon-default-fullname2"
                                                                        name="pass" />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-header d-flex justify-content-between align-items-center">
                                                                <h5 class="mb-0">Update Parent Address</h5>
                                                            </div>
                                                            <div>
                                                                <label for="defaultFormControlInput"
                                                                    class="form-label">Area
                                                                </label>
                                                                <input type="text" class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="<?php echo $run2['area']; ?>"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    name="area" />
                                                            </div>
                                                            <div>
                                                                <label for="defaultFormControlInput"
                                                                    class="form-label">Appartment</label>
                                                                <input type="text" class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="<?php echo $run2['appartment']; ?>"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    name="appartment" />
                                                            </div>
                                                            <div>
                                                                <label for="defaultFormControlInput"
                                                                    class="form-label">Door
                                                                    No and Address</label>
                                                                <input type="text" class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="<?php echo $run2['doorno']; ?>"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    name="doorno" />
                                                            </div>
                                                            <div>
                                                                <label for="defaultFormControlInput"
                                                                    class="form-label">Pincode</label>
                                                                <input type="number" class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="<?php echo $run2['pincode']; ?>"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    name="pincode" />
                                                            </div>
                                                            <div>
                                                                <label for="defaultFormControlInput"
                                                                    class="form-label">Link</label>
                                                                <input type="text" class="form-control"
                                                                    id="defaultFormControlInput"
                                                                    placeholder="<?php echo $run1['address']; ?>"
                                                                    aria-describedby="defaultFormControlHelp"
                                                                    name="addresslink" />
                                                                <div id="defaultFormControlHelp" class="form-text">
                                                                    Set google embede link of location here.
                                                                </div>
                                                            </div>
                                                            <div class="mt-3">
                                                                <button type="submit" name="update"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

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

    <script>
      // Get references to elements
const editButtons = document.querySelectorAll(".editButton");
const popupOverlay = document.getElementById("popupOverlay");
const closeButton = document.getElementById("closeButton");
const editForm = document.getElementById("editForm");
const userIdInput = document.getElementById("userId");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");

// Loop through each edit button and add a click event listener
editButtons.forEach(button => {
    button.addEventListener("click", function() {
        popupOverlay.style.display = "block";
        // Fetch data associated with the clicked button using data attributes
        const userId = button.getAttribute("data-id");
        // Use the userId to populate the popup with data
        populatePopupWithData(userId);
    });
});

// Close the popup when the close button is clicked
closeButton.addEventListener("click", function() {
    popupOverlay.style.display = "none";
});

// Close the popup if the user clicks outside of it
popupOverlay.addEventListener("click", function(event) {
    if (event.target === popupOverlay) {
        popupOverlay.style.display = "none";
    }
});

// Prevent form submission (replace this with actual form handling)
editForm.addEventListener("submit", function(event) {
    event.preventDefault();
    // Handle form submission here
    const userId = userIdInput.value;
    const newName = nameInput.value;
    const newEmail = emailInput.value;
    // Call a function to update data using API or other method
    updateUserData(userId, newName, newEmail);
});

// Function to populate popup fields with user data based on user ID
function populatePopupWithData(userId) {
    // Fetch user data using API or other method
    // For now, let's assume you have fetched the user data as an object
    const userData = {
        name: "John Doe",
        email: "johndoe@example.com"
    };

    userIdInput.value = userId;
    nameInput.value = userData.name;
    emailInput.value = userData.email;
}
window.addEventListener("click", function(event) {
    if (event.target === popupOverlay) {
        popupOverlay.style.display = "none";
    }
});
// Function to update user data (replace with actual update logic)
function updateUserData(userId, newName, newEmail) {
    // Perform API call or database update
    // Display success message or handle errors
}

    </script>

    <?php include 'fotter.php'; ?>
</body>

</html>