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

// Fetch user details from user_db
$user_query = "SELECT * FROM user_form WHERE email = ?";
$stmt = $conn_user_db->prepare($user_query);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_result->num_rows > 0) {
    $user_data = $user_result->fetch_assoc();
    $user_id = $user_data['id']; // Get the logged-in user's ID
} else {
    die("User not found.");
}

// Fetch bookings from book_db using email
$booking_query = "SELECT id AS booking_id, location, arrivals, leaving FROM book_db.book_form WHERE email = ?";
$stmt_booking = $conn_book_db->prepare($booking_query);
$stmt_booking->bind_param("s", $user_email);
$stmt_booking->execute();
$booking_result = $stmt_booking->get_result();

// Fetch packages from package_confirm using email, including guests, arrivals, and leaving
$package_query = "SELECT id AS package_id, name AS package_name, location, guests, arrivals, leaving 
                  FROM package_confirm.packages_form WHERE email = ?";
$stmt_package = $conn_package_confirm->prepare($package_query);
$stmt_package->bind_param("s", $user_email);
$stmt_package->execute();
$package_result = $stmt_package->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>User Dashboard</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="user_dashboard.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">User Dashboard</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
</header>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="user_dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Booking History</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="booked_packages.php">
                        <i class="bi bi-circle"></i><span>Booked Packages</span>
                    </a>
                </li>
                <li>
                    <a href="booked_tours.php">
                        <i class="bi bi-circle"></i><span>Booked Tours</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="user_settings.php">
                <i class="bi bi-grid"></i>
                <span>Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>User Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="user_dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">User Details</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($user_data['name']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user_data['email']); ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Booking History</h2>
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

            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Booked Packages</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Package ID</th>
                                    <th scope="col">Bookers Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Guests</th>
                                    <th scope="col">Arrival Date</th>
                                    <th scope="col">Leaving Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($package = $package_result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($package['package_id']); ?></td>
                                        <td><?php echo htmlspecialchars($package['package_name']); ?></td>
                                        <td><?php echo htmlspecialchars($package['location']); ?></td>
                                        <td><?php echo htmlspecialchars($package['guests']); ?></td>
                                        <td><?php echo htmlspecialchars($package['arrivals']); ?></td>
                                        <td><?php echo htmlspecialchars($package['leaving']); ?></td>
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

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
