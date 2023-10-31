<?php
require_once '../database/config.php';

session_start();
//var_dump($_SESSION);

//require_once 'sessions.php';


// Check if 'fullName' is set in the session before accessing it
//$fullname = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Applicant Dashboard</title>
    <link rel="stylesheet" href="../css/applicant/applicantDashboard.css" />
</head>

<body>
    <!-----------------------------NAVIGATION-------------------------------------------------->
    <?php
    include 'applicantNavigation.php';
    echo $_SESSION['id'];
    ?>


    <!-- ------------------------------MODALS----------------------------------- -->

    <div id="logOutModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Confirmation</h2>
            <p>Are you sure you want to log out?</p>
            <button id="confirmLogOut">Yes</button>
            <button id="cancelLogOut">No</button>
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
                <img src="/images/logo.jpg" alt="Sample pic" />
            </div>
        </div>

        <!-----------------CARDS--------------------------------------->
        <div class="cardBox">
            <div class="card">

                <div class="cardName">Applicant ID: <?php echo $_SESSION['id']; ?></div>
                <div class="iconBx">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <!-- <div class="numbers">1.504</div> -->
                <div class="cardName">Application Status: <?php //echo $_SESSION['fname'] . " " . $_SESSION['lname'];
                                                            ?></div>
                <div class="iconBx">
                    <ion-icon name="stats-chart-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <!-- <div class="numbers">1.504</div> -->
                <div class="cardName">Email:</div>
                <div class="iconBx">
                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <!-- <div class="numbers">1.504</div> -->
                <div class="cardName">Recent Members</div>
                <div class="iconBx">
                    <ion-icon name="checkmark-done-outline"></ion-icon>
                </div>
            </div>
        </div>

        <!----------------------------------------SECTION--------------------------------------------------->
        <div class="details">
            <div class="card-instructions">
                <h2>Welcome <?php echo $_SESSION['fullName']; ?></h2>
                <p> You are 1 step closer to being a member, Just make sure to upload the required documents as soon as your account is approved to speed up the registration process</p>
            </div>

        </div>



    </div>

    <!---------------SCRIPT--------------------------->
    <script src="../js/APPLICANT/applicantDashboard.js"></script>
    <!---------ICONS----------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>