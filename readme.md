# Projet OC TheArtBox - Support personnel aide-mémoire Mentorat

Exercice basique en PHP pour afficher une liste d'œuvres et la page individuelle de chaque œuvre.

Étapes clés

## Désencombrer le dossier principal

```
assets
    css
    img
includes
    templates
        footer.php
        header.php
        oeuvres.php
index.php
oeuvre.php
```

## Inclusion du header et footer maintenables

Un bloc de gestion des erreurs pour vérifier si le fichier header et footer existe et peut être inclus correctement. 

```
<?php
define('BASE_DIR', __DIR__);//Récupérer le chemin du répertoire courant
require_once BASE_DIR . '/includes/templates/header.php';
require_once BASE_DIR . '/includes/templates/oeuvres.php';
?>
```

```
<?php
require_once BASE_DIR . '/includes/templates/footer.php';
?>
```

## Changer le titre de la page de façon dynamique (OPTIONNEL)

```
<?php
$title = "The ArtBox"; // Titre par défaut
// Vérifier le nom de la page
if (basename($_SERVER['SCRIPT_NAME']) == "accueil.php") {
  $title = "The ArtBox - Accueil";
} elseif (basename($_SERVER['SCRIPT_NAME']) == "oeuvre.php") {
  $title = "The ArtBox - Œuvre";
}else{
  $title = "The ArtBox - Erreur";
}
?>
```
```
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
```


## Boucle des oeuvres

```
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
```

## Tableau multidimensionnel dans oeuvres.php

```
// Tableau multidimensionnel contenant les informations sur les œuvres
// On commence par 1 pour éviter l'url avec id==0
$oeuvres = [
    [
        'id' => 1,
        'img' => 'img/clark-van-der-beken.png',
        'titre' => 'Dodomu',
        'artiste' => 'Mia Tozerski',
        'description' => 'Mia Tozerski est une artiste peintre ukrainienne réfugiée de la guerre. Sur cette œuvre, Dodomu ("domicile" en ukrainien], elle nous montre la tristesse du peuple ukrainien qu\'elle partage, ayant elle-même dû quitter son foyer. L\'œuvre évoque le drapeau liquéfié d\'une Ukraine en souffrance, pleurant la mort de ses compatriotes. Ce travail chargé d\'émotion est le symbole d\'un événement qui marquera l\'Histoire. Cette peinture à l\'acrylique rayonne grâce à son fond lisse et ses mélanges de couleurs éclatantes.',
    ],
```

Multidimensionnel : cela signifie qu'il s'agit d'un tableau contenant d'autres tableaux à l'intérieur.

Chaque élément du tableau principal $oeuvres est un tableau associatif contenant des données spécifiques à une œuvre d'art. 

Ainsi, chaque élément du tableau principal est lui-même un ensemble de données associées à une œuvre, ce qui en fait un tableau multidimensionnel. 

Chaque tableau interne contient des clés associatives telles que 'id', 'img', 'titre', 'artiste', etc., qui représentent les propriétés de chaque œuvre.



## Ajout du lien dynamique pour chaque oeuvre

```
<a href="oeuvre.php?id=<?php echo $oeuvre['id']; ?>">
```


## Dans la page oeuvre.php récupérer l'ID de l'oeuvre par l'URL

```
//Récupérer l'ID de l'oeuvre par l'URL
$oeuvre_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

filter_input pour des raisons dee sécurité vérifier qu'il s'agit d'un entier

```

## Contrôler si l'ID est valide puis récupérer l'ID de l'oeuvre par l'URL en évitant les erreurs potentielles

```
//Vérifier si l'ID est valide
if ($oeuvre_id === false || $oeuvre_id === null || !isset($oeuvres[$oeuvre_id - 1])) {
    //echo 'Erreur: ID invalide.';
    header("Location: index.php");
    exit;
} else {
    //Récupérer les informations de l'oeuvre depuis le tableau oeuvres.php variable $oeuvres
    $oeuvre = $oeuvres[$oeuvre_id - 1];
}
```


## Dans la page oeuvre.php affichage des données pour l'oeuvre

```

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
```

La vérification isset($oeuvre) permet de s'assurer que la variable $oeuvre  est définie avant d'essayer d'afficher ses détails. 

Cela évite les erreurs dans le cas où l'ID n'est pas valide et où la variable $oeuvre n'est pas initialisée.

C'est une mesure de sécurité pour éviter les erreurs potentielles lorsque vous essayez d'accéder à une variable qui pourrait ne pas être définie.