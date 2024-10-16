<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book now</title> 


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


<div class="heading" style="background:url(images/package.jpg) no-repeat">

    <h1>Book now</h1>
</div>




<!-----------------------Book section Start--------->
<section class="booking">
    <h1 class="heading-title">book your trip!</h1>
    
    <form action="book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>name: </span>
                <input type="text" placeholder="enter your name" name="name">
            </div>

            <div class="inputBox">
                <span>email: </span>
                <input type="email" placeholder="enter your email" name="email">
            </div>

            <div class="inputBox">
                <span>phone: </span>
                <input type="number" placeholder="enter your number" name="phone">
            </div>

            <div class="inputBox">
                <span>address: </span>
                <input type="text" placeholder="enter your address" name="address">
            </div>

            <div class="inputBox">
                <span>where to : </span>
                <input type="text" placeholder="place you want to visit" name="location">
            </div>

            <div class="inputBox">
                <span>how many: </span>
                <input type="number" placeholder="how many guests" name="guests">
            </div>

            <div class="inputBox">
                <span>arrivals: </span>
                <input type="date"  name="arrivals">
            </div>

            <div class="inputBox">
                <span>leaving : </span>
                <input type="date"  name="leaving">
            </div>

        </div>

        <input type="submit" value="submit" class="btn2" name="send">

    </form>

</section>








<!-----------------------Book section End--------->




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