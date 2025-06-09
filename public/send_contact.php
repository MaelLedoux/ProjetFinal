<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $tel = htmlspecialchars(trim($_POST["tel"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (empty($nom) || empty($email) || empty($tel) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Veuillez remplir tous les champs correctement.";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contact.portfoliomh@gmail.com';
        $mail->Password = 'hhglqukgtebejlgp';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('contact.portfoliomh@gmail.com', 'MH Interior');
        $mail->addAddress('contact.portfoliomh@gmail.com');

        $mail->Subject = 'Nouveau message depuis le portfolio MH Interior';
        $mail->Body = "Nom: $nom\nEmail: $email\nTéléphone: $tel\nMessage:\n$message";

        $mail->send();
        header("Location: merci.html");
        exit;
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
