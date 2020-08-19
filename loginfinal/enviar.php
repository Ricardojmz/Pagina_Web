<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$body = "Nombre: " . $name . "<br>Email: " . $email . "<br>Mensaje: " . $message;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sugerenciatesch@gmail.com';                     // SMTP username
    $mail->Password   = 'H0l4 1 23 X';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;  
                                      // TCP port to connect to

    //Recipients
    $mail->setFrom('sugerenciatesch@gmail.com',$name);
    $mail->addAddress('labtescha@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Puede ser una sugerencia';
    $mail->Body    = $body;
   

    $mail->send();
    echo 'El mensaje se envió corectamente';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}
?>