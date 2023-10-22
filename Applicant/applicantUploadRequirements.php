<?php
require_once '../database/config.php';

session_start();
//var_dump($_SESSION);

//include '../LoginAndRegistration/login.php';
//require_once 'sessions.php';


// Check if 'fullName' is set in the session before accessing it
//$fullname = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';

// double check user role
if (isset($_SESSION['id'])) {

    if (isset($_SESSION['user_role'])) {
        // if applicant
        if ($_SESSION['user_role'] === 'applicant') {

            if (isset($_SESSION['verified'])) {
                if ($_SESSION['verified'] === 0) {
                    header('location: ../Applicant/logout.php');
                }
            }

            // header('location: ../Applicant/applicantDashboard.php');

        }
        // if admin
        else if ($_SESSION['user_role'] === 'admin') {

            header('location: ../ADMIN/admindashboard.php');
        }
    }
} else {

    header('location: logout.php');
}


if (isset($_POST['upload'])) { //for uploading
    // Check if a file was uploaded successfully
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        // Handle the file upload here
        $applicantId = $_SESSION['id'];
        $documentId = $_POST['documentId'];
        $fileName = $_FILES['uploadedFile']['name'];
        $tmpName = $_FILES['uploadedFile']['tmp_name'];
        $uploadDir = 'uploads/user_uploads'; // The directory to store uploaded files
        $uploadPath = $uploadDir . $fileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($tmpName, $uploadPath)) {
            // Insert the file information into the uploaded_documents table
            $insertQuery = "INSERT INTO uploaded_documents (applicant_id, document_id, file_name, file_path)
                            VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("iiss", $applicantId, $documentId, $fileName, $uploadPath);

            if ($stmt->execute()) {
                echo "File uploaded";
            } else {
                // Handle database insert error
                // You can display an error message
                echo "error uploading";
            }
        } else {
            // Handle file move error
            // You can display an error message
        }
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Applicant Dashboard</title>
    <link rel="stylesheet" href="../css/applicant/applicantUploadRequirements.css" />
    <link rel="stylesheet" href="../script/ADMIN/global.css">
</head>

<body>
    <!-----------------------------NAVIGATION-------------------------------------------------->
    <?php
    include 'applicantNavigation.php';
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




        <!----------------------------------------SECTION--------------------------------------------------->
        <div class="details">
            <div class="card-instructions">
                <h2>Please upload the following documents below: </h2>
                <p>Ensure that you are following instruction to avoid delay on your registration</p>
            </div>
            <div class="requirement-cards-container">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM required_documents ORDER BY document_id ASC") or die(mysqli_error($conn));

                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_array($sql)) {
                        $document_id = $row['document_id'];
                        $document_name = $row['document_name'];
                        $document_description = $row['document_description'];
                        $document_status = $row['is_required'];
                        $document_type = $row['document_type'];

                        $requirementClass = $document_status === 'required' ? 'required' : 'optional';
                ?>
                        <div class="requirement-card <?php echo $requirementClass; ?>">
                            <h3><?php echo $document_name; ?></h3>
                            <p><?php echo $document_description; ?></p>
                            <span class="status"><?php echo strtoupper($document_status); ?></span>
                            <p><?php echo $document_type; ?></p>

                            <form class="upload-form" method="POST">
                                <input type="file" class="file-input" name="uploadedFile" accept="application/pdf" required>
                                <input type="hidden" name="documentId" value="<?php echo $document_id; ?>">
                                <button type="submit" class="action-button submitBtn" name="upload">
                                    <ion-icon name="cloud-upload-outline"></ion-icon> Upload
                                </button>
                            </form>
                        </div>
                <?php
                    }
                } else {
                    echo "No requirements found.";
                }
                ?>
            </div>
        </div>
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