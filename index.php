<?php
/* HEADER */
require 'assets/inc/header.inc.php';
?>

<!-- MAIN -->
<main>
    <div class="container">

        <section class="block-title">
            <div>
                <h2>Accueil</h2>
                <hr>
            </div>
        </section>

        <section class="block-info w-75 m-auto">
            <?php $card = $pdoPortfolio->query("SELECT * FROM projets ORDER BY id_projet DESC LIMIT 3"); ?>
            <div class='row'>
                <?php
                while ($info = $card->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-title">
                                <!-- titre -->
                                <h3 class="text-center"><?php echo $info['titre']; ?></h3>
                                <!-- image -->
                                <img src='<?php echo $info['image']; ?>' alt='...'>
                            </div>
                            <div class="card-body">
                                <!-- description -->
                                <p><?php echo substr($info['description'], 0, 100); ?>[Voir plus...]</p>
                                <!-- lien -->
                                <a href="<?php echo $info['lien']; ?>" class="text-primary"><?php echo $info['lien']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</main>
<!-- fin du MAIN -->

<?php
/* FOOTER */
require 'assets/inc/footer.inc.php';
?>