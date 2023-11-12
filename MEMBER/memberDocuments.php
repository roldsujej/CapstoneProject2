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
    <link rel="stylesheet" href="../css/member/memberDashboard.css">
    <link rel="stylesheet" href="../css/member/table.css">

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









        <!----------------------------------------SECTION--------------------------------------------------->
        <div class="details">
            <div class="recentApplications">
                <div class="applicationHeader">
                    <h2>Member Documents</h2>
                </div>
                <div>
                    <ul class="navbar">
                        <li><a href="#" onclick="showSection('personalInfo')">View Uploaded Documents </a></li>
                        <li><a href="#" onclick="showSection('AccountSettings')">View Requested Documents</a></li>
                    </ul>
                </div>

                <div class="content" id="sectionContent">
                    <!-- Initially, display the personal info section -->
                    <?php //include "personalInfo.php";
                    ?>

                </div>




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