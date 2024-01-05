<?php

/* création du PDO */
$pdoPortfolio = new PDO(
    'mysql:host=localhost;dbname=portfolio',
    'root', // utilisateur
    '', // mot de passe
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // La première ligne demande l'affichage des erreurs sql sous forme de warning
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // précise le jeu de caratère lorsque ces erreurs apparaissent
    )
);

/* Erreurs et validation  */
$message = '';

/* ouverture de session */
session_start();

/* fonction de connexion */
function estConnecte(){
    if (isset($_SESSION['membres'])) {/* $_SESSION permet de récupérer les infos sur la personne se trouvant sur notre site. 
        Ici je précise que $_SESSION doit aller chercher les infos concernant les tables membres */
        return true;
    } else {
        return false;
    }
}

/* 3 - Création de la fonction pour vérifier qu'un utilisateur est administrateur */
function estAdmin(){
    if (estConnecte() && $_SESSION['membres']['statut'] == 1) { 
    /* on vérifie que l'utilisateur remplie les conditions de notre fonction estConncte() et que son statut en BDD correspond à 1 (admin) */
        return true;
    } else {
        return false;
    }
}
?>


