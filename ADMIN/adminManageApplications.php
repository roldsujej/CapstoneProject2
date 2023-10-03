<?php

require "../database/config.php";
require "adminAddApplicant_process.php";
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
      <div class="modal">
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

    <!-- ----------------------------------------------------EDIT MODAL--------------------------------------------------------------- -->


    <!-- Edit Modal -->
    <div class="modal-container hidden" id="editModal">
      <!-- Modal content -->
      <div class="modal">
        <div class="modal-header">
          <h2>Update Applicant Details</h2>
        </div>
        <div class="modal-body">
          <div class="card">
            <form action="adminAddApplicant_process.php" method="POST">
              <div class="form-body">
                <div class="form-group">
                  <label class="label" for="">ID:</label>
                  <input type="text" name="applicant_id" id="applicant_id" readonly class="form-control">

                </div>
                <div class="form-group">
                  <label class="label" for="">First Name</label>
                  <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter first name" required>
                  <span class="validation-message"></span>
                </div>
                <div class="form-group">
                  <label class="label" for="">Last Name</label>
                  <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter last name" required>
                  <span class="error-message hidden"></span>
                </div>
                <div class="form-group">
                  <label class="label" for="">Contact Number</label>
                  <div class="phone-input">
                    <input type="text" class="form-control" name="cpNum" id="cpNum" value="+63" required>
                  </div>
                  <div id="phoneNumberError" class="error-message hidden">Avoid entering numeric characters.</div>
                </div>
                <div class="form-group">
                  <label class="label" for="">Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder=" Blk, Lot, St, Brgy, Municipality, Province" required>
                </div>
                <div class="form-group">
                  <label class="label" for="">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label class="label" for="">Status</label>
                  <input type="text" class="form-control" name="status" id="status" readonly required>
                </div>
                <!-- Add this inside your edit modal's form -->
                <div class="form-group">
                  <label class="label" for="">Temporary Password</label>
                  <div class="password-input-container">
                    <input type="text" class="form-control" id="passwordInputEdit" name="password" placeholder="Generate temporary password" required>
                    <span id="togglePasswordEdit" class="toggle-password" onclick="togglePasswordVisibilityEdit()">
                      <ion-icon name="eye"></ion-icon>
                    </span>
                  </div>
                  <button type="button" class="generate-password-button" id="generateEditPasswordButton">Generate Password</button>

                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="modalBtn" id="submitButtonUpdate" name="updateApplicant">Update</button>
                <button type="button" class="modalBtn" id="closeEditModalButton">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- View Modal -->
    <div class="modal-container hidden" id="viewModal">
      <!-- Modal content -->
      <div class="modal">
        <div class="modal-header">
          <h2>Applicant's Information</h2>
        </div>
        <div class="modal-body">
          <div class="card">
            <form action="fetchAdditionalInfo.php" method="POST">
              <div class="form-body">
                <div class="form-group">
                  <label class="label" for="applicant_id_view">Applicant ID:</label>
                  <input type="text" name="applicant_id" id="applicant_id_view" readonly class="form-control">

                </div>
                <div class="form-group">
                  <label class="label" for="">First Name</label>
                  <input type="text" class="form-control" name="firstName" id="firstName_view" placeholder="Enter first name" disabled>
                  <span class="validation-message"></span>
                </div>
                <div class="form-group">
                  <label class="label" for="">Last Name</label>
                  <input type="text" class="form-control" name="lastName" id="lastName_view" placeholder="Enter last name" disabled>
                  <span class="error-message hidden"></span>
                </div>
                <div class="form-group">
                  <label class="label" for="">Contact Number</label>
                  <div class="phone-input">
                    <input type="text" class="form-control" name="cpNum" id="cpNum_view" value="+63" disabled>
                  </div>

                </div>
                <div class="form-group">
                  <label class="label" for="">Address</label>
                  <input type="text" class="form-control" name="address" id="address_view" placeholder=" Blk, Lot, St, Brgy, Municipality, Province" disabled>
                </div>
                <div class="form-group">
                  <label class="label" for="">Email</label>
                  <input type="email" class="form-control" name="email" id="email_view" placeholder="Enter email" disabled>
                </div>
                <div class="form-group">
                  <label class="label" for="">Status</label>
                  <input type="text" class="form-control" name="status" id="status_view" readonly disabled>
                </div>

                <div class="form-group">
                  <label class="label" for="">Membership Status</label>
                  <input type="text" class="form-control" name="membership_status" id="membership_status_view" readonly disabled>
                </div>
                <!-- Add this inside your edit modal's form -->
                <div class="form-group">
                  <label class="label" for="">Temporary Password</label>
                  <div class="password-input-container">
                    <input type="text" class="form-control" id="passwordInputView" name="password" placeholder="Applicant's temporary password" disabled>


                  </div>
                  <!-- <button type="button" class="generate-password-button" id="generateEditPasswordButton">Generate Password</button> -->

                </div>
              </div>
              <div class="modal-footer">
                <!-- <button type="submit" class="modalBtn" id="submitButtonUpdate" name="updateApplicant">Update</button> -->
                <button type="button" class="modalBtn" id="closeViewModalButton">Close</button>
              </div>
            </form>
          </div>
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
        $query1 = "SELECT `id`, `firstName`, `lastName`, `cpNumber`, `address`, `email`, `temporary_password`,  `status`, `membership_status` FROM `account_profiles` ";
        $query_run1 = mysqli_query($conn, $query1);

        ?>

        <table class="applications-table">
          <thead>
            <tr>
              <th>Applicant Id</th>
              <th>Applicant Name</th>
              <th>Email</th>
              <th>Account Profile Status</th>
              <th>Membership Status</th>
              <th class="action-header" colspan="3">Action</th>

            </tr>
          </thead>

          <tbody>
            <?php

            if ($query_run1) {
              foreach ($query_run1 as $row) {
                $status = $row['status'] == 1 ? 'Verified' : 'Pending Verification';
                // Dito malalaman if applicant, non official or member na ba si user.
                $membershipStatus = '';
                switch ($row['membership_status']) {
                  case 1:
                    $membershipStatus = 'Applicant';
                    break;
                  case 2:
                    $membershipStatus = 'Non-official member';
                    break;
                  case 3:
                    $membershipStatus = 'Official Member';
                    break;
                  default:
                    $membershipStatus = 'Pending Verification';
                    break;
                }
            ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td data-applicant-name="<?php echo $row['firstName'] . " " . $row['lastName']; ?>"><?php echo $row['firstName'] . " " . $row['lastName']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><span class="status <?php echo $row['status'] == 1 ? 'approved' : 'pending'; ?>"><?php echo $status; ?></span></td>
                  <td><span class="status <?php echo $row['membership_status'] == 1 ? 'applicant' : ($row['membership_status'] == 2 ? 'non-official' : 'official'); ?>"><?php echo $membershipStatus; ?></span></td>
                  <td>
                    <div class="action-buttons">
                      <button type="button" class="action-button editBtn">
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
  <script src="../script/admindashboard.js"></script>
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






    document.addEventListener("DOMContentLoaded", function() {
      const openModalButton = document.getElementById("openModalButton");
      const closeModalButton = document.getElementById("closeModalButton");
      const modalContainer = document.getElementById("modalContainer");
      const firstNameInput = document.querySelector('input[name="firstName"]');
      const lastNameInput = document.querySelector('input[name="lastName"]');
      const firstNameValidation = document.querySelector('span.validation-message:nth-child(1)');
      const lastNameValidation = document.querySelector('span.validation-message:nth-child(3)');
      const generatePasswordButton = document.getElementById("generatePasswordButton");
      const generateEditPasswordButton = document.getElementById("generateEditPasswordButton");
      const passwordInput = document.querySelector('input[name="password"]');
      const passwordInputEdit = document.querySelector('input[name="password"][id="passwordInputEdit"]');
      const deleteButtons = document.querySelectorAll(".deleteBtn");


      // Update the delete modal message with the applicant's name
      function updateDeleteModalMessage(applicantName) {
        const deleteModalMessage = document.getElementById("deleteModalMessage");
        deleteModalMessage.textContent = `Are you sure you want to delete the profile of ${applicantName}?`;
      }

      // This line of codes are responsible for deleteModal
      deleteButtons.forEach(function(button) {
        button.addEventListener("click", function() {
          // Get the applicant ID from the data attribute
          const applicantId = button.getAttribute("data-applicant-id");
          // Get the applicant name from the data-applicant-name attribute of the corresponding row
          const row = button.closest("tr");
          const applicantName = button.getAttribute("data-applicant-name")

          // Set the applicant ID in the deleteModal form (assuming you have an input field for it)
          document.getElementById("applicantIdToDelete").value = applicantId;

          // Show the deleteModal
          const deleteModalMessage = document.getElementById("deleteModalMessage");
          deleteModalMessage.textContent = `Are you sure you want to delete ${applicantName}'s profile?`;
          deleteModal.style.display = "flex";
        });
      });



      // Add a click event listener to the close button in the deleteModal
      const closeDeleteModalButton = document.getElementById("closeDeleteModalButton");
      closeDeleteModalButton.addEventListener("click", function() {
        // Hide the deleteModal
        const deleteModal = document.getElementById("deleteModal");
        deleteModal.style.display = "none";
      });



      generatePasswordButton.addEventListener("click", function() {
        const newPassword = generateRandomPassword();
        passwordInput.value = newPassword;
      });
      //This is the generate password for the editModal
      generateEditPasswordButton.addEventListener("click", function() {
        const newPassword = generateRandomPassword();
        passwordInputEdit.value = newPassword;
      });



      function openEditModal() {
        $('#editModal').removeClass('hidden');
      }

      function closeEditModal() {
        $('#editModal').addClass('hidden');
      }


      function openViewModal() {
        $('#viewModal').removeClass('hidden');
      }

      function closeViewModal() {
        $('#viewModal').addClass('hidden');
      }






      // Regular expression to allow only alphabetic characters and spaces
      const nameRegex = /^[a-zA-Z\s]*$/;

      // Function to validate the input and update the validation message
      function validateNameInput(input, validationElement) {
        const value = input.value;
        if (!nameRegex.test(value)) {
          validationElement.textContent = "Please avoid entering numeric characters.";
          validationElement.classList.add("error-message"); // Apply the error message class
          input.value = value.replace(/[^a-zA-Z\s]/g, ""); // Remove non-alphabetic characters
        } else {
          validationElement.textContent = ""; // Clear the validation message
          validationElement.classList.remove("error-message"); // Remove the error message class
        }
      }

      // Add event listeners to the input fields
      firstNameInput.addEventListener("input", function() {
        validateNameInput(firstNameInput, firstNameValidation);
      });

      lastNameInput.addEventListener("input", function() {
        validateNameInput(lastNameInput, lastNameValidation);
      });
      // Function to open the modal
      function openModal() {
        modalContainer.style.display = "flex"; // Show the modal
      }

      // Function to close the modal
      function closeModal() {
        modalContainer.style.display = "none"; // Hide the modal
      }




      // Function to generate a random password

      function generateRandomPassword() {
        const length = 10; // You can adjust the desired length of the password
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";

        let password = "";
        for (let i = 0; i < length; i++) {
          const randomIndex = Math.floor(Math.random() * charset.length);
          password += charset.charAt(randomIndex);
        }

        return password;
      }






      function submitEditForm(event) {
        event.preventDefault(); // Prevent the default form submission

        // You can add validation here before submitting the form

        // Submit the form using an AJAX request
        const formData = new FormData(editApplicantForm);
        fetch(editApplicantForm.action, {
            method: "POST",
            body: formData,
          })
          .then(response => response.json())
          .then(data => {
            // Handle the response, e.g., show a success message or handle errors
            console.log(data);
            closeEditModal(); // Close the edit modal after successful submission
          })
          .catch(error => {
            console.error("Error:", error);
          });
      }

      // Function to handle form submission
      function submitForm(event) {
        // Prevent the default form submission

        // You can add validation here before submitting the form

        // Submit the form using an AJAX request
        const formData = new FormData(addApplicantForm);
        fetch(addApplicantForm.action, {
            method: "POST",
            body: formData,
          })
          .then(response => response.json())
          .then(data => {
            // Handle the response, e.g., show a success message or handle errors
            console.log(data);
            closeModal(); // Close the modal after successful submission

          })

          .catch(error => {
            console.error("Error:", error);
          });
      }

      // This is the toggle function or the eye icon in the edit modal
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

      // Function to open the edit modal

      // Function to open the edit modal
      $('.editBtn').on('click', function() {
        const $tr = $(this).closest('tr');
        const data = $tr.find('td').map(function() {
          return $(this).text();
        }).get();

        console.log(data);
        const applicantId = data[0]; // Replace with the correct index

        // Set the values in the edit modal
        $('#applicant_id').val(applicantId);
        const nameParts = data[1].split(' ');
        $('#firstName').val(nameParts[0]);
        $('#lastName').val(nameParts[1]);
        $('#cpNum').val(data[3]);
        $('#address').val(data[4]);
        $('#email').val(data[5]);
        $('#passwordInputEdit').val(data[6]);
        $('#status').val(data[7]);

        if (data[6] === 'Verified') {
          $('#status').removeClass('status-pending').addClass('status-verified');
        } else {
          $('#status').removeClass('status-verified').addClass('status-pending');
        }


        // Show the edit modal
        openEditModal();
      });

      // Function to close the edit modal
      $('#closeEditModalButton').on('click', function() {
        closeEditModal();
      });

      // View Modal

      // // Function to open the view modal
      // $('.viewBtn').on('click', function() {
      //   const $tr = $(this).closest('tr');
      //   const data = $tr.find('td').map(function() {
      //     return $(this).text();
      //   }).get();

      //   console.log(data);
      //   const applicantId = data[0]; // Replace with the correct index

      //   $('#applicant_id_view').val(applicantId);
      //   const nameParts = data[1].split(' ');
      //   $('#firstName_view').val(nameParts[0]);
      //   $('#lastName_view').val(nameParts[1]);
      //   $('#cpNum_view').val(data[3]); // Index 3 corresponds to cpNumber
      //   $('#address_view').val(data[4]); // Index 4 corresponds to address
      //   $('#email_view').val(data[5]); // Index 5 corresponds to email
      //   $('#passwordInputView').val(data[6]); // Index 6 corresponds to temporary_password
      //   $('#status_view').val(data[7]); // Index 10 corresponds to status
      //   $('#membership_status_view').val(data[8]); // Index 11 corresponds to membership_status

      //   if (data[6] === 'Verified') {
      //     $('#status_view').removeClass('status-pending').addClass('status-verified');
      //   } else {
      //     $('#status_view').removeClass('status-verified').addClass('status-pending');
      //   }


      //   // Show the edit modal
      //   openViewModal();
      // });



      // JavaScript code to open the view modal
      // var viewBtns = document.querySelectorAll('.viewBtn');
      // var viewModal = document.getElementById('viewModal');
      // var closeViewModalButton = document.getElementById('closeViewModalButton');

      // viewBtns.forEach(function(btn) {
      //   btn.addEventListener('click', function() {
      //     // Retrieve the applicant ID from the button's data attribute
      //     var applicantId = btn.getAttribute('data-applicant-id');

      //     // Make an AJAX request to fetch additional data
      //     fetch('fetchAdditionalInfo.php?applicant_id=' + applicantId)
      //       .then(response => response.json())
      //       .then(data => {
      //         // Update the view modal fields with the fetched data
      //         document.getElementById('applicant_id_view').value = data.applicant_id;
      //         document.getElementById('firstName_view').value = data.first_name;
      //         document.getElementById('lastName_view').value = data.last_name;
      //         // Update other view modal fields here

      //         // Show the view modal
      //         viewModal.style.display = 'block';
      //       })
      //       .catch(error => {
      //         console.error('Error:', error);
      //       });
      //   });
      // });

      // closeViewModalButton.addEventListener('click', function() {
      //   viewModal.style.display = 'none';
      // });
      // // Close the modal if the user clicks outside the modal content
      // window.addEventListener('click', function(event) {
      //   if (event.target === viewModal) {
      //     viewModal.style.display = 'none';
      //   }
      // });











      // Event listener to open the modal when the "Add" button is clicked
      openModalButton.addEventListener("click", openModal);

      // Event listener to close the modal when the close button is clicked
      closeModalButton.addEventListener("click", closeModal);

      // Event listener to handle form submission when the submit button is clicked
      addApplicantForm.addEventListener("submit", submitForm);
      // Event listener to handle form submission when the submit button is clicked in the Edit modal
      editApplicantForm.addEventListener("submit", submitEditForm); // Add this line
    });
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