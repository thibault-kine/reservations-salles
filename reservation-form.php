<?php
session_start();

if(empty($_SESSION))
{
    header("location: connexion.php");
}

include("header.php");
?>

<form action="" method="post" id="form">
    <h2>Réservez notre salle</h2>
    <div class="field">
        <label for="title">Titre : </label>
        <input type="text" name="title" id="titleform" required>
    </div>
    <div class="field">
        <label for="desc">Description : </label>
        <input type="text" name="desc" id="desc">
    </div>
    <div class="field" style="border-bottom: 3px solid rgba(255,255,255,0.4);">
        <label for="start">Début : </label>
        <div class="time">
            <input type="date" name="startD" required>
            <input type="time" name="startH" min="08:00" max="19:00" required>
        </div>
    </div>
    <div class="field">
        <label for="end">Fin : </label>
        <div class="time">
            <input type="date" name="endD" required>
            <input type="time" name="endH" min="08:00" max="19:00" required>
        </div>
    </div>
    <input type="submit" class="btn">
</form>

<?php

if(!empty($_POST)) // si le formulaire n'est pas vide
{
    $titre = $_POST["title"];
    $desc = $_POST["desc"];
    $start = $_POST["startD"]." ".$_POST["startH"];
    $end = $_POST["endD"]." ".$_POST["endH"];
    $userID = $_SESSION["id"];

    $database = mysqli_connect("localhost", "root", "", "reservationsalles");
    
    // vérification : il ne faut pas que plusieurs réservations soient le mm jour et la mm heure
    $selectQuery = "SELECT * FROM reservations WHERE debut AND fin
    BETWEEN '".$start."' AND '".$end."'";
    $result = mysqli_query($database, $selectQuery);
    $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(empty($fetch)) // si fetch n'est pas vide, une entrée correspond, on cherche l'inverse
    {
        $insertQuery = "INSERT INTO reservations(titre, description, debut, fin, id_utilisateur)
        VALUES ('$titre', '$desc', '$start', '$end', '$userID');";
        $result = mysqli_query($database, $insertQuery);

        $selectQuery = "SELECT * FROM reservations WHERE id_utilisateur='$userID'";
        $result = mysqli_query($database, $selectQuery);
        $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if(isset($fetch["id"]))
        {
            header("location: evenements.php?id=".$userID);
        }
        else
        {
            header("location: index.php");
        }
    }
    else
    {
        ErrMsg("La salle a déjà été réservée pour cette date et heure.");
    }
}

include("footer.php");
?>