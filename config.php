<?php
// Connection for book_db
$conn_book_db = mysqli_connect('localhost', 'root', '', 'book_db');
if (!$conn_book_db) {
    die("Connection to book_db failed: " . mysqli_connect_error());
}

// Connection for package_confirm
$conn_package_confirm = mysqli_connect('localhost', 'root', '', 'package_confirm');
if (!$conn_package_confirm) {
    die("Connection to package_confirm failed: " . mysqli_connect_error());
}

// Connection for user_db
$conn_user_db = mysqli_connect('localhost', 'root', '', 'user_db');
if (!$conn_user_db) {
    die("Connection to user_db failed: " . mysqli_connect_error());
}

?>
