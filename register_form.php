<?php
// Include the configuration file
include 'config.php'; // This includes the $conn_user_db and $conn_booking_db variables

if (isset($_POST['submit'])) {
    // Use $conn_user_db for user-related queries
    $name = mysqli_real_escape_string($conn_user_db, $_POST['name']);
    $email = mysqli_real_escape_string($conn_user_db, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' AND password ='$pass'";
    
    $result = mysqli_query($conn_user_db, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Passwords do not match';
        } else {
            $insert = "INSERT INTO user_form(name, email, password, user_type) 
                       VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn_user_db, $insert);
            header('location: login_form.php');
            exit(); // Ensure no further code is executed
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="log_in.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>

            <input type="text" name="name" required placeholder="Enter your name">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register Now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login now</a></p>
        </form>
    </div>
</body>
</html>
