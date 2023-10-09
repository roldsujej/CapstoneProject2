<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admin/admindashboard.css" />
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
        <img src="/images/logo.jpg" alt="Sample pic" />
      </div>
    </div>

    <!-----------------CARDS--------------------------------------->
    <div class="cardBox">
      <div class="card">
        <div class="numbers">1.504</div>
        <div class="cardName">Active Members</div>
        <div class="iconBx"><ion-icon name="person-outline"></ion-icon></div>
      </div>

      <div class="card">
        <div class="numbers">1.504</div>
        <div class="cardName">Active PEDICAB units</div>
        <div class="iconBx">
          <ion-icon name="stats-chart-outline"></ion-icon>
        </div>
      </div>

      <div class="card">
        <div class="numbers">1.504</div>
        <div class="cardName">On-going Application</div>
        <div class="iconBx">
          <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
        </div>
      </div>

      <div class="card">
        <div class="numbers">1.504</div>
        <div class="cardName">Recent Members</div>
        <div class="iconBx">
          <ion-icon name="checkmark-done-outline"></ion-icon>
        </div>
      </div>
    </div>

    <!----------------------------------------SECTION--------------------------------------------------->
    <div class="details">
      <div class="recentApplications">
        <div class="applicationHeader">
          <h2>Recent Membership Applications</h2>
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