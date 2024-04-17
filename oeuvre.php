<?php

define('BASE_DIR', __DIR__);//Récupérer le chemin du répertoire courant
require_once BASE_DIR . '/includes/templates/header.php';
require_once BASE_DIR . '/includes/templates/oeuvres.php';


// Récupérer l'ID de l'oeuvre par l'URL
$oeuvre_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Vérifier si l'ID est valide
if ($oeuvre_id === false || $oeuvre_id === null || !isset($oeuvres[$oeuvre_id])) {
    header("Location: index.php"); // Redirection vers l'index en cas d'ID invalide
    exit;
} else {
    // Récupérer les informations de l'oeuvre depuis le tableau oeuvres.php pour prendre en compte le fait que les ID des oeuvres commencent à partir de 1 dans le tableau.
    $oeuvre = $oeuvres[$oeuvre_id-1];
}

?>

<main>

    <article id="detail-oeuvre">
        <?php if (isset($oeuvre)) { ?>
            <div id="img-oeuvre">
                <img src="assets/<?php echo $oeuvre['img']; ?>" alt="<?php echo $oeuvre['titre']; ?>">
            </div>
            <div id="contenu-oeuvre">
                <h1><?php echo $oeuvre['titre']; ?></h1>
                <p class="description"><?php echo $oeuvre['artiste']; ?></p>
                <p class="description-complete">
                    <?php echo $oeuvre['description']; ?>
                </p>
                <!-- <p>ID: <?php //echo htmlspecialchars($oeuvre['id']); ?></p> -->
            </div>
        <?php } ?>
    </article>

</main>

<?php
require_once BASE_DIR . '/includes/templates/footer.php';
?>