<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
include dirname(__FILE__).'/PHPMailer/PHPMailer.php';
include dirname(__FILE__).'/PHPMailer/SMTP.php';
include dirname(__FILE__).'/PHPMailer/Exception.php';

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$nom = $_POST['nom'];
$message = $_POST['Message'];
$email = $_POST['Email'];
//echo $nom,$message,$email;
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail42.lwspanel.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@5booster.com';                     // SMTP username
    $mail->Password   = 'fP9!YGywHN';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $str = $nom.'+'.$email;
    $mail->setFrom('admin@5booster.com', $email);
    $mail->addAddress('noreply@5booster.com', 'noreply');
    //$mail->addAddress('979581491@qq.com', 'SERVER');
    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Client Contacts us!';
    $mail->Body    = $message;
//    $mail->AltBody = $message;

    $mail->send();
   // echo 'Message has been sent';
    include '3.php';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo 'website is under mainten';
}