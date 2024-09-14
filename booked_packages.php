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

// Fetch booked packages from package_confirm using email
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
    <title>Booked Packages</title>
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

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="user_dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="booked_packages.php">
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

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Booked Packages</h1>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Your Booked Packages</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Package ID</th>
                                    <th scope="col">Package Name</th>
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

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
