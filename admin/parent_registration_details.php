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
    /* Centering popup */
    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .popup-container {
      background-color: white;
      max-width: 90%;
      /* Adjust the maximum width as needed */
      width: auto;
      /* Allow the width to adjust based on content */
      max-height: 80vh;
      /* Adjust the maximum height as needed */
      overflow-y: auto;
      /* Enable scrolling if content overflows */
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Other styling */
    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

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
                  <td><button class="editButton" data-id="<?php $row['pid'] ?>">Edit</button></td>
                </tr>
                <div class="popup-overlay" id="popupOverlay">
                  <div class="popup-container">
                    <div class="popup-content">
                      <span class="close-button" id="closeButton">&times;</span>
                      <form id="editForm" method="post" action="#">
                        <div class="row">

                          <div class="col-xl">
                            <div class="card mb-4">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Update Parent Details</h5>
                              </div>
                              <div class="card-body">
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
                                <div>
                                  <label for="defaultFormControlInput" class="form-label">Area </label>
                                  <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['area']; ?>" aria-describedby="defaultFormControlHelp" name="area" />
                                </div>
                                <div>
                                  <label for="defaultFormControlInput" class="form-label">Appartment</label>
                                  <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['appartment']; ?>" aria-describedby="defaultFormControlHelp" name="appartment" />
                                </div>
                                <div class="mb-3">
                                  <label for="defaultFormControlInput" class="form-label">Door No and Address</label>
                                  <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['doorno']; ?>" aria-describedby="defaultFormControlHelp" name="doorno" />
                                </div>
                                <div class="mb-3">
                                  <label for="defaultFormControlInput" class="form-label">Pincode</label>
                                  <input type="number" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run2['pincode']; ?>" aria-describedby="defaultFormControlHelp" name="pincode" />
                                </div>
                                <div class="mb-3">
                                  <label for="defaultFormControlInput" class="form-label">Link</label>
                                  <input type="text" class="form-control" id="defaultFormControlInput" placeholder="<?php echo $run1['address']; ?>" aria-describedby="defaultFormControlHelp" name="addresslink" />
                                  <div id="defaultFormControlHelp" class="form-text">
                                    Set google embede link of location here.
                                  </div>
                                </div>
                                <div class="mt-3">
                                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </form>
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
    const editButtons = document.querySelectorAll(".editButton");
    const popupOverlay = document.getElementById("popupOverlay");
    const closeButton = document.getElementById("closeButton");
    const editForm = document.getElementById("editForm");
    const pname = document.getElementsByName("pname");
    const pid = document.getElementsByName("pid");
    const altphone = document.getElementsByName("altphone");
    const email = document.getElementsByName("email");
    const pass = document.getElementsByName("pass");
    const area = document.getElementsByName("area");
    const appartment = document.getElementsByName("appartment");
    const doorno = document.getElementsByName("doorno");
    const pincode = document.getElementsByName("pincode");
    const addresslink = document.getElementsByName("addresslink");


    editButtons.forEach(button => {
      button.addEventListener("click", function() {
        popupOverlay.style.display = "flex";
        const pid = button.getAttribute("data-id");
        window.document.write(pid);
        // Populate the form with data for the person to be edited
        $.ajax({
          url: 'fetch_data.php', // Replace with the actual URL to your PHP script
          method: 'GET',
          data: {
            pid: pid
          },
          dataType: 'json',
          success: function(data) { 
            pname.value = data.pname;
            pid.value = data.pid;
            altphone.value = data.altphone;
            email.value = data.email;
            pass.value = data.pass;
            area.value = data.area;
            appartment.value = data.appartment;
            doorno.value = data.doorno;
            pincode.value = data.pincode;
            addresslink.value = data.addresslink;
            console.log(data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX Error:', textStatus, errorThrown);
          }
        });
      });
    });

    closeButton.addEventListener("click", function() {
      popupOverlay.style.display = "none";
    });

    popupOverlay.addEventListener("click", function(event) {
      if (event.target === popupOverlay) {
        popupOverlay.style.display = "none";
      }
    });

    editForm.addEventListener("submit", function(event) {
      event.preventDefault();
      // Handle form submission and data update
      // Update the main page with the edited data
      popupOverlay.style.display = "none";
    });
  </script>
  <?php include 'fotter.php'; ?>
</body>

</html>