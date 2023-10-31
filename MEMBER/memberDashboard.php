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
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="../css/member/memberDashboard.css" />

</head>

<body>
    <!-----------------------------NAVIGATION-------------------------------------------------->
    <div class="container">
        <?php
        include "memberNavigation.php";

        ?>
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
                <img src="../images/default.png" alt="Profile" id="userIcon">
                <div class="dropdown-content" id="dropdownContent">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="#">Logout</a>
                </div>

            </div>


        </div>

        <!-- end of top bar -->






        <!-----------------CARDS--------------------------------------->
        <div class="cardBox">
            <div class="card">
                <div class="iconBx">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="cardContent">
                    <div class="cardName">My Account</div>
                    <div class="additionalText">Click here to manage your account</div>
                </div>

            </div>

            <div class="card">
                <div class="iconBx">
                    <ion-icon name="stats-chart-outline"></ion-icon>
                </div>
                <div class="cardContent">
                    <div class="cardName">Uploaded Documents</div>
                    <div class="additionalText">Additional information goes here</div>
                </div>

            </div>

            <div class="card">
                <div class="iconBx">
                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                </div>
                <div class="cardContent">
                    <div class="cardName">Membership Status</div>
                    <div class="additionalText">Additional information goes here</div>
                </div>


            </div>

            <div class="card">
                <div class="iconBx">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </div>
                <div class="cardContent">
                    <div class="cardName">PEDICAB #</div>
                    <div class="additionalText">Additional information goes here</div>
                </div>

            </div>
        </div>

        <!----------------------------------------SECTION--------------------------------------------------->
        <div class="details">
            <div class="recentApplications">
                <div class="applicationHeader">
                    <h2>Announcements</h2>
                    <a href="#" class="btn">View All</a>
                </div>

                <table class="applications-table">
                    <thead>
                        <tr>
                            <th>Announcement Name</th>
                            <th>Description</th>
                            <th>Date</th>




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
                                $date_created = $row['date_created'];
                                $date_updated = $row['date_updated'];
                                $announcement_updated = ($date_updated != $row['date_created']);



                        ?>
                                <tr>
                                    <td><?php echo $announcement_title; ?></td>
                                    <td><?php echo $announcement_description; ?></td>


                                    <!-- <td><?php //echo $update_date 
                                                ?></td> -->




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

    </div>



    <!---------------SCRIPT--------------------------->
    <script src="../js/MEMBER/memberDashboard.js"></script>
    <!---------ICONS----------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>

    </script>




</body>

</html>