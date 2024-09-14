<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title> 


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


<div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">

    <h1>About us</h1>
</div> 

<!-- about section starts -->

<section class="about">
    <div class="image">
        <img src="images/about-main.jpg" alt="">
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed perferendis fugit odit sapiente ipsa assumenda rem nostrum at ut veritatis ab illo est, illum iure minus adipisci praesentium earum temporibus!</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad esse ea vitae neque vel? Dignissimos consequuntur expedita explicabo corporis, aspernatur saepe reiciendis minima a. Architecto ut soluta perferendis error ad!</p>
        <div class="icons-container">
            <div class="icons">
                <i class="fas fa-map"></i>
                <span>top destinations</span>
            </div>
            <div class="icons">
                <i class="fas fa-hand-holding-usd"></i>
                <span>affordable price</span>
            </div>
            <div class="icons">
                <i class="fas fa-headset"></i>
                <span>24/7 service</span>
            </div>
        </div>
    </div>
</section>



<!-- about section ends -->

<!-- reviews section starts -->

<section class="reviews">
    <div class="swiper reviews-slider">
      
      <div class="swiper-wrapper">
               
       <div class="swiper-slider slide">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, natus! Itaque ex fugit ea eos eligendi. Ipsa molestiae laborum, commodi unde quaerat dolor aliquid magnam iste autem tempora debitis! Accusantium.</p>
            <h3>john doe</h3>
            <span>traveler</span>
            <img src="images/person1.jpg" alt="">
        </div>

        <div class="swiper-slider slide">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis corporis reiciendis amet cum veritatis ducimus dignissimos culpa nostrum atque harum ex quas dolore, sint earum consectetur animi pariatur maxime ratione. Earum quasi natus aliquam laborum! Quaerat porro distinctio unde ipsum?</p>
             <h3>john doe</h3>
             <span>traveler</span>
             <img src="images/person2.jpg" alt="">
        </div>

        <div class="swiper-slider slide">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, natus! Itaque ex fugit ea eos eligendi. Ipsa molestiae laborum, commodi unde quaerat dolor aliquid magnam iste autem tempora debitis! Accusantium.</p>
             <h3>john doe</h3>
             <span>traveler</span>
             <img src="images/peson3.jpg" alt="">
        </div>

        <div class="swiper-slider slide">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos nisi doloremque harum dolores omnis eaque.</p>
             <h3>john doe</h3>
             <span>traveler</span>
             <img src="images/person4.jpg" alt="">
        </div>

        <div class="swiper-slider slide">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates hic laboriosam dolor aliquam facere odio sit debitis, assumenda quaerat eaque nihil in itaque molestiae saepe nisi quasi reiciendis, omnis quod fugiat id nam vitae deserunt.</p>
             <h3>john doe</h3>
             <span>traveler</span>
             <img src="images/person5.jpg" alt="">
        </div>

        <div class="swiper-slider slide">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                
            </div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, omnis. Explicabo modi ab ullam temporibus est vero magnam earum voluptatum.</p>
             <h3>john doe</h3>
             <span>traveler</span>
             <img src="images/person6.jpg" alt="">
        </div>


          
        

      </div>

    </div>
</section>





<!-- reviews section ends -->



















 <!-- footer section starts -->


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


<!-- footer section ends -->


 <!-- swiper js link -->
 <script src="C:\Users\User\Downloads\project-20240103T152231Z-001\project\swiper-11.0.5\package\swiper-bundle.min.js"></script>


<!-- custom js file  link -->

<script src="script.js"></script>



</body> 


</html>














 















