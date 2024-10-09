<?php
// config_02.php

// Database connection settings
$host = 'localhost';
$dbname = 'user_db';
$username = "root";
$password = "";

// Create a new PDO instance
try {
    $con = new mysqli($host, $username, $password, $dbname);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
} catch (Exception $e) {
    die("Error connecting to the database: " . $e->getMessage());
}
?>
