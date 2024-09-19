<?php
// Include the database configuration file
require_once('config_02.php');

// Initialize variables
$email = '';
$name = '';
$phone = '';

// Get the user's email from the session
session_start();
if (!isset($_SESSION['user_email'])) {
    die("User email not set in session.");
}
$user_email = $_SESSION['user_email'];

// Prepare the SQL statement to fetch user data
$sql = "SELECT name, phone FROM users WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $phone = $row['phone'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_phone = $_POST['phone'];
    
    // Prepare the SQL statement to update user data
    $update_sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE email = ?";
    $update_stmt = $con->prepare($update_sql);
    $update_stmt->bind_param("ssss", $new_name, $new_email, $new_phone, $user_email);
    
    if ($update_stmt->execute()) {
        // Update successful
        echo "Your settings have been updated.";
        // Optionally, you can update the session email if it has changed
        $_SESSION['user_email'] = $new_email;
    } else {
        // Error updating
        echo "Error updating your settings.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Account Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style type="text/css">
        body {
            background: #f5f5f5;
            margin-top: 20px;
        }
        .form-control {
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account Settings</h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change Password</a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Account General Tab -->
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user_email); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <form method="POST" action="change_password.php">
                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control" name="current_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" class="form-control" name="new_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Repeat new password</label>
                                        <input type="password" class="form-control" name="repeat_new_password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
