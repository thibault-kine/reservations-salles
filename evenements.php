<?php
session_start();

if(empty($_SESSION))
{
    header("location: connexion.php");
}

include("header.php");

if(empty($_GET["id"]))
{
    Display404();
}
elseif($_GET["id"] != $_SESSION["id"])
{
    header("location: evenements.php?id=".$_SESSION["id"]);
}
else
{
    echo "<h1 style='text-align: center;'>Vos évènements :</h1>";

    $userID = $_GET["id"];
    $database = mysqli_connect("localhost", "root", "", "reservationsalles");
    $selectQuery = "SELECT * FROM reservations WHERE id_utilisateur='$userID'";
    $result = mysqli_query($database, $selectQuery);
    $fetch = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo "
    <style>
        .event
        {
            background-color: crimson;
            border: 10px solid rgba(255,255,255,0.4);
            width: 30%;
            margin: auto;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .subtext
        {
            color: rgba(255,255,255,0.5);
            font-size: 14;
            margin-top: 10px;
        }
    </style>
    ";

    foreach($fetch as $f)
    {
        echo "
        <div class='event'>
            <p class='subtext'>Titre :</p>
            <h1>".$f["titre"]."</h1>
            <p class='subtext'>Description :</p>
            <h3>".$f["description"]."</h3>
            <p class='subtext'>Début :</p>
            <p>".$f["debut"]."</p>
            <p class='subtext'>Fin :</p>
            <p>".$f["fin"]."</p>
        </div>
        ";
    }
}

include("footer.php");
?>