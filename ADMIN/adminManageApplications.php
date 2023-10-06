<?php

require "../database/config.php";
//require "adminAddApplicant_process.php";
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
  <link rel="stylesheet" href="../script/ADMIN/global.css">
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













    <!----------------------------------------SECTION--------------------------------------------------->
    <div class="details">
      <div class="recentApplications">
        <div class="applicationHeader">
          <h2>Manage Membership Applications</h2>
          <div class="button-container">
            <!-- button to trigger the add applicant modal -->
            <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'addApplicantModal' ?>"><ion-icon name="add"></ion-icon></a>
            <?php
            include('modals/addapplicant_modal.php');
            ?>
          </div>
        </div>

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
            $sql = mysqli_query($conn, "SELECT * from account_profiles ORDER BY id ASC") or die(mysqli_error($conn));

            if (mysqli_num_rows($sql) > 0) {
              while ($row = mysqli_fetch_array($sql)) {
                $id = $row['id'];
                $fname = $row['firstName'];
                $lname = $row['lastName'];
                $cpNumber = $row['cpNumber'];
                $address = $row['address'];
                $email = $row['email'];
                $status = $row['status'] == 1 ? 'Verified' : 'Pending Verification';
                $password = $row['password'];
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
                      <button type="button" class="action-button editBtn modal-trigger" data-modal-id="<?php echo 'user' . $id; ?>">
                        <ion-icon name="open-outline"></ion-icon>
                      </button>

                      <!-- Add a delete button with an onclick event -->
                      <button type="button" class="action-button deleteBtn modal-trigger" data-modal-id="<?php echo 'deleteApplicantModal' . $id ?>" data-applicant-name="<?php echo $row['firstName'] . ' ' . $row['lastName']; ?>">
                        <ion-icon name="trash-outline"></ion-icon>
                      </button>
                      <?php
                      include('modals/deleteApplicant_modal.php'); ?>




                      <!-- pwede ako mag add ng mata na action button tas dun ko nalang ishow ibang info ng applicant via modal para di siksikan table -->



                    </div>
                    <?php include('modals/edit_modal1.php'); ?>
                    <?php include('modals/view_modal1.php'); ?>
                  </td>

                </tr>

            <?php

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
  <!-- <script src="../script/ADMIN/adminManageApplication.js"></script> -->
  <script src="../script/ADMIN/adminManageApplication.js"></script>
  <script src="../script/ADMIN/modal.js"></script>
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

  <script>
    // Function to generate a random password for the add applicant modal
    function generatePasswordForAdd() {
      // Generate a random password using your existing function
      const generatedPassword = generateRandomPassword(8);

      // Find the generated password input field
      const passwordInput = document.getElementById("passwordInput");

      // Update the password input field with the generated value
      passwordInput.value = generatedPassword;

      // Change the input type to "text" to temporarily reveal the password
      passwordInput.type = "text";

      // Automatically hide the password after 3 seconds (adjust the time as needed)
      setTimeout(function() {
        passwordInput.type = "password";
      }, 3000); // 3000 milliseconds (3 seconds)
    }

    // Add an event listener to the "Generate Password" button in the add applicant modal
    document
      .getElementById("generatePasswordButton")
      .addEventListener("click", generatePasswordForAdd);
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