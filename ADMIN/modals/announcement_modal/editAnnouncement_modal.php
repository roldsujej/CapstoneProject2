<?php

if (isset($_POST['update_announcement'])) {
    $announcement_id = mysqli_real_escape_string($conn, $_POST['announcement_id']);
    $annnouncement_title = mysqli_real_escape_string($conn, $_POST['announcement_title']);
    $announcement_description = mysqli_real_escape_string($conn, $_POST['announcement_description']);
    $date_updated = date('Y-m-d H:i:s');

    // Update user account status using prepared statement
    $updateQuery = $conn->prepare("UPDATE tbl_announcements SET announcement_title = ?, announcement_description = ?,  date_updated = ? WHERE announcement_id = ?");
    $updateQuery->bind_param("sssi", $annnouncement_title,  $announcement_description, $date_updated, $announcement_id);
    if ($updateQuery->execute()) {
        $_SESSION['status'] = "Announcement Updated.";
        $_SESSION['status_code'] = "success";
    } else {
        echo $updateQuery->error;
    }
}

?>


<div class="modal-overlay" id="<?php echo 'editAnnouncement' . $announcement_id;   ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Edit announcement" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'editAnnouncement' . $announcement_id;   ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">

                    <div class="form-group">
                        <label class="label" for="">Announcement ID:</label>
                        <input type="text" name="announcement_id" id="document_id" class="form-control" value="<?php echo "$announcement_id"; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Announcement Title</label>
                        <input type="text" class="form-control" name="announcement_title" id="announcement_title" value="<?php echo "$announcement_title"; ?>">
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Announcement Description</label>
                        <input type="text" class="form-control" name="announcement_description" id="announcement_description" value="<?php echo "$announcement_description"; ?>">
                    </div>

                    <div class="form-group">
                        <label class="label" for="">Venue</label>
                        <input type="text" class="form-control" name="announcement_venue" id="announcement_venue" value="<?php echo "$announcement_venue"; ?>">
                        <span class=" validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Date</label>
                        <input type="date" class="form-control" name="announcement_date" id="announcement_date" value="<?php echo "$announcement_date"; ?>">
                        <span class=" validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Time</label>
                        <input type="time" class="form-control" name="announcement_time" id="announcement_time" value="<?php echo "$announcement_time"; ?>">
                        <span class=" validation-message"></span>
                    </div>

            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="update_announcement" class="modalBtn " onsubmit="return validate()">
                    Submit
                </button>
            </div>


            </form>
        </div>


    </div>
</div>
<script>
    // To avoid repetition of submitting the form when refresh
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    };
</script>