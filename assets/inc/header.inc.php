<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <!-- CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/contact.css">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
</head>

<?php
/* Appel du fichier init */
require 'assets/inc/init.inc.php';

/* La déconnexion */
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
  session_destroy();
  header('location:index.php');
  exit();
}

// Traitement du formulaire
if (!empty($_POST["avis"])) {

  // protection des failles SQL
  $_POST['message'] = htmlspecialchars($_POST['message']);

  // la requête
  $ajoutCommentaire = $pdoPortfolio->prepare("INSERT INTO commentaires (prenom, nom, email, message) VALUES (:prenom, :nom, :email, :message)");

  // J'associe les marqueurs vides à leurs valeurs
  $ajoutCommentaire->execute([
    ":prenom" => $_POST['prenom'],
    ":nom" => $_POST['nom'],
    ":email" => $_POST['email'],
    ":message" => $_POST['message']
  ]);
};

?>

<body>
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-expand-lg bg-black"><!-- début de la navbar -->
      <div class="container-fluid"><!-- début du conteneur -->

        <!-- début du titre principal -->
        <a class="navbar-brand" href="#">
          <h1>
            <span>
              <span style="color: white;">Wi</span>lliam <span style="color: white;">Ny</span>acka's Portfolio
            </span>
          </h1>
        </a>
        <!-- fin du titre principal -->

        <!-- début du bouton -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="bi bi-justify"></i>
        </button>
        <!-- fin du bouton -->

        <!-- début des liens -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service.php">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mes-projets.php">Mes projets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="a-propos.php">À propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php
            if (estConnecte()) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="connexion.php?action=deconnexion">Se déconnecter</a>
              </li>
            <?php } else {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="connexion.php">Se connecter</a>
              </li>
            <?php  } ?>
          </ul>
        </div>
        <!-- fin des liens -->

      </div><!-- fin du conteneur -->
    </nav><!-- fin de la navbar -->
  </header>
  <!-- fin du HEADER -->