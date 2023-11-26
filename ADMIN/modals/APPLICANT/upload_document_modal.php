<?php
if (isset($_POST['upload'])) {
    $documentId = $_POST['documentId'];
    $applicantId = $_SESSION['id'];  // Replace this with the actual applicant ID

    $uploadDirectory = 'D:/xampp/htdocs/CapstoneProject2/Applicant/uploads/';

    // Get the uploaded file details
    $fileName = basename($_FILES['uploadedFile']['name']);
    $fileTmpName = $_FILES['uploadedFile']['tmp_name'];

    // Check if the file is a PDF or an image (you can adjust this condition based on your requirements)
    $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        // Generate a unique name for the file to avoid overwriting
        $newFileName = uniqid('uploaded_') . '.' . $fileExtension;
        $targetPath = $uploadDirectory . $newFileName;

        // Move the uploaded file to the target path
        if (move_uploaded_file($fileTmpName, $targetPath)) {
            // Insert information into the database
            $stmt = $conn->prepare("INSERT INTO uploaded_documents (applicant_id, document_id, file_name, file_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $applicantId, $documentId, $newFileName, $targetPath);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            echo 'File uploaded successfully!';
        } else {
            echo 'Failed to move the uploaded file.';
        }
    } else {
        echo 'Invalid file format. Only PDF and image files are allowed.';
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