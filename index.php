<?php

session_start();
$erreurs = [
    'se_connecter' => $_SESSION['se_connecter_erreur'] ?? '',
    's_inscrire' => $_SESSION['sinscrire_erreur'] ?? ''
];

$le_form_active = $_SESSION['form_active'] ?? 'login-form';

session_unset();

function afficher_erreurs($erreur){
    return !empty($erreur) ? "<p class='message-d-erreur'>$erreur</p>":'';
}


function form_active($nom_form,$active_form){
    return $nom_form === $active_form ? 'active':'';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification systeme</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="form-box <?= form_active('login-form',$le_form_active);?>" id="login-form">
            <legend>Formulaire de connexion</legend>
            <?= afficher_erreurs($erreurs['se_connecter']); ?>
            <form action="auth.php" method="POST">
                <input type="email" name="email" id="email" placeholder="email@email.com" required>
                <input type="password" name="password" id="password" placeholder="mot de passe" required>
                <button type="submit" name="connecter">Se connecter</button>
            </form>
            <p>Vous n'avez pas de compet ?<a href="#" onclick="afficherForm('s-inscrire-form')">Créer voter compet</a></p>
        </div>

        <div class="form-box  <?= form_active('s-inscrire-form',$le_form_active);?>" id="s-inscrire-form">
            <legend>Formulaire de s'inscrire</legend>
            <?= afficher_erreurs($erreurs['s_inscrire']); ?>
            <form action="auth.php" method="POST">
                
                <input type="text" name="nom" id="nom" required placeholder="Nom Complet">
                <input type="email" name="email" id="email" required placeholder="email@email.com">
                <input type="password" name="password" id="password" required placeholder="mot de passe">
                <select name="role" required>
                    <option value="" >Selecter un role</option>
                    <option value="Admin">Admin</option>
                    <option value="Admin">Utilisateur</option>
                </select>
                <button type="submit" name="inscrire">s'inscrire</button>
            </form>
            <p>Vous avez un compet ?<a href="#" onclick="afficherForm('login-form')">Se connecter</a></p>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>