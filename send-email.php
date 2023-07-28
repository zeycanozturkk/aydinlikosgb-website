<?php

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->SMTPDebug = 0;

$mail->Username = "zeycan687@gmail.com";
$mail->Password = "izkwfsxxxwqfdhlp";

$mail->setFrom($email, $name);
$mail->addAddress("zeycan687@gmail.com");

$mail->Subject = 'konu';

$emailBody = "Ad Soyad: $name\n";
$emailBody .= "Numara: $phone\n\n";
$emailBody .= "Mesaj:\n$message";

$mail->Body = $emailBody;

try {
    $mail->send();
    // Redirect to the thank-you page on successful email sending
    header("Location: index2.html");
    exit(); // Make sure to add 'exit' after the redirection to stop further script execution
} catch (Exception $e) {
    echo "email sending failed: " . $mail->ErrorInfo;
}


