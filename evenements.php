<?php
session_start();

if(empty($_SESSION))
{
    header("location: connexion.php");
}

include("header.php");

// TODO: pourquoi quand tu rajoutes un "/" a la fin de l'url ça marche plus ? et pourquoi quand tu mets un "?id=X" le css ne s'applique plus ???
if(empty($_GET["id"]))
{
    Display404();
}
else
{
    $eventID = $_GET["id"];
    $database = mysqli_connect("localhost", "root", "", "reservationsalles");
    $selectQuery = "SELECT * FROM reservations WHERE id='".$eventID."'";
    $result = mysqli_query($database, $selectQuery);
    $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

    var_dump($fetch);
}

include("footer.php");
?>