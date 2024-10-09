<?php
require 'db_connection.php'; // Include your database connection file

if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($con, $_GET['email']);

    // Confirm the email in the database
    $query = "UPDATE users SET email_confirmed = 1 WHERE email = '$email'";
    if (mysqli_query($con, $query)) {
        echo "Email confirmed successfully!";
    } else {
        echo "Error confirming email: " . mysqli_error($con);
    }
} else {
    echo "Invalid confirmation link.";
}
