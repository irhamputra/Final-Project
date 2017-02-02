<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/2/17
 * Time: 4:55 PM
 */

namespace classes\model;

use PHPMailer\PHPMailer\PHPMailer;

class ContactModel
{
    public function sendContact($data)
    {
        $mail = new PHPMailer();
        $mail->setFrom('no-reply@campingart.com', 'Camping Art - Contact Field');
        $mail->addAddress('hello@irhamputra.com'); // Add a recipient
        $mail->addReplyTo($data["Email"]);
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Mail from Camping Art Team - ' . $data["Firstname"] . " " . $data["Lastname"];
        $mail->Body = $data["Message"];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}