<?php
// admin.php

include 'db.php';

// Fetch existing packages from the database
$result = $conn->query("SELECT * FROM packages");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard - Packages</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
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
      <h1>Existing-Package</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Existing-Package</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">





        <!-- Existing Packages Cards -->
<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Existing Packages</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <?php
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
              ?>
              <div class="col-md-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <p class="card-text">Image Source: <?php echo $row['imageSrc']; ?></p>
                    <!-- Actions: Edit and Delete buttons -->
                    <div class="d-flex">
                      <form action="edit_package.php" method="post" class="me-2">
                        <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                        <button class="btn btn-warning" type="submit">Edit</button>
                      </form>
                      <form action="delete_package.php" method="post">
                        <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                  }
              } else {
                  echo "<div class='col-12'><p class='text-center'>No packages available.</p></div>";
              }

              $conn->close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Existing Packages Cards -->


      </div>
    </section>

  </main><!-- End Main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Admin Dashboard</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
