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
    <link rel="stylesheet" href="../css/admin/adminAnnouncement.css" />
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
                <img src="../images/logo.jpg" alt="Sample pic" />
            </div>
        </div>




        <!----------------------------------------SECTION--------------------------------------------------->
        <div class="details">
            <div class="recentApplications">
                <div class="applicationHeader">
                    <h2>Manage News and Announcements</h2>
                    <div class="button-container">
                        <!-- button to trigger the add applicant modal -->
                        <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'createAnnouncement' ?>">
                            <ion-icon name="add"></ion-icon>
                        </a>

                        <?php
                        include('modals/announcement_modal/addAnnouncement_modal.php');

                        ?>
                    </div>


                </div>

                <table class="applications-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Announcement Name</th>
                            <th>Description</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Time</th>


                            <th class="action-header" colspan="3">Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * from tbl_announcements ORDER BY announcement_id ASC") or die(mysqli_error($conn));

                        if (mysqli_num_rows($sql) > 0) {
                            while ($row = mysqli_fetch_array($sql)) {



                                $announcement_id = $row['announcement_id'];
                                $announcement_title = $row['announcement_title'];
                                $announcement_description = $row['announcement_description'];
                                $announcement_venue = $row['announcement_venue'];
                                $announcement_date = $row['announcement_date'];
                                $announcement_time = $row['announcement_time'];
                                $date_created = $row['date_created'];
                                $date_updated = $row['date_updated'];
                                $announcement_updated = ($date_updated != $row['date_created']);



                        ?>
                                <tr>
                                    <td><?php echo $announcement_id; ?></td>
                                    <td><?php echo $announcement_title; ?></td>
                                    <td><?php echo $announcement_description; ?></td>
                                    <td><?php echo  $announcement_venue ?></td>
                                    <td><?php echo  $announcement_date ?></td>
                                    <td><?php echo  $announcement_time ?></td>

                                    <!-- <td>
                                        <?php //echo $announcement_updated ? $date_updated : ''; 
                                        ?>
                                    </td> -->

                                    <!-- <td><?php //echo $update_date 
                                                ?></td> -->


                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="action-button editBtn modal-trigger" data-modal-id="<?php echo 'editAnnouncement' . $announcement_id  ?>">
                                                <ion-icon name="open-outline"></ion-icon>
                                            </button>




                                            <!-- Add a delete button with an onclick event -->
                                            <button type="button" class="action-button deleteBtn modal-trigger" data-modal-id="<?php echo 'deleteAnnouncementModal' . $announcement_id; ?>" data-doocument-name="<?php //echo $row['document_name'] 
                                                                                                                                                                                                                    ?>">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                            <?php
                                            include('modals/announcement_modal/deleteAnnouncement_modal.php'); ?>








                                        </div>
                                        <?php include('modals/announcement_modal/editAnnouncement_modal.php'); ?>

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
        </div>
    </div>
    <?php

    include 'modals/logout_modal.php';

    ?>

    <!---------------SCRIPT--------------------------->
    <script src="../js/admindashboard.js"></script>
    <script src="../js/ADMIN/modal.js"></script>
    <script src="../js/ADMIN/tablePagination.js"></script>
	<script src="../js/logout.js"></script>
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