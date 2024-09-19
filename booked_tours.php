<?php
// Include the configuration file
require_once('config.php');

// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])) {
    header('Location: login_form.php');
    exit();
}

// Get the logged-in user's email from session
$user_email = $_SESSION['user_email'];

// Fetch booked tours from book_db using email
$booking_query = "SELECT id AS booking_id, location, arrivals, leaving FROM book_db.book_form WHERE email = ?";
$stmt_booking = $conn_book_db->prepare($booking_query);
$stmt_booking->bind_param("s", $user_email);
$stmt_booking->execute();
$booking_result = $stmt_booking->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Booked Tours</title>
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
 <a class="nav-link collapsed" href="user_settings.php">
        <i class="bi bi-gear"></i>
        <span>Settings</span>
    </a>
</li>

    </ul>
</aside>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Booked Tours</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Your Booked Tours</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">Leaving Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($booking = $booking_result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($booking['booking_id']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['location']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['arrivals']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['leaving']); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
