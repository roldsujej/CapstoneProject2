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
                <a href="applicantDashboard.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard </span>
                </a>
            </li>

            <li>
                <a href="applicantUploadRequirements.php">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title"> My Requirements</span>
                </a>
            </li>


            <li>
                <a href="" id="logOutLink">
                    <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                    <span class="title">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</div>