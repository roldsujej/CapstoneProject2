<?php
if (isset($_POST['submit_announcement'])) {
    $announcement_title = mysqli_real_escape_string($conn, $_POST['announcement_title']);
    $announcement_description = mysqli_real_escape_string($conn, $_POST['announcement_description']);
    $announcement_venue = mysqli_real_escape_string($conn, $_POST['announcement_venue']);
    $announcement_date = $_POST['announcement_date'];
    $announcement_time = $_POST['announcement_time'];
    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d H:i:s');

    // Insert the new announcement into the database
    $insertQuery = $conn->prepare("INSERT INTO tbl_announcements (announcement_title, announcement_description, announcement_venue, announcement_date, announcement_time, date_created) VALUES (?, ?, ?, ?, ?, ?)");
    $insertQuery->bind_param("ssssss", $announcement_title, $announcement_description, $announcement_venue, $announcement_date, $announcement_time, $date_created);

    if ($insertQuery->execute()) {
        // Announcement added successfully
        $_SESSION['status'] = "New Announcement Added.";
        $_SESSION['status_code'] = "success";
    } else {
        // Handle the error
        echo $insertQuery->error;
    }
}
?>




<div class="modal-overlay" id="<?php echo 'createAnnouncement'   ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Add New Announcement" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'createAnnouncement'   ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">
                    <div class="form-group">
                        <label class="label" for="">Announcement Title</label>
                        <input type="text" class="form-control" name="announcement_title" id="announcement_title" placeholder="Enter the title of the announcement" required>
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Description</label>
                        <input type="text" class="form-control" name="announcement_description" id="announcement_description" placeholder="What is the announcement about?" required>
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Venue</label>
                        <input type="text" class="form-control" name="announcement_venue" id="announcement_venue" placeholder="Where will the drivers meet?" required>
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Date</label>
                        <input type="date" class="form-control" name="announcement_date" id="announcement_venue" required>
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Time</label>
                        <input type="time" class="form-control" name="announcement_time" id="announcement_venue" required>
                        <span class="validation-message"></span>
                    </div>

            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="submit_announcement" class="modalBtn " onsubmit="return validate()">
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