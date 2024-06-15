<?php
// process.php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $conn->real_escape_string($_POST["title"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $imageSrc = $conn->real_escape_string($_POST["imageSrc"]);
    $link = $conn->real_escape_string($_POST["link"]);

    $sql = "INSERT INTO packages (title, description, imageSrc, link) VALUES ('$title', '$description', '$imageSrc', '$link')";

    if ($conn->query($sql) === TRUE) {
        header("Location: add_package.php");

        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>