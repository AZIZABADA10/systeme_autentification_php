<?php

$server = 'localhost';
$utilisateur = 'root';
$mot_de_passe = '';
$nom_bd = 'bd_utilisateurs';

$connexion = new mysqli($server,$utilisateur,$mot_de_passe,$nom_bd);

if ($connexion -> connect_error) {
   die('echec de connexion : '.$connexion -> connect_error );
}

?>