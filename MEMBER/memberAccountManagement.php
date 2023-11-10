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
    <link rel="stylesheet" href="../css/member/profile.css" />

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
            <div>
                <ul class="navbar">
                    <li><a href="#" onclick="showSection('personalInfo')">Personal Information </a></li>
                    <li><a href="#" onclick="showSection('AccountSettings')">Account Settings</a></li>
                </ul>
            </div>
            <div class="content" id="sectionContent">
                <!-- Initially, display the personal info section -->
                <?php include "personalInfo.php";
                ?>

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
        function showSection(section) {
            // Load content dynamically based on the selected section
            const sectionContent = document.getElementById('sectionContent');
            if (section === 'personalInfo') {
                // Load the content directly into the details div
                fetch('personalInfo.php')
                    .then(response => response.text())
                    .then(data => sectionContent.innerHTML = data)
                    .catch(error => console.error('Error:', error));
            } else if (section === 'AccountSettings') {
                // Load the content dynamically using AJAX (similar to the previous example)
                fetch('accountsettings.php')
                    .then(response => response.text())
                    .then(data => sectionContent.innerHTML = data)
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>




</body>

</html>