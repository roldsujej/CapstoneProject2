<?php
require_once '../database/config.php';

session_start();
//var_dump($_SESSION);

//include '../LoginAndRegistration/login.php';
//require_once 'sessions.php';


// Check if 'fullName' is set in the session before accessing it
//$fullname = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="../css/applicant/applicantDashboard.css" />
</head>

<body>
    <!-----------------------------NAVIGATION-------------------------------------------------->
    <div class="container">
        <div class="navigation">

            <ul>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="car-outline"></ion-icon></span>
                        <span class="title"><?php echo $_SESSION['fullName']; ?></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard </span>
                    </a>
                </li>
                <!-- <li>
                    <a href="adminManageApplications.html">
                        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                        <span class="title">My Account</span>
                    </a>
                </li> -->
                <li>
                    <a href="adminManageMembers.html">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title"> My Requirements</span>
                    </a>
                </li>
                <!-- <li>
            <a href="adminManageAccounts.html">
              <span class="icon"
                ><ion-icon name="settings-outline"></ion-icon>
              </span>
              <span class="title">Manage Accounts</span>
            </a>
          </li> -->

                <li>
                    <a href="" id="logOutLink">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


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

                <div class="cardName">Applicant ID: <?php echo $_SESSION['user_id']; ?></div>
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi adipisci doloribus placeat, quo tenetur aperiam velit, voluptatem modi corporis facilis, porro quam perspiciatis fuga mollitia? Amet itaque autem culpa!</p>
            </div>

        </div>



    </div>

    <!---------------SCRIPT--------------------------->
    <script src="../script/APPLICANT/applicantDashboard.js"></script>
    <!---------ICONS----------------------------------->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>