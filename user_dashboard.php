<?php
// Include the configuration file
require_once('config.php');

// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login_form.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="user_dashboard.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">User Dashboard</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <!-- Home Icon -->
            <li class="nav-item">
                <a href="home.php" class="nav-link d-flex align-items-center">
                <i class="bi bi-house-door" style="font-size: 20px; margin-right: 20px;"></i> <!-- Home icon -->
                </a>
            </li>
        </ul>
    </nav>
</header>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="user_dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="booked_packages.php">
                <i class="bi bi-box"></i>
                <span>Booked Packages</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="booked_tours.php">
                <i class="bi bi-calendar"></i>
                <span>Booked Tours</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

<!-- ======= Main Content ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>User Dashboard</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Add your dashboard content here -->
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Welcome to Your Dashboard</h2>
                    </div>
                    <div class="card-body">
                        <!-- Dashboard content or user information goes here -->
                        <p>Hello, welcome to your dashboard overview.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Tourify</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>
