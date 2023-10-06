<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Manage Submitted Requirements</title>
  <link rel="stylesheet" href="../css/admin/adminManageAcc.css ">
  <link rel="stylesheet" href="../script/ADMIN/global.css"> <!---dont forget to fix the path of this css ------>
  <link rel="stylesheet" href="../css/admin/tables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
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
          <a href="adminManageRequirements.php">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Manage Requirements</span>
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
          <h2>Manage Requirements</h2>
          <a href="#" class="btn modal-trigger" data-modal-id="<?php echo 'addRequirementModal' ?>">Add New Document</a>
        </div>

        <p>In this page you can add the required documents that needs to be passed by the applicants in order to continue the applicant process</p>

        <table id="myTable" class="applications-table">
          <thead>
            <tr>
              <th>Document ID</td>
              <th>Document Name</th>
              <th>Description</th>
              <th>Document Category</td>
              <th>Date of Creation</td>
              <th>Date of Update</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Name</td>
              <td>Sample Address</td>
              <td>23</td>
              <td><span class="status pending">Pending</span></td>
              <td>23</td>
              <td>23</td>

            </tr>




          </tbody>
        </table>
      </div>



    </div>

  </div>


  <!---------------SCRIPT--------------------------->
  <script src="/script/admindashboard.js"></script>
  <!---------ICONS----------------------------------->
  <script src="../script/ADMIN/adminManageApplication.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../script/ADMIN/modal.js"></script>

</body>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

</html>