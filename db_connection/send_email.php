<?php
// require '../vendor/autoload.php'; // Include Composer autoloader

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Your PHPMailer code here


function sendConfirmationEmail($name, $email, $body) {
    $mail = new PHPMailer(true);

    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        // $mail->Username = 'antonyochieng00@gmail.com'; // Replace with your SMTP username
        $mail->Username = 'reignsdentalclinic@gmail.com'; // Replace with your SMTP username
        //$mail->Password = 'uriezzwgwlevkzja'; // Replace with your SMTP password
        $mail->Password = 'tztgswrijdzbfhmq'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use STARTTLS if supported
        $mail->Port = 587; // Port for STARTTLS

        // Set email content, recipients, subject, and body
        $mail->setFrom('reignsdentalclinic@gmail.com', 'Reigns Dental Clinic');
        $mail->addAddress($email, $name);
        $mail->Subject = 'Dental Appointment Confirmation';
        $mail->Body = $body; // Your message here

        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        print_r($e);
        return false; // Email sending failed
    }
}

// // Example usage
// $name = 'John Doe';
// $email = 'john@example.com';

// if (sendConfirmationEmail($name, $email)) {
//     echo 'Confirmation email sent successfully.';
// } else {
//     echo 'Failed to send confirmation email. Please try again later.';
// }
?>
