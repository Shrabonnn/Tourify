<?php
// process.php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $conn->real_escape_string($_POST["title"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $imageSrc = $conn->real_escape_string($_POST["imageSrc"]);
    
    $taka = $conn->real_escape_string($_POST["taka"]);

    $sql = "INSERT INTO packages (title, description, imageSrc,taka) VALUES ('$title', '$description', '$imageSrc','$taka')";

    if ($conn->query($sql) === TRUE) {
        header("Location: add_package.php");

        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>