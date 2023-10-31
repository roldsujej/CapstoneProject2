<?php
require_once '../database/config.php';
$uploadDirectory = __DIR__ . '/uploads/applicant_uploads';

session_start();
//var_dump($_SESSION);

//require_once 'sessions.php';


// Check if 'fullName' is set in the session before accessing it
//$fullname = isset($_SESSION['fullName']) ? $_SESSION['fullName'] : '';



if (isset($_POST['upload'])) {
    // Check if a file has been uploaded
    if (isset($_FILES['uploadedFile'])) {
        $file = $_FILES['uploadedFile'];

        // Check for file upload errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Define a target directory to store the uploaded files
            // $targetDirectory = 'uploads\user_uploads';  // Create this directory if it doesn't exist

            // Generate a unique filename for the uploaded file
            $uniqueFilename = uniqid() . '_' . $file['name'];

            // Set the path for the uploaded file
            $targetPath = $uploadDirectory . $uniqueFilename;

            // Verify if the applicant_id exists in the account_profiles table
            $documentId = $_POST['documentId'];
            $applicantId = $_SESSION['id'];

            // Check if the applicant_id exists in the account_profiles table
            $checkQuery = "SELECT id FROM account_profiles WHERE id = ?";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bind_param("i", $applicantId);
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                // Applicant ID exists in account_profiles, proceed with insertion
                // Move the uploaded file to the target path
                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    // Insert file details into the database
                    $insertQuery = "INSERT INTO uploaded_documents (document_id, applicant_id, file_path) VALUES (?, ?, ?)";
                    $insertStmt = $conn->prepare($insertQuery);
                    $insertStmt->bind_param("iis", $documentId, $applicantId, $targetPath);

                    if ($insertStmt->execute()) {
                        // File upload and database insertion successful
                        $_SESSION['status'] = "File uploaded successfully.";
                        $_SESSION['status_code'] = "success";
                    } else {
                        $_SESSION['status'] = "Failed to insert file details into the database: " . $conn->error;
                        $_SESSION['status_code'] = "error";
                    }
                } else {
                    $_SESSION['status'] = "Failed to move the uploaded file to the target directory.";
                    $_SESSION['status_code'] = "error";
                }
            } else {
                // Handle the case where the applicant_id doesn't exist in account_profiles
                $_SESSION['status'] = "Invalid applicant ID.";
                $_SESSION['status_code'] = "error";
            }
        } else {
            $_SESSION['status'] = "File upload error: " . $file['error'];
            $_SESSION['status_code'] = "error";
        }
    } else {
        $_SESSION['status'] = "No file was uploaded.";
        $_SESSION['status_code'] = "error";
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
    <link rel="stylesheet" href="../css/admin/global.css">
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
            <form class="upload-form" method="POST" enctype="multipart/form-data">
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
                                <input type="file" class="file-input" name="uploadedFile_<?php echo $document_id; ?>" accept="application/pdf" required>
                                <input type="hidden" name="documentId_<?php echo $document_id; ?>" value="<?php echo $document_id; ?>">
                            </div>
                    <?php
                        }
                    } else {
                        echo "No requirements found.";
                    }
                    ?>
                </div>
                <button type="submit" class="action-button submitBtn" name="upload">
                    <ion-icon name="cloud-upload-outline"></ion-icon> Upload
                </button>
            </form>
        </div>

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