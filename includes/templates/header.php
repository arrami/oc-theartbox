<?php
$title = "The ArtBox"; // Titre par défaut
// Vérifier le nom de la page
if (basename($_SERVER['SCRIPT_NAME']) == "index.php") {
  $title = "The ArtBox - Accueil";
} elseif (basename($_SERVER['SCRIPT_NAME']) == "oeuvre.php") {
  $title = "The ArtBox - Œuvre";
}else{
  $title = "The ArtBox - Erreur";
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?php echo $title ?></title>
</head>
<body>
    <header>
        <a href="index.php"><img src="/assets/img/logo.png" alt="Logo Artbox" id="logo"></a>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>