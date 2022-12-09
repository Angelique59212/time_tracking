<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Time Tracking</title>
</head>
<body>

<header>
    <h1>Time Tracking</h1>
</header>
<div id="container">
    <div id="login"><?php
        if (!isset($_SESSION['user'])) { ?>
            <a href="/?c=home">Accueil</a>
            <a href="/?c=user&a=login">Connexion</a>
            <a href="/?c=user&a=register">Inscription</a><?php
        }
        else { ?>
        <a href="/?c=home">Accueil</a>
        <a href="/?c=user&a=disconnect">Déconnexion</a><?php
        }?>
    </div>

</div>

<main><?= $html ?></main>

<script src="https://kit.fontawesome.com/9fe3f13f0a.js" crossorigin="anonymous"></script>
<script src="/build/js/front-bundle.js"></script>
</body>
</html>
