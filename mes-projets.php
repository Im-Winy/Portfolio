<?php
/* HEADER */
require 'assets/inc/header.inc.php';
?>

<!-- MAIN -->
<main>
    <div class="container">

        <section class="block-title">
            <div>
                <h2>Mes projets</h2>
                <hr>
            </div>
        </section>

        <section class="block-info w-75 m-auto">

            <?php if (estConnecte()) { ?>
                <a href="nouveau-projet.php" class="btn btn-dark mb-3">créer un nouveau projet</a>
            <?php } ?>

            <div class="row">
                <?php
                $requete = $pdoPortfolio->query("SELECT * FROM projets ORDER BY id_projet DESC");
                while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="col-12 mx-auto mb-3">
                        <div class="card">
                            <div class="card-title">
                                <!-- titre -->
                                <h3 class="text-center"><?php echo $ligne['titre']; ?></h3>
                                <!-- image -->
                                <img src='<?php echo $ligne['image']; ?>' alt='...'>
                            </div>
                            <div class="card-body">
                                <!-- description -->
                                <p><?php echo $ligne['description']; ?></p>
                                <!-- lien -->
                                <a href="<?php echo $ligne['lien']; ?>" class="text-primary"><?php echo $ligne['lien']; ?></a>
                                <!-- bouton de redirection vers la page de mis à jour -->
                                <?php if (estConnecte()) { ?>
                                    <div class="btn">
                                        <a href="mis-a-jour.php?id_projet=<?php echo "$ligne[id_projet]"; ?>" class="btn btn-dark">Mettre à jour</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </section>

    </div>
</main>
<!-- fin du MAIN -->

<?php
/* FOOTER */
require 'assets/inc/footer.inc.php';
?>