<?php
ob_start();
if (isset($_POST['update_document'])) {
    $document_id = mysqli_real_escape_string($conn, $_POST['document_id']);
    $document_name = mysqli_real_escape_string($conn, $_POST['document_name']);
    $document_name = mysqli_real_escape_string($conn, $_POST['document_name']);
    $document_description = mysqli_real_escape_string($conn, $_POST['document_description']);
    $document_status = mysqli_real_escape_string($conn, $_POST['document_status']);
    $document_type = mysqli_real_escape_string($conn, $_POST['document_type']);

    // Update user account status using prepared statement
    $updateQuery = $conn->prepare("UPDATE required_documents SET document_name = ?, document_description = ?, is_required = ?, document_type = ? WHERE document_id = ?");
    $updateQuery->bind_param("ssssi", $document_name, $document_description, $document_status, $document_type, $document_id);
    if ($updateQuery->execute()) {
        $_SESSION['status'] = "Requirement Updated.";
        $_SESSION['status_code'] = "success";
    } else {
        echo $updateQuery->error;
    }
}
ob_end_clean();

?>
<!-- for adding new requirement -->
<div class="modal-overlay" id="<?php echo 'EditRequirement' . $document_id ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Edit Requirement" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'EditRequirement' . $document_id  ?>">
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
                        <input type="text" name="document_id" id="document_id" class="form-control" value="<?php echo $document_id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Requirement Name</label>
                        <input type="text" class="form-control" name="document_name" id="document_name" value="<?php echo $document_name ?>">
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Requirement Description</label>
                        <input type="text" class="form-control" name="document_description" id="document_description" value="<?php echo $document_description ?>">
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

                    <div class="form-group">
                        <label class="label" for="">Document Type</label>
                        <input type="text" class="form-control" name="document_type" id="document_description" value="<?php echo $document_type ?>">
                        <span class="validation-message"></span>
                    </div>


            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="update_document" class="btn" onsubmit="return validate()">
                    Update
                </button>
            </div>
            </form>
        </div>
    </div>
</div>