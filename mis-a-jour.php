<?php
/* HEADER */
require 'assets/inc/header.inc.php';

/*  Réception des informations du projet sélectionné par son id */
if (isset($_GET['id_projet'])) {
    $info = $pdoPortfolio->prepare("SELECT * FROM projets WHERE id_projet = :id_projet");
    $info->execute([
        ':id_projet' => $_GET['id_projet'],
    ]);
    if ($info->rowCount() == 0) {
        header('location:mes-projets.php');
        exit();
    }
    $ligne = $info->fetch(PDO::FETCH_ASSOC);
} else { // si pas d'id_articles dans l'url
    header('location:mes-projets.php');
    exit();
}

/* Traitement du formulaire */
if (!empty($_POST['update'])) {

    $maj = $pdoPortfolio->prepare("UPDATE projets SET titre =:titre, image =:image, description =:description, lien =:lien WHERE id_projet =:id_projet");

    $maj->execute([
        ":titre" => $_POST['titre'],
        ":image" => $_POST['image'],
        ":description" => $_POST['description'],
        ":lien" => $_POST['lien'],
        ":id_projet" => $_GET['id_projet'],
    ]);

    $message = "<p class=\"alert alert-success\">Le formulaire a bien été mis à jour</p>";
}

?>

<!-- MAIN -->
<main>
    <div class="container">

        <section class="block-title">
            <div>
                <h2>Mis à jour</h2>
                <hr>
            </div>
        </section>

        <section class="block-info w-75 m-auto">
            <?php echo $message; ?>
            <form action="#" method="post" class="form-control">

                <div class="circle">
                    <i class="bi bi-arrow-repeat"></i>
                </div>

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" name="titre" id="titre" value="<?php echo $ligne['titre']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" name="image" id="image" value="<?php echo $ligne['image']; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" value="<?php echo $ligne['description']; ?>" cols="5" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="lien" class="form-label">Lien</label>
                    <input type="text" name="lien" id="lien" value="<?php echo $ligne['lien']; ?>" class="form-control">
                </div>

                <input type="submit" value="Mettre à jour" class="btn btn-dark mb-3" name="update">
            </form>
        </section>
    </div>
</main>

<?php
/* FOOTER */
require 'assets/inc/footer.inc.php';
?>