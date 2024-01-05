<?php
/* HEADER */
require 'assets/inc/header.inc.php';

/* Traitement du formulaire */
if (!empty($_POST["new-project"])) {
    $requete = $pdoPortfolio->prepare("INSERT INTO projets (titre, image, description, lien) VALUES (:titre, :image, :description, :lien)");

    $requete->execute([
        ":titre" => $_POST["titre"],
        ":image" => $_POST["image"],
        ":description" => $_POST["description"],
        ":lien" => $_POST["lien"],
    ]);
}

?>

<!-- MAIN -->
<main>
    <div class="container">
        <section class="block-title">
            <div>
                <h2>Création d'un nouveau projet</h2>
                <hr>
            </div>
        </section>

        <section class="block-info w-75 m-auto">
            <form action="#" method="post" class="form-control">

                <div class="circle">
                    <i class="bi bi-arrow-down-circle"></i>
                </div>

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="lien" class="form-label">Lien</label>
                    <input type="text" name="lien" id="lien" class="form-control">
                </div>

                <input type="submit" value="Ajouter" class="btn btn-dark mb-3" name="new-project">

            </form>
        </section>
    </div>
</main>
<!-- fin du MAIN -->

<?php
/* FOOTER */
require 'assets/inc/footer.inc.php';
?>