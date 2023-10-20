<div class="modal-overlay" id="<?php echo "denialReasonModal" . $id;  ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Reason for Denial of " . ucfirst($fname) . " " . ucfirst($lname) . " Application" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'denialReasonModal'  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modal-content">
                <form method="POST">
                    <!-- i passed the id in my input field and hid it so that i can just select a profile based on id and delete -->
                    <input type="hidden" name="applicantIdToApprove" value="<?php echo $id; ?>" />
                    <h3 class="deleteMessage" id="deleteModalMessage">Do you want to <?php echo  "approve  " . ucfirst($fname) . " " . ucfirst($lname) . " profile creation request?" ?></h3>

                    <div class="form-group text-center">
                        <?php
                        if ($status !== "Account Accepted" && $status !== "Application Denied") {
                            // Check if the status is not "Account Accepted" or "Application Denied"
                            echo '<button type="submit" name="approve_user" class="btn btn-success">Approve</button>';
                            echo '<button type="submit" name="deny_user" class="btn btn-danger">Deny</button>';
                        } else {
                            // Application is already approved or denied, so disable both buttons
                            echo '<button type="button" class="btn btn-secondary" disabled>Approved</button>';
                            echo '<button type="button" class="btn btn-secondary" disabled>Denied</button>';
                        }
                        ?>
                    </div>


                    <!-- <div class="modal-footer">
                        <button type="submit" class="modalBtn" id="deleteModalBtn" name="deleteApplicant">Yes</button>
                        <button type="button" class="modalBtn cancel-button" data-modal-id="<?php echo 'approveOrDenyApplicantModal' . $id; ?>" id="closeDeleteModalButton">Cancel</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>