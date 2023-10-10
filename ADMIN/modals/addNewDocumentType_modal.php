<?php


if (isset($_POST['submitNewDocumentType'])) {
    $document_type = mysqli_real_escape_string($conn, $_POST['document_type']);

    // Check if the document type already exists in the database
    $checkQuery = $conn->prepare("SELECT * FROM required_documents WHERE document_type = ?");
    $checkQuery->bind_param("s", $document_type);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        // Document type already exists, handle the error (e.g., show a message)
        echo "Document type already exists!";
    } else {
        // Insert the new document type into the database
        $insertQuery = $conn->prepare("INSERT INTO required_documents (document_type) VALUES (?)");
        $insertQuery->bind_param("s", $document_type);

        if ($insertQuery->execute()) {
            // Document type added successfully, you can show a success message
            echo "New Document Type Added.";
        } else {
            // Handle the error (e.g., show an error message)
            echo $insertQuery->error;
        }
    }
}
?>


<!-- for adding new requirement -->
<div class="modal-overlay" id="<?php echo 'addNewDocumentType' ?>">
    <div class="modal-container modal-form-size modal-sm" style="z-index: 9999;">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Add New Document Type" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'addNewDocumentType'  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">


                    <div class="form-group">
                        <label class="label" for="">New Document Type:</label>
                        <input type="text" class="form-control" name="document_type" id="document_type" placeholder="Add a new document type">
                        <span class="validation-message"></span>
                    </div>






            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="submitNewDocumentType" class="btn " onsubmit="return validate()">
                    Add
                </button>
            </div>
            </form>
        </div>
    </div>
</div>