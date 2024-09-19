<?php
require_once('config_02.php'); // Include the database connection

session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $repeat_new_password = $_POST['repeat_new_password'];

    if ($new_password !== $repeat_new_password) {
        echo "<script>alert('Passwords do not match.'); window.location.href='settings.php';</script>";
        exit();
    }

    // Fetch the current hashed password
    $query = "SELECT password FROM users WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $hashed_password = $stmt->get_result()->fetch_assoc()['password'];

    if (password_verify($current_password, $hashed_password)) {
        $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update_query = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $con->prepare($update_query);
        $stmt->bind_param("ss", $new_hashed_password, $email);
        $stmt->execute();
        
        echo "<script>alert('Password changed successfully.'); window.location.href='settings.php';</script>";
    } else {
        echo "<script>alert('Current password is incorrect.'); window.location.href='settings.php';</script>";
    }
}
?>
