<?php
require_once '../database/config.php';
session_start();

if (isset($_SESSION['applicant'])) {

    $user = $_SESSION['applicant'];
    $id = $user['applicant_id'];
    //fetch applicant details using the applicant id from session
    $query = $conn->prepare("SELECT * FROM account_profiles WHERE id=?");
    $query->bind_param("i", $id);
    $query->execute();
    $queryResult = $query->get_result();
    $row = $queryResult->fetch_assoc();

    if ($row) { //if true or may result yung row
        // $image = $row['image'];
        $applicantId = $row['id'];
        $fname = $row['firstName'];
        $lname = $row['lastName'];
        $fullname = ($row['firstName'] . ' ' . $row['lastName']);
        $email = $row['email'];
        $password = $row['password'];
    }
}
