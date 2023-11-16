<?php

require "../database/config.php";
//require "adminAddApplicant_process.php";
//require "session.php"
//include "fetchAdditionalInfo.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admin/adminManageRequirements.css" />
  <link rel="stylesheet" href="../css/admin/global.css">
  <link rel="stylesheet" href="../css/admin/table.css">
  <link rel="stylesheet" href="../css/admin/notification.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
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
        <img src="../images/logo.jpg" alt="Sample pic" />
      </div>
    </div>















    <!----------------------------------------SECTION--------------------------------------------------->
    <div class="details">
      <ul class="navbar">
        <li><a href="#" onclick="showSection('section1')">Manage Requirements </a></li>
        <li><a href="#" onclick="showSection('section2')">Manage Uploaded Documents</a></li>
      </ul>



      <div class="recentApplications">
        <div class="section" id="section1">
          <div class="applicationHeader">

            <h2 class="header-with-bell">
              Manage Requirements
              <div class="notification-container">
                <ion-icon name="notifications-outline" class="notification-bell"></ion-icon>
                <span class="notification-count">0</span>
              </div>
            </h2>
            <!-- when clicked redirect to a page where the uploaded documents are displayed -->

            <div class="button-container">
              <!-- button to trigger the add applicant modal -->
              <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'requirement' ?>">
                <ion-icon name="add"></ion-icon>
              </a>
              <?php
              include('modals/addrequirement_modal.php');
              ?>
            </div>
          </div>





          <table class="applications-table" id="table1">
            <thead>
              <tr>
                <th>Requirement ID</th>
                <th>Requirement Name</th>
                <th>Requirement Description</th>
                <th>Requirement Status</th>
                <th>Document Type</th>
                <!-- <th>Created At</th>
              <th>Updated At</th> -->

                <th class="action-header" colspan="3">Action</th>

              </tr>
            </thead>

            <tbody>
              <?php
              $sql = mysqli_query($conn, "SELECT * from required_documents ORDER BY document_id ASC") or die(mysqli_error($conn));

              if (mysqli_num_rows($sql) > 0) {
                while ($row = mysqli_fetch_array($sql)) {

                  $document_id = $row['document_id'];
                  $document_name = $row['document_name'];
                  $document_description = $row['document_description'];
                  $document_status = $row['is_required'];
                  $creation_date = $row['created_at'];
                  $update_date = $row['updated_at'];
                  $document_type = $row['document_type'];


              ?>
                  <tr class="<?php echo $document_status === 'optional' ? 'optional-row' : ''; ?>">
                    <td><?php echo $document_id; ?></td>
                    <td><?php echo $document_name ?></td>
                    <td><?php echo $document_description ?></td>
                    <td>
                      <span class="status <?php echo $document_status === 'required' ? 'required' : 'optional'; ?>">
                        <?php echo strtoupper($document_status === 'required' ? 'required' : 'optional'); ?>
                      </span>
                    </td>
                    <td><?php echo $document_type ?></td>

                    <td>
                      <div class="action-buttons">
                        <button type="button" class="action-button editBtn modal-trigger" data-modal-id="<?php echo 'EditRequirement' . $document_id ?>">
                          <ion-icon name="open-outline"></ion-icon>
                        </button>

                        <button type="button" class="action-button deleteBtn modal-trigger" data-modal-id="<?php echo 'deleteRequirementModal' . $document_id; ?>" data-document-name="<?php echo $row['document_name'] ?>">
                          <ion-icon name="trash-outline"></ion-icon>
                        </button>
                        <?php include('modals/deleteRequirement_modal.php'); ?>
                      </div>
                      <?php include('modals/editRequirement_modal.php'); ?>
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
          <div class="pagination">
            <!-- the pages are automatically added using js -->
          </div>
        </div>


        <div class="section" id="section2" style="display: none;">
          <div class="applicationHeader">
            <h2>Manage Uploaded Documents</h2>

            <!-- button to trigger the add applicant modal -->
            <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'addAdminModal' ?>">Add Admin</a>
            <?php
            include('modals/addADMIN/addAdmin_modal.php');
            ?>
          </div>
          <table class="applications-table" id="table2">
            <thead>
              <tr>
                <!-- <th>Document ID</th> -->
                <th>Applicant ID</th>
                <th>Uploader</th>
                <th>Document Name</th>
                <th>File Name</th>
                <th>Upload Date</th>
                <th class="action-header" colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // $uploadedDocsQuery = "SELECT ud.id as doc_id, ud.document_id, ud.file_name, ud.file_path, ud.upload_date, ap.firstName, ap.lastName, r.document_name 
              //       FROM uploaded_documents ud 
              //       JOIN account_profiles ap ON ud.applicant_id = ap.id
              //       JOIN required_documents r ON ud.document__id = r.document_id";

              $uploadedDocsQuery = "SELECT ud.id as doc_id, ud.applicant_id, ud.document_id, ud.file_name, ud.file_path, ud.upload_date, ap.id, ap.firstName, ap.lastName, r.document_name
                      FROM uploaded_documents ud 
                      JOIN account_profiles ap ON ud.applicant_id = ap.id
                      JOIN required_documents r ON ud.document_id = r.document_id";

              $uploadedDocsResult = $conn->query($uploadedDocsQuery);

              if ($uploadedDocsResult->num_rows > 0) {
                while ($row = $uploadedDocsResult->fetch_assoc()) {
                  $docId = $row['doc_id'];
                  $targetPath = 'http://localhost/CapstoneProject2/Applicant/uploads/applicant_uploads/' . $row['file_name'];

              ?>
                  <tr>
                    <td><?php echo $row['id'];  // pwede to tanggalin if ever di need inadd ko lng pra di nakakalito
                        ?></td>
                    <td><?php echo $row['firstName'] . ' ' . $row['lastName'] ?></td>
                    <td><?php echo $row['document_name'] ?></td>
                    <td><?php echo $row['file_name']  ?></td>
                    <td><?php echo $row['upload_date'] ?></td>
                    <td>
                      <div class="action-buttons">
                        <button type="button" class="action-button viewBtn modal-trigger" data-modal-id="<?php echo 'viewDocumentModal' . $row['doc_id']; ?>">
                          <ion-icon name="eye-outline"></ion-icon>
                        </button>

                        <button type="button" class="action-button validateBtn" onclick="validateDocument(<?php echo $row['doc_id']; ?>)">
                          Validate
                        </button>

                        <button type="button" class="action-button deleteBtn modal-trigger" data-modal-id="<?php echo 'deleteDocumentModal' . $row['doc_id']; ?>">
                          <ion-icon name="trash-outline"></ion-icon>
                        </button>
                      </div>

                      <?php //include('modals/deleteDocument_modal.php'); 
                      ?>
                      <?php include('modals/documents/viewDocument_modal.php');
                      ?>
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
          <div class="pagination">
            <!-- the pages are automatically added using js -->
          </div>




        </div>









        <!-- ================================================UPLOADED DOCUMENTS TABLE=========================== -->




      </div>
    </div>
  </div>
  <?php
  include('modals/logout_modal.php');
  ?>

  <!---------------SCRIPT--------------------------->
  <!-- <script src="../js/ADMIN/adminManageApplication.js"></script> -->
  <script src="../js/ADMIN/adminManageRequirements.js"></script>
  <script src="../js/ADMIN/modal.js"></script>
  <script src="../js/ADMIN/tablePagination.js"></script>
  <!---------ICONS----------------------------------->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>









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