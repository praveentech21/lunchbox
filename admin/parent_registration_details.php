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
  <style>
/* Styles for the backdrop */
.backdrop {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 100;
}

/* Styles for the popup */
.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;  
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 101;
    max-width: 90%; /* Set a maximum width for the popup */
    width: auto; /* Allow the popup to expand to content width */
}

/* Media query for responsiveness */
@media (max-width: 768px) {
    .popup {
        width: 90%; /* Adjust width for smaller screens */
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
                  <td><button id="editButton">View Profile</button></td>
                </tr>
                <div id="popupBackdrop" class="backdrop">
                  <div id="popupForm" class="popup">
                    <div class="row">

                      <div class="col-xl">
                        <div class="card mb-4">
                          <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Update Parent Details</h5>
                          </div>
                          <div class="card-body">
                            <form method="post" action="#">
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Parent Name</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                  <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="<?php echo $run1['pname']; ?>" aria-label="<?php echo $run1['pname']; ?>" aria-describedby="basic-icon-default-fullname2" name="pname" />
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                                <div class="input-group input-group-merge">
                                  <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                  <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="<?php echo $run1['pid']; ?>" aria-label="<?php echo $run1['pid']; ?>" aria-describedby="basic-icon-default-phone2" name="pid" />
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">Alternative Phone</label>
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
                              <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
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
    // Get references to the button and the popup elements
const editButton = document.getElementById("editButton");
const popupBackdrop = document.getElementById("popupBackdrop");
const popupForm = document.getElementById("popupForm");

// Add an event listener to the button
editButton.addEventListener("click", function() {
    // Show the popup by changing the display styles
    popupBackdrop.style.display = "block";
    popupForm.style.display = "block";
});

// Close the popup when clicking on the backdrop
popupBackdrop.addEventListener("click", function() {
    // Hide the popup by changing the display styles
    popupBackdrop.style.display = "none";
    popupForm.style.display = "none";
});

  </script>

  <?php include 'fotter.php'; ?>
</body>

</html>