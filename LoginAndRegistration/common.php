<?php
function sanitize($conn, $data)
{
$sanitizedData = mysqli_real_escape_string($conn, $data);
return $sanitizedData;
}

function checkEmail($conn, $email)
{
$email = mysqli_real_escape_string($conn, $email);
$emailCheckQry = $conn->prepare("SELECT * FROM account_profiles WHERE email = ?");
$emailCheckQry->bind_param("s", $email);
$emailCheckQry->execute();
$emailCheckQryResult = $emailCheckQry->get_result();
$emailCheckQry->close();
return $emailCheckQryResult->num_rows > 0;
}
