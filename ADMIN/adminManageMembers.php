<?php
require "../database/config.php";
require "../database/config.php";
//require "adminAddApplicant_process.php";
require "session.php";
include "status_functions.php";
include "functions/getEmailStatus.php";

require "../Message/PHPMailer/src/PHPMailerAutoload.php";
require '../Message/PHPMailer/src/Exception.php';
require '../Message/PHPMailer/src/PHPMailer.php';
require '../Message/PHPMailer/src/SMTP.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admin/adminMembers.css" />
  <link rel="stylesheet" href="../css/admin/adminApp.css" />
  <link rel="stylesheet" href="../css/admin/global.css">
  <link rel="stylesheet" href="../css/admin/table.css">
</head>

<body>
  <!-----------------------------NAVIGATION-------------------------------------------------->
  <?php
  include 'adminNavigation.php';
  ?>
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
        <img src="/images/logo.jpg" alt="Sample pic" />
      </div>
    </div>


    <!-----------------CARDS--------------------------------------->

    <!----------------------------------------SECTION--------------------------------------------------->
    <div class="details">
      <div>
        <ul class="navbar">
          <li><a href="#" onclick="showSection('section1')">Manage Members </a></li>
          <li><a href="#" onclick="showSection('section2')">Manage Admin</a></li>
        </ul>
      </div>
      <div class="recentApplications">
        <div class="section" id="section1">
          <div class="applicationHeader">
            <h2>Manage Members</h2>
            <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'addAdminModal'; ?>">Add Member</a>

          </div>
          <table class="applications-table" id="table1">
            <thead>
              <tr>
                <th>#</th>
                <th>Member Id</th>
                <th>Member Name</th>

                <th>Membership Status</th>
                <th>PEDICAB #</th>
                <th class="action-header" colspan="3">Action</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $sql = mysqli_query($conn, "SELECT * from tbl_member ORDER BY member_id DESC") or die(mysqli_error($conn));

              if (mysqli_num_rows($sql) > 0) {
                $rowCountAdmin = 1;
                while ($row = mysqli_fetch_array($sql)) {
                  $member_id = $row['member_id'];
                  $member_name = $row['member_name'];
                  $membership_year = $row['membership_year'];
                  $member_birthday = $row['member_birthday'];
                  $member_age = $row['member_age'];
                  $address = $row['address'];
                  $email = $row['email'];
                  $member_status = $row['membership_status'];
                  $pedicabNo = $row['pedicab_no'];



              ?>
                  <tr>
                    <td><?php echo $rowCount ?></td>
                    <td><?php echo $member_id  ?></td>
                    <td><?php echo $member_name  ?></td>
                    <td><?php echo $member_status ?></td>
                    <td><?php echo $pedicabNo ?></td>


                    <!-- <td><?php //echo $row['user_role'] 
                              ?></td> -->
                    <td>
                      <div class="action-buttons">
                        <button type="button" class="action-button editBtn modal-trigger" data-modal-id="<?php echo 'user' . $id; ?>">
                          <ion-icon name="eye-outline"></ion-icon>
                        </button>

                        <!-- Add a delete button with an onclick event -->
                        <button type="button" class="action-button deleteBtn modal-trigger" data-modal-id="<?php echo 'deleteApplicantModal' . $id ?>" data-applicant-name="<?php echo $row['firstName'] . ' ' . $row['lastName']; ?>">
                          <ion-icon name="trash-outline"></ion-icon>
                        </button>

                        <?php
                        include('modals/deleteApplicant_modal.php');
                        ?>

                        <button type="button" class="action-button decisionBtn modal-trigger" data-modal-id="<?php echo 'approveOrDenyApplicantModal' . $id; ?>" data-applicant-name="<?php echo $row['firstName'] . ' ' . $row['lastName']; ?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                          </svg>
                        </button>

                        <?php
                        include('modals/decision_modals/approveOrDeny_modal.php');
                        ?>



                        <!-- pwede ako mag add ng mata na action button tas dun ko nalang ishow ibang info ng applicant via modal para di siksikan table -->

                      </div>
                      <?php include('modals/edit_modal1.php'); ?>

                    </td>

                  </tr>

              <?php
                  $rowCount++;
                }
              } else {
                echo "Record not Found";
              }
              ?>
            </tbody>



          </table>
          <!-- Display pagination -->
          <div class="pagination">
            <!-- the pages are automatically added using js -->
          </div>
        </div>

        <!-- Manage Admin Section -->
        <div class="section" id="section2" style="display: none;">
          <div class="applicationHeader">
            <h2>Manage Admin</h2>

            <!-- button to trigger the add applicant modal -->
            <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'addAdminModal' ?>">Add Admin</a>
            <?php
            include('modals/addADMIN/addAdmin_modal.php');
            ?>
          </div>
          <table class="applications-table" id="table1">
            <thead>
              <tr>
                <th>#</th>
                <th>Admin Id</th>
                <th>Admin Name</th>
                <th>Admin Email</th>
                <th>Admin Birthday</th>
                <th class="action-header" colspan="3">Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sql = mysqli_query($conn, "SELECT * from tbl_admin ORDER BY admin_id DESC") or die(mysqli_error($conn));

              if (mysqli_num_rows($sql) > 0) {
                $rowCountAdmin = 1; // Initialize the row count for the "Manage Admin" section
                while ($row = mysqli_fetch_array($sql)) {
                  $admin_id = $row['admin_id'];
                  $adminFullName = $row['fname'] . " " . $row['lname'];
                  $admin_cpNumber = $row['admin_cpNumber'];
                  $admin_birthday = $row['admin_birthday'];
                  $admin_age = $row['admin_age'];
                  $admin_address = $row['admin_address'];
                  $email = $row['email'];
                  $account_status = $row['membership_status'];

              ?>
                  <tr>
                    <td><?php echo $rowCountAdmin ?></td>
                    <td><?php echo $admin_id  ?></td>
                    <td><?php echo $adminFullName  ?></td>
                    <td><?php echo  $email ?></td>
                    <td><?php echo $admin_birthday ?></td>
                    <td>
                      <div class="action-buttons">
                        <!-- ... (your action buttons) ... -->
                      </div>
                      <?php //include('modals/edit_modal1.php'); 
                      ?>
                    </td>
                  </tr>
              <?php
                  $rowCountAdmin++;
                }
              } else {
                echo "Record not Found";
              }
              ?>
            </tbody>
          </table>
          <!-- Display pagination -->
          <div class="pagination">
            <!-- the pages are automatically added using js -->
          </div>
        </div>
      </div>
    </div>
    <?php

    include 'modals/logout_modal.php';

    ?>


    <!---------------SCRIPT--------------------------->
    <script src="../js/ADMIN/adminManageMembers.js"></script>
    <script src="../js/ADMIN/modal.js"></script>
    <script src="../js/ADMIN/tablePagination.js"></script>
    <!---------ICONS----------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>