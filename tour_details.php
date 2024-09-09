<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Details</title>

    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- header section -->
<section class="header">
    <a href="home.php" class="logo">Tourify.</a>
    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="package.php">package</a>
        <a href="book.php">book</a>
        <a href="logout.php" class="btn">logout</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</section>

<!-- heading section -->
<div class="heading" style="background:url(images/packages.jpg) no-repeat">
    <h1>Tour Details</h1>
</div>

<!-- tour details section -->
<section class="packages">
    <h1 class="heading-title">Tour Details</h1>

    <div class="box-container">
        <?php
        // Including the database connection
        include 'db.php';

        // Checking if package ID is passed in the URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Fetching the package data by ID
            $sql = "SELECT * FROM packages WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="box">
                        <div class="image">
                            <img src="' . $row['imageSrc'] . '" alt="">
                        </div>
                        <div class="content">
                            <h3>' . $row['title'] . '</h3>
                            <p>' . $row['description'] . '</p>
                            <a href="book.php?id=' . $row['id'] . '" class="btn2">Book Now</a>
                        </div>
                    </div>';
            } else {
                echo "<p>No package found.</p>";
            }
        } else {
            echo "<p>No package ID provided.</p>";
        }

        // Closing the database connection
        $conn->close();
        ?>
    </div>
</section>

<!-- footer section -->
<section class="footer">
    <!-- Add the same footer code here as in package.php -->
</section>

</body>
</html>
