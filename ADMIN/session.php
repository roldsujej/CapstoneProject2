<?php
require_once "../database/config.php";

if (isset($_SESSION['applicant'])) {
    // User is logged in, retrieve user data
    $user = $_SESSION['applicant'];
    $id = $user['applicant_id'];
    // query to get the admin details using the admin id from the session
    $query = $connection->prepare("SELECT * FROM account_profiles WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $queryResult = $query->get_result();
    $row = $queryResult->fetch_assoc();
    /* values from fetch from variable $row
        transfered to another variable for general usage*/
    if ($row) {
        // $image = $row['image'];
        $fname = $row['firstName'];
        $lname = $row['lastName'];
        $fullname =  strtoupper($row['firstName'] . ' ' . $row['lastName']);
        $cpNumber = $row['cpNum'];
        $address = $row['address'];
        $email = $row['email'];
        $password = $row['password'];
    }
}


// if (isset($_SESSION['admin'])) {
//     // admin logged in, retrieve user data
//     $user = $_SESSION['admin'];
//     $id = $user['admin_id'];
//     $query = $connection->prepare("SELECT * FROM required_documents WHERE document_id = ?");
//     $query->bind_param("i", $id);
//     $query->execute();
//     $queryResult = $query->get_result();
//     $row = $queryResult->fetch_assoc();
//     /* values from fetch from variable $row
//         transfered to another variable for general usage*/
//     if ($row) {

//         $document_id = $row['document_id'];
//         $document_name = $row['document_name'];
//         $document_description = $row['document_description'];
//         $document_status = $row['is_required'];
//         $creation_date = $row['created_at'];
//         $update_date = $row['updated_at'];
//     }
// }
