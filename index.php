<?php
session_start();

include("header.php");
?>
        <div id="list">
            <h1>LeRéserveur.com</h1>
            <h2>Réservez vos salles pour :
                <ul>
                    <li>- des conférences 👔...</li>
                    <li>- des concerts 🎶...</li>
                    <li>- des évènements festifs 🎉...</li>
                    <li>- et plein d'autres choses !</li>
                </ul>
            </h2>
        </div>
        <div id="welcome">
            <?php
            if(!isset($_SESSION) || empty($_SESSION))
            {
                echo("
                    <h2>Vous n'avez pas de compte ?</h2>
                    <a href='inscription.php'>
                    <h1>Commencez par vous inscrire !</h1>
                    </a>
                ");
            }
            else
            {
                echo("
                    <a href='planning.php'><h1>Parcourez les salles à réserver ici.</h1></a>
                ");
            }
            ?>
        </div>

<?php
include("footer.php")
?>