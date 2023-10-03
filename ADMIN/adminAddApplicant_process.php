<?php
session_start();
require "../database/config.php";

if (isset($_POST['addApplicant'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $cpNum = $_POST['cpNum'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Use the generated password

    // Rest of your code...

    // Perform database insertion
    $query = "INSERT INTO account_profiles (firstName, lastName, cpNumber, address, email, temporary_password) 
        VALUES ('$firstName', '$lastName', '$cpNum', '$address', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        // Data inserted successfully
        $_SESSION['status'] = "New applicant profile added.";
        $_SESSION['status_code'] = "success";
        header("Location: adminManageApplications.php"); // Redirect to a success page
        exit();
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_POST['updateApplicant'])) {
    $id = $_POST['applicant_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $cpNum = $_POST['cpNum'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $password = $_POST['password']; // Use the generated password

    // Retrieve the current email from the database
    $currentEmailQuery = "SELECT email FROM `account_profiles` WHERE id = $id";
    $result = mysqli_query($conn, $currentEmailQuery);

    if (!$result || mysqli_num_rows($result) === 0) {
        // Error occurred while retrieving the current email
        $_SESSION['status'] = "Error occurred while updating applicant credentials.";
        $_SESSION['status_code'] = "error";
        header("Location: adminManageApplications.php");
        exit();
    }

    $row = mysqli_fetch_assoc($result);
    $currentEmail = $row['email'];

    if ($currentEmail !== $email) {
        // Email has changed, check if it already exists
        $checkEmailQuery = "SELECT * FROM `account_profiles` WHERE email = '$email'";
        $emailCheck = mysqli_query($conn, $checkEmailQuery);

        if (!$emailCheck) {
            // Error occurred while checking the new email
            $_SESSION['status'] = "Error occurred while checking email availability.";
            $_SESSION['status_code'] = "error";
            header("Location: adminManageApplications.php");
            exit();
        }

        $emailCount = mysqli_num_rows($emailCheck);

        if ($emailCount > 0) {
            // New email already exists, show an error
            $_SESSION['status'] = "This email is already taken.";
            $_SESSION['status_code'] = "error";
            header("Location: adminManageApplications.php");
            exit();
        }
    }

    // Perform database update
    $query = "UPDATE `account_profiles` SET `firstName`='$firstName', `lastName`='$lastName', `cpNumber`='$cpNum', `address`='$address', `email`='$email', `status`='$status', `temporary_password`='$password' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        // Data updated successfully
        $_SESSION['status'] = "Applicant credentials updated successfully.";
        $_SESSION['status_code'] = "success";
    } else {
        // Error occurred during the update
        $_SESSION['status'] = "Applicant credentials update error.";
        $_SESSION['status_code'] = "error";
    }

    header("Location: adminManageApplications.php");
    exit();
} elseif (isset($_POST['deleteApplicant'])) {
    $applicantIdToDelete = $_POST['applicantIdToDelete'];

    $deleteQuery = "DELETE FROM account_profiles WHERE id=$applicantIdToDelete";
    $deleteQueryRun = mysqli_query($conn, $deleteQuery);

    if ($deleteQueryRun) {
        $_SESSION['status'] = "Applicant Profile  deleted.";
        $_SESSION['status_code'] = "success";
        header("Location: adminManageApplications.php");
    } else {
        $_SESSION['status'] = "An error has occured.";
        $_SESSION['status_code'] = "error";
        header("Location: adminManageApplications.php");
    }
}



// if (isset($_POST['updateApplicant'])) {
//     $id = $_POST['applicant_id'];
//     $firstName = $_POST['firstName'];
//     $lastName = $_POST['lastName'];
//     $cpNum = $_POST['cpNum'];
//     $address = $_POST['address'];
//     $email = $_POST['email'];
//     $status = $_POST['status'];
//     $password = $_POST['password']; // Use the generated password

//     $checkEmailQuery = "SELECT * FROM `account_profiles` WHERE email = '$email'";

//     $emailCheck = mysqli_query($conn, $checkEmailQuery);
//     $emailCount = mysqli_num_rows($emailCheck); //this will be our parameter if email count = 1 the email is already taken

//     if (mysqli_num_rows($emailCheck) > 0) {
//         $_SESSION['status'] = "This email is already taken.";
//         $_SESSION['status_code'] = "error";
//         header("Location: adminManageApplications.php"); // Redirect to a success page


//     } else {
//         // Perform database insertion
//         $query = "UPDATE `account_profiles` SET `firstName`='$firstName', `lastName`='$lastName', `cpNumber`='$cpNum', `address`='$address', `email`='$email', `status`='$status', `temporary_password`='$password' WHERE id=$id";

//         if (mysqli_query($conn, $query)) {

//             // Data inserted successfully
//             $_SESSION['status'] = "Applicant credentials updated successfully.";
//             $_SESSION['status_code'] = "success";
//             header("Location: adminManageApplications.php"); // Redirect to a success page

//         } else {
//             // Error occurred
//             // Data inserted successfully
//             $_SESSION['status'] = "Applicant credentials update error.";
//             $_SESSION['status_code'] = "error";
//             header("Location: adminManageApplications.php"); // Redirect to a success page

//         }
//     }
// }
