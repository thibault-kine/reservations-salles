<html>
<head>
    <title>LeRéserveur.com</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <a href="index.php"><h1>LeRéserveur.com</h1></a>
    <div id="header-links">
        <?php
        if(empty($_SESSION))
        {
            echo "
            <a href='inscription.php'>Inscription</a>
            <a href='connexion.php'>Connexion</a>
            ";
        }
        elseif(!empty($_SESSION))
        {
            echo "
            <a href='profil.php'>Profil</a>
            <a href='planning.php'>Planning des salles</a>
            ";
        }
        ?>
    </div> 
</header>