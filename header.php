<?php
function ErrMsg($_str)
{
    echo "<p style='color: red; font-size: 20; text-align: center;'>".$_str."</p>";
}

function Display404()
{
    echo "
    <div class='err404' style='display: flex; flex-direction: column; justify-content: center; width: fit-content; margin: auto;'>
        <img src='img/404.png' style='width: 100%; image-rendering: pixelated;'>
        <h1 style='color: grey; padding-top: 20px;'>Désolé, cette page n'existe pas</h1>
    </div>
    ";
}
?>

<html>
    <head>
        <title>LeRéserveur.com</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
        <link href="fonts.css" rel="stylesheet">
        <link href="calendrier.css" rel="stylesheet">
    </head>

<body>

<header>
    <a href="index.php">
        <h1>LeRéserveur.com</h1>
    </a>
    <div id="links">
        <?php
        if(empty($_SESSION))
        {
            echo "<a href='inscription.php'>Inscription</a>";
            echo "<a href='connexion.php'>Connexion</a>";
        }
        else
        {
            echo "<a href='evenements.php'>Evènements</a>";
            echo "<a href='planning.php'>Planning</a>";
            echo "<a href='profil.php'>Profil</a>";
        }
        ?>
    </div>
</header>
<main>