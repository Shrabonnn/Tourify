<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>package</title> 


    <!-- swiper css link -->
     
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

    <!-- font awesome cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
     
      <!-- custom css file link -->
      <link rel="stylesheet" href="style.css">
       <!-- Inline CSS for Dropdown Menu -->
    <style>
        /* Style the dropdown container */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Style the dropdown button */
        .dropbtn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #333;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .dropbtn i {
            margin-right: 5px;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #ddd;
        }
    </style>

</head>
<body>
    
<!-- header section starts -->

<section class="header"> 
    <a href="home.php" class="logo">Tourify.</a> 

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="package.php">package</a>
        <a href="book.php">book</a>
        
        <!-- Search bar integrated into navbar -->
        <div class="search-bar" style="display: inline-block;">
            <form action="package.php" method="GET">
                <input type="text" name="search" placeholder="Search packages..." required style="padding: 5px; border-radius: 4px; border: 1px solid #ccc;">
                <button type="submit" class="btn2" style="padding: 5px 10px;">Search</button>
            </form>
        </div>
        <!-- User Icon with Dropdown Menu -->
      <div class="dropdown">
            <button class="dropbtn">
                <i class="fa-solid fa-user"></i> 
                <?php 
                    session_start();
                    echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'User'; 
                ?>
            </button>
            <div class="dropdown-content">
                <a href="user_dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav> 

    <div id="menu-btn" class="fas fa-bars"></div>



</section>


<!-----------------------Header section end--------->
<div class="heading" style="background:url(images/packages.jpg) no-repeat">

    <h1>Packages</h1>
</div>

<!------packages section start--------->

<section class="packages">
    <h1 class="heading-title">top destination</h1>
    
    <div class="box-container">
       
    <?php
            // Including the database connection file
            include 'db.php';

            // Fetching data from the 'packages' table
            //$sql = "SELECT * FROM packages";
            //$result = $conn->query($sql);

    // Check if a search term is provided
    $searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

    // Modify the query to filter based on the search term
    if ($searchTerm) {
        $sql = "SELECT * FROM packages WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
    } else {
        // Default query if no search term is provided
        $sql = "SELECT * FROM packages";
    }

    $result = $conn->query($sql);

            // Displaying the packages
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="box">
                  <div class="image">
                      <img src="' . $row['imageSrc'] . '" alt="">
                  </div>
                  <div class="content">
                      <h3>' . $row['title'] . '</h3>
                        <p>' . $row['description'] . '</p>

                             <div style="display: flex; justify-content: center; align-items: center;">
                    <!-- Displaying Tk: {dynamic_value} -->
                    <span style="font-size: 24px; margin-right: 20px;">Tk: ' . $row['taka'] . '</span>

                    <!-- Book Now Button -->
                    <a href="tour_details.php?id=' . $row['id'] . '" class="btn2">Book Now</a>
                </div>
                        
                        <form action="delete_package.php" method="post">

                        <input type="hidden" name="package_id" value="' . $row['id'] . '">
                          
                      </form>
                  </div>
              </div>';
              }
          } else {
              echo "No packages available.";
          }
            // Closing the database connection
            $conn->close();
            ?>


    </div>

    <div class="load-more"><span class="btn2">load more</span></div>


</section>


<!---packages section end--------->








<!-----------------------Footer section Start--------->

<section class="footer">
    <div class="box-container">

      <div class="box"> 
        <h3>quick links</h3>
        <a href="home.php"><i class="fas fa-angle-right"></i>home</a>
        <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
        <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
        <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
      </div>  
      
      
      <div class="box"> 
        <h3>extra links</h3>
        <a href="#"><i class="fas fa-angle-right"></i>ask questions</a>
        <a href="#"><i class="fas fa-angle-right"></i>about us</a>
        <a href="#"><i class="fas fa-angle-right"></i>privacy policy</a>
        <a href="#"><i class="fas fa-angle-right"></i>terms of use</a>

      </div>

      <div class="box"> 
        <h3>contact info</h3>
      <a href="#"><i class="fas fa-phone"></i>+123-456-789</a>
      <a href="#"><i class="fas fa-phone"></i>+123-456-789</a>
      <a href="#"><i class="fas fa-envelope"></i>123@gmail.com</a>
      <a href="#"><i class="fas fa-map"></i>dhaka, bd -200421</a>
     
      </div> 
      <div class="box"> 
        <h3>follow us</h3> 
        <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
        <a href="#"><i class="fab fa-twitter"></i> twitter</a>
        <a href="#"><i class="fab fa-instagram"></i> instagram</a>
        <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
      </div>

    </div>

    <div class="credit"> <span>----------</span>| all right reserved |----------</div>
  </section>