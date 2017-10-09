<?php 
require '../PHPMailer/PHPMailerAutoload.php';

ini_set('display_errors', true);
error_reporting(E_ALL);

$entry_email = $_POST['email'];
$entry_name = $_POST['name'];
$entry_message = $_POST['message'];

$mail = new PHPMailer;
$txt = "Email: " . $entry_email . '<br>Name: ' . $entry_name . '<br> Message: ' . $entry_message;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.parmezani.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'webserver@parmezani.com';                 // SMTP username
$mail->Password = 'SlandayRecound@321';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('webserver@parmezani.com', 'Parmezani');
$mail->addAddress('contact@parmezani.com', 'Contact');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Website Inquiry';
$mail->Body    = $txt;
$mail->AltBody = $txt;

if(!$mail->send()) {
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent';
}

die();