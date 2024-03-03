<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load PHPMailer classes
require 'portfolio/PHPMailer-PHPMailer-2128d99/Exception.php';
require 'portfolio/PHPMailer-PHPMailer-2128d99/SMTP.php';
require 'portfolio/PHPMailer-PHPMailer-2128d99/PHPMailer.php';



if(isset($_POST['email']) && isset($_POST['message'])) {
    $toEmail = 'raven.espinosa8@gmail.com'; // Change this to your Gmail address
    $fromEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize email input
    $messageBody = filter_var($_POST['message'], FILTER_SANITIZE_STRING); // Sanitize message input

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'raven.espinosa0308@gmail.com';   // SMTP username
        $mail->Password   = 'RdME03082000!!!!';               // SMTP password
        $mail->SMTPSecure = 'tls';                                  
        $mail->Port       = 587;                                    

        // Recipients
        $mail->setFrom($fromEmail);
        $mail->addAddress($toEmail);

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'Message from Contact Form';
        $mail->Body    = 'Email: ' . $fromEmail . '\n\n' . 'Message: ' . $messageBody;

        $mail->send();
        
        // Send a success response back to the client-side JavaScript
        echo json_encode(array('status' => 'success'));
    } catch (Exception $e) {
        // Send an error response back to the client-side JavaScript
        echo json_encode(array('status' => 'error', 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo));
    }
} else {
    // Send an error response back to the client-side JavaScript
    echo json_encode(array('status' => 'error', 'message' => 'Error: Email and message fields are required.'));
}
?>
