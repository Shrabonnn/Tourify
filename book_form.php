<?php
include('smtp/PHPMailerAutoload.php');

// Database connection for book_db
$connection = mysqli_connect('localhost', 'root', '', 'book_db');

// Additional connection for user_booking_history_db
$history_db = new mysqli('localhost', 'root', '', 'user_booking_history_db');
if ($history_db->connect_error) {
    die("Connection failed: " . $history_db->connect_error);
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $user_id = $_SESSION['user_id']; // Ensure session is started and user_id is set

    // Inserting data into book_form
    $request = "INSERT INTO book_form(name,email,phone,address,location,guests,arrivals,leaving)
                VALUES('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";
    mysqli_query($connection, $request);

    // Inserting data into user_bookings
    $history_request = "INSERT INTO user_bookings (user_id, name, email, phone, address, location, guests, arrivals, leaving)
                        VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";
    mysqli_query($history_db, $history_request);

    // Sending email to the user using SMTP
    $to = $email;
    $subject = 'Booking Confirmation';
    $message =  "Dear $name,<br><br>
    Thank you for booking your trip with us!<br><br>
    Details of your booking:<br>
    Location: $location<br>
    Guests: $guests<br>
    Arrival Date: $arrivals<br>
    Departure Date: $leaving<br><br>
    We look forward to serving you!<br><br>
    Best regards,<br>
    The Tourify Team";

    $result = smtp_mailer($to, $subject, $message);

    if ($result === 'Sent') {
        echo 'Booking successful! An email has been sent to your address.';
    } else {
        echo 'Booking successful! However, there was an issue sending the email. Error: ' . $result;
    }

    header('location:book.php');
} else {
    echo 'Something went wrong. Please try again.';
}

// SMTP mailer function
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "your-email@gmail.com";
    $mail->Password = "your-email-password";
    $mail->SetFrom("your-email@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));

    if (!$mail->Send()) {
        return 'Error: ' . $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
?>
