<?php

$applicantId = $_SESSION['id']; // Adjust according to how you retrieve the applicant ID
$uploadDirectory = __DIR__ . '/applicant/uploads';

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
                    // Insert file details into the database including file_name
                    $insertQuery = "INSERT INTO uploaded_documents (document_id, applicant_id, file_name, file_path) VALUES (?, ?, ?, ?)";
                    $insertStmt = $conn->prepare($insertQuery);
                    $insertStmt->bind_param("iiss", $documentId, $applicantId, $uniqueFilename, $targetPath);

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



<div class="modal-overlay" id="<?php echo 'uploadDocumentModal' . $document_id; ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Upload Document" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'uploadDocumentModal' . $document_id;  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form class="upload-form" method="POST" enctype="multipart/form-data">
                    <input type="file" class="file-input" name="uploadedFile" accept="application/pdf" required>
                    <input type="hidden" name="documentId" value="<?php echo $document_id; ?>">
                    <button type="submit" class="action-button submitBtn" name="upload">Upload</button>
                </form>
            </div>
        </div>
    </div>