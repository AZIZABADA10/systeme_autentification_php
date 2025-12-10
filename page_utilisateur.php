<?php

session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'utilisateur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background:#fff;">
    <div class="box">
        <h1>Salut <span><?= $_SESSION['nom']; ?></span></h1>
        <p>C'est la page <span>d'utilisateur</span></p>
        <button onclick="window.location.href='deconnecter.php'">Se déconnecter</button>
    </div>
</body>
</html>