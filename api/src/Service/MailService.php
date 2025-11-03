<?php

namespace App\Service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public function envoyerMail(string $fromEmail, string $fromName, string $subject, string $body): void
    {
        $mail = new PHPMailer(true);

        try {
            // Configuration SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact.portfoliomh@gmail.com';
            $mail->Password = 'bahj zypx ymvd gkjm'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataires
            $mail->setFrom('contact.portfoliomh@gmail.com', 'MH Interior - Formulaire');
            $mail->addReplyTo($fromEmail, $fromName);
            $mail->addAddress('contact.portfoliomh@gmail.com');

            // Contenu
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
        } catch (Exception $e) {
            // ❌ Affiche ou remonte clairement l’erreur à Symfony
            throw new \RuntimeException('Erreur PHPMailer : ' . $mail->ErrorInfo);
        }
    }
}
