<?php

session_start();
require_once 'config.php';

/**La creation su compet utilisateur  */
if (isset($_POST['inscrire'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $email_deja_existe = $connexion -> query("SELECT email FROM utilisateurs WHERE email = '$email'");
    if ($email_deja_existe->num_rows > 0 ) {
        $_SESSION['sinscrire_erreur'] = "Email et déja existe !";
        $_SESSION['form_active'] = "s-inscrire-form";
    }else{
        $connexion -> query("INSERT INTO utilisateurs
        (`nom_complet`,`email`,`mot_de_passe`,`role`) 
        VALUES ('$nom','$email','$mot_de_passe','$role');
        ");
        
    }
    header("Location: index.php");
    exit();
}

/** la connection */
if (isset($_POST['connecter'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $verification_du_compet = $connexion -> query("SELECT * FROM utilisateurs WHERE email ='$email'");
    if ($verification_du_compet -> num_rows > 0) {
        $utilisateur = $verification_du_compet -> fetch_assoc();
        if (password_verify($mot_de_passe,$utilisateur['mot_de_passe'])) {
           
            $_SESSION['nom'] = $utilisateur['nom_complet'];
            $_SESSION['email'] = $utilisateur['email'];
        
        if ($$utilisateur['role'] === 'Admin') {

            header('Location: page_admin.php');

        }else{
            header('Location: page_utilisateur.php');
        }
        exit();
        }
    }

    $_SESSION['se_connecter_erreur'] = 'Le mot de passe ou email ne sont pas correct !';
    $_SESSION['form_active'] = 'login-form';
    header('Location: index.php');
    exit();
}

?>
