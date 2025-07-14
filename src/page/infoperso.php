<?php
// infoperso.php - User Profile Page
include_once "../inc/fn.php";
session_start();
$id_membre = $_SESSION["id"];
$user = getinfo($id_membre);
// Dummy user data for demonstration
$data = getMyEmprun($id_membre);
include_once "../page/navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .profile-container {
            background: #fff;
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .profile-container h2 {
            margin-top: 0;
        }
        .profile-info {
            margin: 20px 0;
        }
        .profile-info label {
            font-weight: bold;
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Profile</h2>
        <div class="profile-info">
            <p><label>Username:</label> <?= htmlspecialchars($user['nom']); ?></p>
            <p><label>Email:</label> <?= htmlspecialchars($user['email']); ?></p>
            <p><label>Birthday:</label> <?= htmlspecialchars($user['date_naissance']); ?></p>
        </div></div></style></head>
        <div class="profile-container">
            <h2>My Emprunts</h2>
            <?php if (!empty($data)): ?>
                <ul>
                    <?php foreach ($data as $emprun): ?>
                        <li>
                            <?= htmlspecialchars($emprun['nom_objet']); ?> 
                            (<?= htmlspecialchars($emprun['date_emprunt']); ?>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No emprunts found.</p>
            <?php endif; ?>
        </div>
        </body>
        </html></li></div>