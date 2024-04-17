<?php

// Définir le code d'état HTTP 404
header('HTTP/1.0 404 Not Found');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page introuvable</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>Oups ! Cette page n'existe pas.</h1>

    <p>Nous sommes désolés, mais la page que vous recherchez n'a pas pu être trouvée. Veuillez vérifier l'URL et réessayer, ou revenir à la page d'accueil.</p>

    <a href="/">Retour à la page d'accueil</a>
</body>
</html>