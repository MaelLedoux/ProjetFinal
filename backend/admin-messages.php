<?php
session_start();
$adminPassword = 'mhadmin2025';

if (!isset($_SESSION['admin']) && (!isset($_POST['password']) || $_POST['password'] !== $adminPassword)) {
    echo '<form method="POST" style="text-align:center; margin-top: 50px;">';
    echo '<h2>Accès admin</h2>';
    echo '<input type="password" name="password" placeholder="Mot de passe" required>'; 
    echo '<button type="submit">Connexion</button>';
    echo '</form>';
    exit();
} else {
    $_SESSION['admin'] = true;
}

require_once 'db.php';

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $pdo->prepare("DELETE FROM contact_messages WHERE id = ?")->execute([$id]);
    header('Location: admin-messages.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY date_envoi DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messages reçus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Segoe UI', sans-serif; padding: 40px; margin: 0; background: #f4f4f4; }
        h1 { text-align: center; color: #1b1e39; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #1b1e39; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .delete-btn {
            background: #d9534f; color: white; border: none; padding: 6px 12px;
            border-radius: 4px; cursor: pointer;
        }
        .delete-btn:hover { background: #c9302c; }
        @media (max-width: 768px) {
            table, th, td { font-size: 14px; }
            body { padding: 20px; }
        }
    </style>
</head>
<body>
    <h1>📥 Messages reçus via le formulaire de contact</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Sujet</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
                <tr>
                    <td><?= htmlspecialchars($msg['nom']) ?></td>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= htmlspecialchars($msg['telephone']) ?></td>
                    <td><?= htmlspecialchars($msg['sujet']) ?></td>
                    <td><?= nl2br(html_entity_decode($msg['message'], ENT_QUOTES, 'UTF-8')) ?></td>
                    <td><?= $msg['date_envoi'] ?></td>
                    <td>
                        <form method="get" onsubmit="return confirm('Supprimer ce message ?');">
                            <input type="hidden" name="delete" value="<?= $msg['id'] ?>">
                            <button type="submit" class="delete-btn">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>