<?php
// Affiche les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHP_mailer/src/Exception.php';
require 'PHP_mailer/src/PHPMailer.php';
require 'PHP_mailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion MySQL
    $host = 'localhost';
    $dbname = 'portfolio_db';
    $username = 'maelledoux';
    $password = 'Tahiti$*0106';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur connexion base : " . $e->getMessage());
    }

    // Récupération des champs
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $message = $_POST['message'] ?? '';

    // Affiche les données reçues pour test
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    // Vérifie champs requis
    if (!empty($nom) && !empty($email) && !empty($message)) {
        try {
            // 💾 Enregistre dans la base (remplacement de null par '')
            $stmt = $pdo->prepare("INSERT INTO contact_messages (nom, email, sujet, message, telephone) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $email, '', $message, $telephone]);

            // ✉️ Envoi email via Gmail
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact.portfoliomh@gmail.com';
            $mail->Password = 'hhglqukgtebejlgp'; // Mot de passe d’application Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('contact.portfoliomh@gmail.com', 'MH Interior');
            $mail->addReplyTo($email, $nom); // permet de répondre à l’expéditeur
            $mail->addAddress('contact.portfoliomh@gmail.com', 'MH Interior');

            $mail->isHTML(true);
            $mail->Subject = "Nouveau message de contact";
            $mail->Body = "
                <h2>Message reçu via le formulaire</h2>
                <p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>
                <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>Téléphone :</strong> " . htmlspecialchars($telephone) . "</p>
                <p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
            ";

            $mail->send();

            // ✅ Redirection vers page de remerciement
            header("Location: merci.html");
            exit();
        } catch (Exception $e) {
            echo "Erreur envoi mail : " . $mail->ErrorInfo;
        }
    } else {
        echo "❌ Veuillez remplir tous les champs obligatoires (nom, email, message).";
    }
} else {
    echo "⛔ Accès direct non autorisé.";
}
?>
