<?php
// Include the database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting the package ID from the form
    $packageId = $_POST['package_id'];

    // Preparing and executing the SQL query to delete the package
    $sql = "DELETE FROM packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $packageId);

    if ($stmt->execute()) {
        header("Location: add_package.php");
        exit();
    } else {
        echo "Error deleting package: " . $conn->error;
    }

    // Closing the statement
    $stmt->close();
}

// Closing the database connection
$conn->close();
?>