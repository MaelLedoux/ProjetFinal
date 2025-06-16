<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once 'db.php';

// Sécurisation des données reçues
$nom = htmlspecialchars(trim($_POST['nom']));
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$telephone = htmlspecialchars(trim($_POST['telephone']));
$sujet = htmlspecialchars(trim($_POST['sujet']));
$message = htmlspecialchars(trim($_POST['message']));

if ($nom && $email && $message) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact.portfoliomh@gmail.com';
    $mail->Password = 'sqxg xpuk pcrg zcmf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    try {
        // Configuration de l'expéditeur et du destinataire
        $mail->setFrom('contact.portfoliomh@gmail.com', 'MH Interior - Formulaire');
        $mail->addReplyTo($email, $nom);
        $mail->addAddress('contact.portfoliomh@gmail.com');
        $mail->Subject = 'Nouveau message depuis le formulaire de contact';

        // Corps du mail
        $body = "<strong>Nom:</strong> $nom<br>
                <strong>Email:</strong> $email<br>
                <strong>Téléphone:</strong> $telephone<br>
                <strong>Sujet:</strong> $sujet<br>
                <strong>Message:</strong><br>$message";

        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->send();

        // Enregistrement en base de données
        $stmt = $pdo->prepare("INSERT INTO contact_messages (nom, email, sujet, message, date_envoi, telephone) VALUES (?, ?, ?, ?, NOW(), ?)");
        $stmt->execute([$nom, $email, $sujet, $message, $telephone]);

        header('Location: ../public/merci.html');
        exit();
    } catch (Exception $e) {
        echo "Une erreur est survenue : {$mail->ErrorInfo}";
    }
} else {
    echo "Veuillez remplir tous les champs requis.";
}
?>