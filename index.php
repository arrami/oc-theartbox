<?php
define('BASE_DIR', __DIR__);//Récupérer le chemin du répertoire courant
require_once BASE_DIR . '/includes/templates/header.php';
require_once BASE_DIR . '/includes/templates/oeuvres.php';
?>

<main>
    <div id="liste-oeuvres">
        <?php foreach ($oeuvres as $oeuvre) { ?>
            <article class="oeuvre">
                <a href="oeuvre.php?id=<?php echo $oeuvre['id']; ?>">
                    <img src="./assets/<?php echo $oeuvre['img']; ?>" alt="<?php echo $oeuvre['titre']; ?>">
                    <h2><?php echo $oeuvre['titre']; ?></h2>
                    <p class="description"><?php echo $oeuvre['artiste']; ?></p>
                </a>
            </article>
        <?php } ?>      
        </div>
</main>

<?php
require_once BASE_DIR . '/includes/templates/footer.php';
?>