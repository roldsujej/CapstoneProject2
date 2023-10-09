<?php

function getLatestDocumentId()  //gets the latest auto incremented id
{
    require "../database/config.php"; // Include your database connection code
    $sql = "SELECT MAX(document_id) AS max_id FROM required_documents";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $latestDocumentID = $row['max_id'] + 1; // Increment the latest ID by 1 for the new applicant
        return $latestDocumentID;
    } else {
        return 1; // Default to 1 if there are no existing applicants
    }
}
?>
<!-- for adding new requirement -->
<div class="modal-overlay" id="<?php echo 'requirement' ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Add New Requirement" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'requirement'  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">
                    <div class="form-group">
                        <label class="label" for="">Document ID:</label>
                        <input type="text" name="document_id" id="document_id" class="form-control" value="<?php echo getLatestDocumentId(); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Requirement Name</label>
                        <input type="text" class="form-control" name="document_name" id="document_name" placeholder="Enter the name of the document">
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Requirement Description</label>
                        <input type="text" class="form-control" name="document_description" id="document_description" placeholder="Enter your instruction to the applicant">
                        <span class="validation-message"></span>
                    </div>

                    <div class="form-group">
                        <label class="label" for="">Document Priority</label>
                        <select class="form-control" name="document_status" id="document_status">
                            <?php
                            $document_status_values = array("required", "not_required");

                            foreach ($document_status_values as $value) {
                                echo '<option value="' . $value . '">' . ucfirst(str_replace('_', ' ', $value)) . '</option>';
                            }
                            ?>
                        </select>
                        <span class="validation-message"></span>
                    </div>








            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="submit_document" class="btn " onsubmit="return validate()">
                    Add
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit_document'])) {
    // $document_id = mysqli_real_escape_string($conn, $_POST['document_id']); di na ata need since auto incremented
    $document_name = mysqli_real_escape_string($conn, $_POST['document_name']);
    $document_description = mysqli_real_escape_string($conn, $_POST['document_description']);
    $document_status = mysqli_real_escape_string($conn, $_POST['document_status']);


    // Update user account status using prepared statement
    $insertQuery = $conn->prepare("INSERT INTO required_documents (document_name, document_description, is_required, created_at) VALUES (?, ?, ?, NOW())");
    $insertQuery->bind_param("sss", $document_name, $document_description, $document_status);
    if ($insertQuery->execute()) {
        echo "Data inserted succesfully";
    } else {
        echo $insertQuery->error;
    }
}
?>