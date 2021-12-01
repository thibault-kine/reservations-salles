<?php
session_start();

if(empty($_SESSION))
{
    header("location: connexion.php");
}

include("header.php");

$jours = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];

echo "<h2 id='title'>Réservez notre salle</h2>";

echo "<table id='calendrier'>";
echo "<tr>";
for($j = 0; $j < sizeof($jours); $j++) // boucle for des jours
{
    echo "<th>".$jours[$j]."</th>";

    for($h = 8; $h <= 19; $h++) // horaires : de 8h à 19h
    {
        echo "<td>".$h."h</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<div id="reservation-links">
    <a href="reservation-form.php">Réservez notre salle</a>
    <h2>ou</h2>
    <a href="reservation.php">Regardez quelles horaires sont déjà réservées</a>
</div>

<?php
include("footer.php");
?>
