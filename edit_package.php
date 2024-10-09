<?php
// edit_package.php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting the package ID from the form
    $packageId = $_POST['package_id'];

    // Fetching the package details based on the ID
    $sql = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $packageId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Displaying the form for editing the package
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Package</title>
            <link rel="stylesheet" href="add_package.css">
        </head>
        <body>

            <h1>Edit Package</h1>

            <form action="update_package.php" method="post">
                <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
                
                <label for="description">Description:</label>
                <textarea name="description" required><?php echo $row['description']; ?></textarea>
                
                <label for="imageSrc">Image Source:</label>
                <input type="text" name="imageSrc" value="<?php echo $row['imageSrc']; ?>" required>

                <label for="taka">Taka:</label>
                <input type="number" name="taka" value="<?php echo $row['taka']; ?>" required>

            

                <button type="submit">Update Package</button>
            </form>

        </body>
        </html>

        <?php
    } else {
        echo "Package not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
