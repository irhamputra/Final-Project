<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/2/17
 * Time: 4:55 PM
 */

namespace classes\model;

use PHPMailer\PHPMailer\PHPMailer;

class ContactModel extends Model
{
    public function sendContact($data)
    {
        /* TODO: Ask Marten! Hilfe
         * Fehlermeldung: Fatal Error - PHPMailer is not found in ContactModel line 20.
         * Keine Ahnung, was los ist.
         */
        $mail = new PHPMailer();
        $mail->setFrom("no-reply@campingart.com", "Camping Art - Contact Field");
        $mail->addAddress("hello@irhamputra.com");
        $mail->addReplyTo($data["email"]);
        $mail->isHTML(true);
        $mail->Subject = "Mail from Camping Art team - " . $data["Firstname"] . " " . $data["Lastname"];
        $mail->Body = $data["Message"];
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
        if (!$mail->send()) {
            echo "Message could not be sent.";
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
    }
}