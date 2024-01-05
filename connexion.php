<?php
/* HEADER */
require 'assets/inc/header.inc.php';

/* traitement du formulaire de connexion */
if (!empty($_POST["connexion"])) {
    if (empty($_POST['pseudo']) || empty($_POST['mdp'])) {
        echo '<div class="alert alert-danger">Le pseudo et le mot de passse sont requis</div>';
    } else {
        $verifPseudo = $pdoPortfolio->prepare("SELECT * FROM membres WHERE pseudo = :pseudo");
        /* Je vérifie si le pseudo entré par l'utilisateur correspond à un pseudo dans ma BDD */

        $verifPseudo->execute([
            ":pseudo" => $_POST['pseudo'],
        ]);

        if ($verifPseudo->rowCount() == 1) {
            $membre = $verifPseudo->fetch(PDO::FETCH_ASSOC); /* je récupère les infos de la personne dont le pseudo a été donné */

            if ($_POST['mdp'] == $membre['mdp']) {
                /* je vérifie si le mot de passe inscrit dans le formulaire correspond à celui inscrit dans la BDD */

                $_SESSION['membres'] = $membre; /* j'assigne les informations de l'utilisateur qui se connecte que j'ai récupéré ici grâce à $_SESSION qui comme toute les super globales va créer un tableau multidimensionnel qui contient les informations */
                header('location:index.php');

                exit();
            } else {
                $message = '<p class="alert alert-danger">Mot de passe incorrect !</p>';
            }
        } else {
            $message = '<p class="alert alert-danger">Pseudo incorrect !</p>';
        }
    }
}
?>

<!-- MAIN -->
<main>
    <div class="container">

        <section class="block-title">
            <div>
                <h2>Connexion</h2>
                <hr>
            </div>
        </section>

        <section class="block-info w-75 m-auto">
            <?php echo $message; ?>
            <form action="#" method="post" class="form-control">

                <div class="circle">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="mb-3">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="form-control">
                </div>

                <input type="submit" value="Se connecter" class="btn btn-dark mb-3" name="connexion">
            </form>
        </section>
    </div>
</main>
<!-- fin du MAIN -->

<?php
/* FOOTER */
require 'assets/inc/footer.inc.php';
?>