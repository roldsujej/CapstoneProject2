<?php
require "../database/config.php";

// Fetch requirements from the admin's table
$sql = "SELECT * FROM required_documents ORDER BY document_id ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $document_id = $row['document_id'];
        $document_name = $row['document_name'];
        $document_description = $row['document_description'];
        $document_status = $row['is_required'];
        $document_type = $row['document_type'];

        // Display requirements as cards
        echo "<div class='requirement-card'>";
        echo "<h3>$document_name</h3>";
        echo "<p>$document_description</p>";
        echo "<p>Status: $document_status</p>";
        echo "<p>Document Type: $document_type</p>";
        echo "</div>";
    }
} else {
    echo "No requirements found.";
}

mysqli_close($conn);
