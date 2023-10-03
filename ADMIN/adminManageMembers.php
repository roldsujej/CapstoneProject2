<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admin/adminMembers.css" />
</head>

<body>
  <!-----------------------------NAVIGATION-------------------------------------------------->
  <div class="container">
    <div class="navigation">
      <ul>
        <li>
          <a href="">
            <span class="icon"><ion-icon name="car-outline"></ion-icon></span>
            <span class="title">CAPEDA</span>
          </a>
        </li>
        <li>
          <a href="admindashboard.php">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="adminManageApplications.php">
            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
            <span class="title">Manage Applications</span>
          </a>
        </li>
        <li>
          <a href="adminManageMembers.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Manage Members</span>
          </a>
        </li>
        <li>
          <a href="adminManageAccounts.php">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Manage Accounts</span>
          </a>
        </li>
        <li>
          <a href="adminManageNewsAndAlerts.php">
            <span class="icon"><ion-icon name="alert-outline"></ion-icon></span>
            <span class="title">News and Alerts</span>
          </a>
        </li>
        <li>
          <a href="">
            <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
            <span class="title">Sign Out</span>
          </a>
        </li>
      </ul>
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

    <!----------------------------------------SECTION--------------------------------------------------->
    <div class="details">
      <div class="recentApplications">
        <div class="applicationHeader">
          <h2>Manage Members</h2>
          <a href="#" class="btn">View All</a>
        </div>

        <table>
          <thead>
            <tr>
              <td>Name</td>
              <td>Address</td>
              <td>Age</td>
              <td>Status</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Name</td>
              <td>Sample Address</td>
              <td>23</td>
              <td><span class="status pending">Pending</span></td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Address</td>
              <td>32</td>
              <td><span class="status approved">Approved</span></td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Address</td>
              <td>17</td>
              <td><span class="status denied">Denied</span></td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Address</td>
              <td>26</td>
              <td><span class="status denied">Denied</span></td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Address</td>
              <td>55</td>
              <td><span class="status approved">Approved</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!---------------SCRIPT--------------------------->
  <script src="../script/admindashboard.js"></script>
  <!---------ICONS----------------------------------->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>