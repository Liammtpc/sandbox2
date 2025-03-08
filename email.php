<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mtpc1999heshmati@gmail.com';                     //SMTP username
    $mail->Password   = '@Mtpc1997';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('mtpc1999heshmati@gmail.com', 'Mailer');
    $mail->addAddress('heshmatianmehran@gmail.com', 'Joe User');     //Add a recipient
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    $attachmentPath = 'file.tar.gz'; // Example relative path

    if (file_exists($attachmentPath)) {
        $mail->addAttachment($attachmentPath);
        echo "Attachment added: " . $attachmentPath . "<br>";
    } else {
        $errorMessage = "Error: Could not find attachment file: " . $attachmentPath;
        echo $errorMessage . "<br>";
        error_log($errorMessage); // Log the error for later review
        // Consider sending the email without the attachment or displaying a user-friendly message.
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
