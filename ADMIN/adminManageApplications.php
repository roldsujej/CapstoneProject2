<?php

require "../database/config.php";
require "adminAddApplicant_process.php";
require "session.php"
//include "fetchAdditionalInfo.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admin/adminApp.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
  <!-----------------------------NAVIGATION-------------------------------------------------->
  <div class="container">
    <div class="navigation">
      <ul>
        <li>
          <a href="">
            <span class="icon"><ion-icon name="car-outline"></ion-icon></span>
            <span class="title">CAPEDA</span>
          </a>
        </li>
        <li>
          <a href="admindashboard.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="adminManageApplications.php">
            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
            <span class="title">Manage Applications</span>
          </a>
        </li>
        <li>
          <a href="adminManageMembers.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Manage Members</span>
          </a>
        </li>
        <li>
          <a href="adminManageAccounts.php">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Manage Accounts</span>
          </a>
        </li>
        <li>
          <a href="adminManageNewsAndAlerts.php">
            <span class="icon"><ion-icon name="alert-outline"></ion-icon></span>
            <span class="title">News and Alerts</span>
          </a>
        </li>
        <li>
          <a href="">
            <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
            <span class="title">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-------------------------MAIN---------------------------->
  <div class="main">
    <div class="topbar">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
      <div class="search">
        <label for="">
          <input type="text" placeholder="Search here" />
          <ion-icon name="search-outline"></ion-icon>
        </label>
      </div>
      <div class="user">
        <img src="../images/logo.jpg" alt="Sample pic" />
      </div>
    </div>


    <!-- Add a class "hidden" to hide the modal initially -->

    <!-- Create the modal container -->
    <div class="modal-container hidden" id="modalContainer">
      <!-- Modal content -->
      <div class="modal" id="<?php echo $id; ?>">
        <div class="modal-header">
          <h2>Add New Applicant</h2>
        </div>
        <div class="modal-body">
          <div class="card">

            <form id="addApplicantForm" action="adminAddApplicant_process.php" method="POST">

              <div class="form-body">
                <div class="form-group">
                  <label class="label" for="">First Name</label>
                  <input type="text" class="form-control" name="firstName" placeholder="Enter first name" required>
                  <span class="validation-message"></span>
                </div>

                <div class="form-group">
                  <label class="label" for="">Last Name</label>
                  <input type="text" class="form-control" name="lastName" placeholder="Enter last name" required>
                  <span class="error-message hidden"></span>
                </div>

                <div class="form-group">
                  <label class="label" for="">Contact Number</label>
                  <div class="phone-input">
                    <input type="text" class="form-control" name="cpNum" value="+63" required>
                  </div>
                  <div id="phoneNumberError" class="error-message hidden">Avoid entering numeric characters.</div>
                </div>

                <div class="form-group">
                  <label class="label" for="">Address</label>
                  <input type="text" class="form-control" name="address" placeholder=" Blk, Lot, St, Brgy, Municipality, Province" required>
                </div>

                <div class="form-group">
                  <label class="label" for="">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                  <label class="label" for=""> Temporary Password</label>
                  <div class="password-input-container">
                    <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Generate temporary password" readonly required>
                    <span id="togglePassword" class="toggle-password" onclick="togglePasswordVisibility()">
                      <ion-icon name="eye"></ion-icon>
                    </span>
                  </div>
                  <button type="button" class="generate-password-button" id="generatePasswordButton">Generate Password</button>
                </div>



                <!-- <div class="form-group">
                  <label class="label" for="">Re-enter Temporary Password</label>
                  <input type="password" class="form-control" name="confirmPassword" placeholder="Re-type password" required>
                </div> -->

              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="modalBtn" id="submitButton" name="addApplicant">Submit</button>

            <button type="button" class="modalBtn" id="closeModalButton">Close</button>

          </div>



          </form>
        </div>







      </div>
    </div>









    <!------------------DELETE MODAL---------------------------------------->
    <div class="modal-container hidden" id="deleteModal">
      <!-- Modal content -->
      <div class="modal">
        <div class="modal-header">
          <h2>Delete Applicant Profile</h2>
        </div>
        <div class="modal-body">
          <div class="card">
            <form action="adminAddApplicant_process.php" method="POST">

              <input type="hidden" name="applicantIdToDelete" id="applicantIdToDelete" />
              <h3 id="deleteModalMessage">Are you sure you want to delete this profile?</h3>


              <div class="modal-footer">
                <button type="submit" class="modalBtn" id="deleteModalBtn" name="deleteApplicant">Yes</button>
                <button type="button" class="modalBtn" id="closeDeleteModalButton">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>







    <!----------------------------------------SECTION--------------------------------------------------->
    <div class="details">
      <div class="recentApplications">
        <div class="applicationHeader">
          <h2>Manage Membership Applications</h2>
          <div class="button-container">
            <!-- <a href="#" class="btn">View All</a> -->
            <a href="#" class="btn" id="openModalButton"><ion-icon name="add"></ion-icon></a> <!----modal trigger--->
          </div>
        </div>

        <?php
        $sql = mysqli_query($conn, "SELECT * from account_profiles ORDER BY id ASC") or die(mysqli_error($conn));
        // $query_run1 = mysqli_query($conn, $query1);

        ?>

        <table class="applications-table">
          <thead>
            <tr>
              <th>Applicant Id</th>
              <th>Applicant Name</th>
              <th>Email</th>
              <th>Account Profile Status</th>
              <th class="action-header" colspan="3">Action</th>

            </tr>
          </thead>

          <tbody>
            <?php

            if (mysqli_num_rows($sql) > 0) {
              while ($row = mysqli_fetch_array($sql)) {
                $id = $row['id'];
                $fname = $row['firstName'];
                $lname = $row['lastName'];
                $cpNumber = $row['cpNumber'];
                $address = $row['address'];
                $email = $row['email'];
                $status = $row['status'] == 1 ? 'Verified' : 'Pending Verification';
                $user_role = $row['user_role'];

            ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td data-applicant-name="<?php echo $row['firstName'] . " " . $row['lastName']; ?>"><?php echo $row['firstName'] . " " . $row['lastName']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><span class="status <?php echo $row['status'] == 1 ? 'approved' : 'pending'; ?>"><?php echo $status; ?></span></td>
                  <!-- <td><?php //echo $row['user_role'] 
                            ?></td> -->
                  <td>
                    <div class="action-buttons">
                      <button type="button" class="action-button editBtn" data-applicant-id="<?php echo $id; ?>">
                        <ion-icon name="open-outline"></ion-icon>
                      </button>
                      <!-- Add a delete button with an onclick event -->
                      <button type="button" class="action-button deleteBtn" data-applicant-id="<?php echo $row['id']; ?>" data-applicant-name="<?php echo $row['firstName'] . ' ' . $row['lastName']; ?>">
                        <ion-icon name="trash-outline"></ion-icon>
                      </button>

                      <button type="button" class="action-button viewBtn" data-applicant-id="<?php echo $row['id']; ?>"> <!-- Replace "123" with the actual applicant ID -->
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                      <!-- pwede ako mag add ng mata na action button tas dun ko nalang ishow ibang info ng applicant via modal para di siksikan table -->
                    </div>
                  </td>

                </tr>
            <?php
                include('modals/edit_modal.php');
              }
            } else {
              echo "Record not Found";
            }
            ?>
          </tbody>



        </table>
      </div>
    </div>
  </div>

  <!---------------SCRIPT--------------------------->
  <script src="../script/ADMIN/adminManageApplication.js"></script>
  <!---------ICONS----------------------------------->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





  <script>
    // Define the togglePasswordVisibility function in the global scope
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById("passwordInput");
      const togglePasswordIcon = document.getElementById("togglePassword");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePasswordIcon.innerHTML = '<ion-icon name="eye-off"></ion-icon>';
        passwordInput.placeholder = ""; // Clear the placeholder text
      } else {
        passwordInput.type = "password";
        togglePasswordIcon.innerHTML = '<ion-icon name="eye"></ion-icon>';
        passwordInput.placeholder = "Enter password"; // Restore the placeholder text
      }
    }

    // The toggle password button function on the edit modal
    function togglePasswordVisibilityEdit() {
      const passwordInputEdit = document.getElementById("passwordInputEdit");
      const togglePasswordIconEdit = document.getElementById("togglePasswordEdit");

      if (passwordInputEdit.type === "password") {
        passwordInputEdit.type = "text";
        togglePasswordIconEdit.innerHTML = '<ion-icon name="eye-off"></ion-icon>';
        passwordInputEdit.placeholder = ""; // Clear the placeholder text
      } else {
        passwordInputEdit.type = "password";
        togglePasswordIconEdit.innerHTML = '<ion-icon name="eye"></ion-icon>';
        passwordInputEdit.placeholder = "Generate temporary password"; // Restore the placeholder text
      }
    }
  </script>

  <!-- SweetAlert Script -->
  <?php
  if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {
  ?>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
          title: "<?php echo $_SESSION['status']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          showConfirmButton: true,
        });

      });
    </script>
  <?php
    unset($_SESSION['status']);
  }
  ?>












</body>

</html>