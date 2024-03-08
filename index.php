<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$env = parse_ini_file('.env');

// SMTP settings
$smtp_server = $env['SERVER'];
$smtp_username = $env['USERNAME'];
$smtp_password = $env['PASSWORD'];
$smtp_port = 465; // or 465 for SSL

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = $smtp_server;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $smtp_port;

    // Recipients
    $mail->setFrom($smtp_username, 'Sender Name');
    $mail->addAddress('ajayjagtap.10@gmail.com', 'Recipient Name');

    // Content
    $mail->isHTML(false); // Set email format to plain text
    $mail->Subject = 'Test Email Successfully';
    $mail->Body = 'This is a test email sent from PHPMailer.';

    // Send email
    $mail->send();
    echo 'Email sent successfully.';
} catch (Exception $e) {
    echo 'Failed to send email. Error: ', $mail->ErrorInfo;
}


?>
