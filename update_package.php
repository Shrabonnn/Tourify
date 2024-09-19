<?php
// update_package.php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting form data
    $packageId = $_POST['package_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $imageSrc = $_POST['imageSrc'];
    $taka = $_POST['taka'];

    // Updating package details in the database
    $sql = "UPDATE packages SET title=?, description=?, imageSrc=?, taka=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $description, $imageSrc, $taka, $packageId);

    if ($stmt->execute()) {
        header("Location: add_package.php");
        exit();
    } else {
        echo "Error updating package: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
