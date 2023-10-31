<?php
// This function sanitizes input data to prevent SQL injection.
function sanitize($conn, $data)
{
    // Use mysqli_real_escape_string to escape special characters in the data.
    $sanitizedData = mysqli_real_escape_string($conn, $data);
    return $sanitizedData;
}

// This function checks if an email already exists in the database.
function checkEmail($conn, $email)
{
    // Sanitize the email to prevent SQL injection.
    $email = mysqli_real_escape_string($conn, $email);

    // Prepare a SQL query to check if the email exists in the 'account_profiles' table.
    $emailCheckQry = $conn->prepare("SELECT * FROM account_profiles WHERE email = ?");

    // Bind the email parameter to the prepared statement.
    $emailCheckQry->bind_param("s", $email);

    // Execute the prepared statement.
    $emailCheckQry->execute();

    // Get the result set from the executed query.
    $emailCheckQryResult = $emailCheckQry->get_result();

    // Close the prepared statement to free up resources.
    $emailCheckQry->close();

    // Return true if there are rows in the result (email exists), false otherwise.
    return $emailCheckQryResult->num_rows > 0;
}

// Make sure that $allowed is an array
function allowedRoles($role, $allowed)
{
    if (!in_array($role, $allowed)) {
        // If the user's role is not in the allowed roles array, handle the access denial here.
        header('location: ../logout.php');
    }
    // If the user's role is in the allowed roles array, they have access to the page.
    // You can add specific actions for each allowed role if needed.
}


?>
