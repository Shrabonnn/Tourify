<?php
// admin.php

include 'db.php';

// Fetch existing packages from the database
$result = $conn->query("SELECT * FROM packages");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="add_package.css">
   
</head>
<body>


<section class="header">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="add_package.php" class="navbar-brand"><u>Admin Dashboard.</u></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_Data.php">User Booking Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_Data(1).php">User Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_package.php">Add Package<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<br>
<h2 class="text-center"><b>Add New Packages</b></h2>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Add New Package</h3>
                </div>
                <div class="card-body">
                    <form action="process.php" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imageSrc" class="form-label">Image Source</label>
                            <input type="text" class="form-control" name="imageSrc" id="imageSrc" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <br>

    <h2 class="text-center"><b>Existing Packages</b></h2>


    <div class="container mt-5">
    <div class="row card-container">
        <?php
        // Displaying existing packages
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4'>";
                echo "<div class='card h-100'>";
                echo "<div class='card-body d-flex flex-column'>";
                echo "<div>";
                echo "<h5 class='card-title'><strong>Title:</strong> {$row['title']}</h5>";
                echo "<p class='card-text'><strong>Description:</strong> {$row['description']}</p>";
                echo "<p class='card-text'><strong>Image Source:</strong> {$row['imageSrc']}</p>";
                echo "</div>";
                
                // Card actions
                echo "<div class='card-actions mt-3'>";
                // Adding edit button with a form for each package
                echo "<form action='edit_package.php' method='post' class='d-inline'>";
                echo "<input type='hidden' name='package_id' value='{$row['id']}'>";
                echo "<button class='btn btn-warning' type='submit'>Edit</button>";
                echo "</form>";

                // Adding delete button with a form for each package
                echo "<form action='delete_package.php' method='post' class='d-inline'>";
                echo "<input type='hidden' name='package_id' value='{$row['id']}'>";
                echo "<button class='btn btn-danger ms-2' type='submit'>Delete</button>";
                echo "</form>";
                echo "</div>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No packages available.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>

</body>
</html>