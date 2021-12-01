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
            echo "<a href='planning.php'>Planning</a>";
            echo "<a href='profil.php'>Profil</a>";
        }
        ?>
    </div>
</header>
<main>