<?php
if (isset($_GET['applicant_id'])) {
    // Sanitize and validate the ID
    $applicant_id = mysqli_real_escape_string($conn, $_GET['applicant_id']);

    // Query to retrieve additional data based on the ID
    $query = "SELECT * FROM `additional_info_table` WHERE `applicant_id` = '$applicant_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch and return the data as JSON
        $row = mysqli_fetch_assoc($result);
        header('Content-Type: application/json'); // Set the content type
        echo json_encode($row);
    } else {
        header('HTTP/1.1 404 Not Found'); // Set a 404 status code if data is not found
        echo json_encode(['error' => 'Data not found']);
    }
} else {
    header('HTTP/1.1 400 Bad Request'); // Set a 400 status code for invalid input
    echo json_encode(['error' => 'Invalid input']);
}
