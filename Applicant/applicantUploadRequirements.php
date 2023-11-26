<?php
require_once '../database/config.php';
session_start();




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Applicant Dashboard</title>
    <link rel="stylesheet" href="../css/applicant/applicantUploadRequirements.css" />
    <link rel="stylesheet" href="../css/admin/global.css">
    <link rel="stylesheet" href="../css/admin/table.css">
</head>

<body>
    <!-----------------------------NAVIGATION-------------------------------------------------->
    <?php
    include 'applicantNavigation.php';
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
        <!-- <div class="details">
            <div class="card-instructions">
                <h2>Please upload the following documents below: </h2>
                <p>Ensure that you are following instruction to avoid delay on your registration</p>
            </div>
            <form class="upload-form" method="POST" enctype="multipart/form-data">
                <div class="requirement-cards-container">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM required_documents ORDER BY document_id ASC") or die(mysqli_error($conn));

                    if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_array($sql)) {
                            $document_id = $row['document_id'];
                            $document_name = $row['document_name'];
                            $document_description = $row['document_description'];
                            $document_status = $row['is_required'];
                            $document_type = $row['document_type'];

                            $requirementClass = $document_status === 'required' ? 'required' : 'optional';
                    ?>
                            <div class="requirement-card <?php echo $requirementClass; ?>">
                                <h3><?php echo $document_name; ?></h3>
                                <p><?php echo $document_description; ?></p>
                                <span class="status"><?php echo strtoupper($document_status); ?></span>
                                <p><?php echo $document_type; ?></p>
                                <input type="file" class="file-input" name="uploadedFile_<?php echo $document_id; ?>" accept="application/pdf" required>
                                <input type="hidden" name="documentId_<?php echo $document_id; ?>" value="<?php echo $document_id; ?>">
                            </div>
                    <?php
                        }
                    } else {
                        echo "No requirements found.";
                    }
                    ?>
                </div>
                <button type="submit" class="action-button submitBtn" name="upload">
                    <ion-icon name="cloud-upload-outline"></ion-icon> Upload
                </button>
            </form>
        </div> -->

        <div class="details">
            <div class="recentApplications">



                <div class="applicationHeader">
                    <h2>Submit the following documents:</h2>

                </div>



                <table class="applications-table" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Requirement Name</th>
                            <th>Requirement Description</th>
                            <th>Requirement Status</th>
                            <th>Document Type</th>
                            <!-- <th>Created At</th>
              <th>Updated At</t h> -->

                            <th class="action-header" colspan="3">Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * from required_documents ORDER BY document_id ASC") or die(mysqli_error($conn));

                        if (mysqli_num_rows($sql) > 0) {
                            $count = 1; // Initialize the row count
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
                                    <!-- <td><?php //echo $document_id; 
                                                ?></td> -->
                                    <td><?php echo $count; ?></td>
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
                                            <button type="button" class="action-button editBtn modal-trigger" data-modal-id="<?php echo 'uploadDocumentModal' . $document_id; ?>">
                                                <ion-icon name="cloud-upload-outline"></ion-icon> Upload
                                            </button>



                                            <!-- <button type="button" class="action-button deleteBtn modal-trigger" data-modal-id="<?php echo 'deleteRequirementModal' . $document_id; ?>" data-document-name="<?php echo $row['document_name'] ?>">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button> -->
                                            <?php //include('modals/deleteRequirement_modal.php'); 
                                            ?>
                                        </div>
                                        <?php include('../ADMIN/modals/APPLICANT/upload_document_modal.php');
                                        ?>

                                        <?php //include('modals/view_modal1.php'); 
                                        ?>
                                    </td>
                                </tr>

                        <?php
                                $count++; // Increment the count for each row
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
        </div>



    </div>
    </div>



    </div>
    <?php
    include('modals/logout_modal.php');
    ?>

    <!---------------SCRIPT--------------------------->
    <script src="../js/APPLICANT/applicantDashboard.js"></script>
    <script src="../js/ADMIN/tablePagination.js"></script>
    <script src="../js/ADMIN/modal.js"></script>
    <script src="../js/logout.js"></script>

    <!---------ICONS----------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



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