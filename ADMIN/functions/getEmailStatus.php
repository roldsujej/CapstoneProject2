<?php
function getEmailStatus($id)
{
global $conn;
$query = "SELECT status FROM account_profiles WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($emailStatus);

if ($stmt->fetch()) {
return $emailStatus;
}

return 0; // Default value if the status is not found
}
