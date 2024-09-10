<?php
include('smtp/PHPMailerAutoload.php');

$connection = mysqli_connect('localhost', 'root', '', 'package_confirm');

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Inserting data into the database
    $request = "INSERT INTO packages_form(name,email,phone,address,location,guests,arrivals,leaving)
                VALUES('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";
    mysqli_query($connection, $request);

    // Sending email to the user using SMTP
    $to = $email;
    $subject = 'Booking Confirmation';
    $message =  "Dear $name,<br><br>
    Thank you for booking your trip with us!<br><br>
    Details of your booking:<br>a
    Location: $location<br>
    Guests: $guests<br>
    Arrival Date: $arrivals<br>
    Departure Date: $leaving<br><br>
    We look forward to serving you!<br><br>
    Best regards,<br>
    The Tourify Team";

    // Calling the smtp_mailer function to send the email
    $result = smtp_mailer($to, $subject, $message);

    if ($result === 'Sent') {
        echo 'Booking successful! An email has been sent to your address.';
    } else {
        echo 'Booking successful! However, there was an issue sending the email. Error: ' . $result;
    }

    // Redirecting the user back to the 'book.php' page
    header('location:book.php');
} else {
    echo 'Something went wrong. Please try again.';
}

// Moving the smtp_mailer function outside the if block
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
    //$mail->SMTPDebug = 2;
    $mail->Username = "tanvirh934@gmail.com";
    $mail->Password = "jmlwvsvazwropqjx";
    $mail->SetFrom("tanvirh934@gmail.com");
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