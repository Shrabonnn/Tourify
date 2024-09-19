<?php
   // Initialize total taka variable
   $total_taka = 0;

   require_once('admin_Data_fetch(2).php');

   // Query to fetch all package bookings
   $query = "SELECT * FROM packages_form";
   $result = mysqli_query($con, $query);

   // Query to fetch the number of bookings per package and total taka
   $package_query = "SELECT location, COUNT(*) AS booking_count, SUM(taka) AS total_taka FROM packages_form GROUP BY location";
   $package_result = mysqli_query($con, $package_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - NiceAdmin Bootstrap Template</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
  </header><!-- End Header -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_package.php">
          <i class="bi bi-circle"></i><span>Add Package</span>
        </a>
      </li>
      <li>
        <a href="existing_package.php">
          <i class="bi bi-circle"></i><span>Existing Package</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
<i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
<li>
  <a href="admin_Data(1).php">
    <i class="bi bi-circle"></i><span>Users Table</span>
  </a>
</li>
<li>
  <a href="admin_Data.php">
    <i class="bi bi-circle"></i><span>Booked Table</span>
  </a>
</li>
<li>
  <a href="admin_Data(2).php">
    <i class="bi bi-circle"></i><span>Packages Table</span>
  </a>
</li>
</ul>
</li>
<!-- End Tables Nav -->



  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="home.php">
      <i class="bi bi-person"></i>
      <span>Home</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->


</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Booked Package List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item active">Packages Table</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-16">
          <div class="row">

            <!-- Booking Table -->
            <section>
              <div class="container">
                <div class="row mt-5">
                  <div class="col">
                    <div class="card mt-5">
                      <div class="card-header">
                        <h2 class="display-6 text-center">Booking</h2>
                      </div>
                      <div class="card-body">
                        <table class="table table-striped text-center">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Address</th>
                              <th scope="col">Location</th>
                              <th scope="col">Guests</th>
                              <th scope="col">Arrivals</th>
                              <th scope="col">Leaving</th>
                              <th scope="col">Taka</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                              <th scope="row"><?php echo $row['id']; ?></th>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['phone']; ?></td>
                              <td><?php echo $row['address']; ?></td>
                              <td><?php echo $row['location']; ?></td>
                              <td><?php echo $row['guests']; ?></td>
                              <td><?php echo $row['arrivals']; ?></td>
                              <td><?php echo $row['leaving']; ?></td>
                              <td><?php echo $row['taka']; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Booking Table -->

            <!-- Package Details Card -->
            <section>
              <div class="container mt-5">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="text-center">Package Details</h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <?php
                          while ($package = mysqli_fetch_assoc($package_result)) {
                              // Increment total taka
                              $total_taka += $package['total_taka'];
                          ?>
                          <div class="col-md-4">
                            <div class="card mb-4">
                              <div class="card-body">
                                <h5 class="card-title"><?php echo $package['location']; ?></h5>
                                <p class="card-text">Total Bookings: <?php echo $package['booking_count']; ?></p>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Package Details Card -->

            <!-- Total Taka Section -->
            <section>
              <div class="container mt-5">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="text-center">Total Taka for All Packages</h3>
                      </div>
                      <div class="card-body text-center">
                        <!-- Dynamically Displaying Total Taka -->
                        <h4>Total Taka: Tk. <?php echo $total_taka; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Total Taka Section -->

          </div>
        </div>
      </div>
    </section>

  </main><!-- End Main Content -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
