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
        <a href="logout.php" class="btn">logout</a>
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
            $sql = "SELECT * FROM packages";
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
                        <a href="book.php' . $row['link'] . '" class="btn2">Book Now</a>
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