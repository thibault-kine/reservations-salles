<?php
session_start();

if(!isset($_SESSION["id"]))
{
    $_login = $_SESSION["login"];
    $_mdp = $_SESSION["password"];

    $db = mysqli_connect("localhost", "root", "", "livreor");
    $query = "SELECT `id` FROM `utilisateurs` WHERE `login`='$_login' AND `password`='$_mdp'";
    $result = mysqli_query($db, $query, MYSQLI_ASSOC);
    $row = mysqli_fetch_assoc($result);

    $row["id"] = $_SESSION["id"];
}

include("header.php");
?>

<div id="profil">
    <div id="main-info">
        <h1>~ Modifiez votre profil ~</h1>
        
        <form method="post">
        <?php 
        echo('
            <input type="text" name="login" value="'.$_SESSION["login"].'" id="login"><br>
            <input type="password" name="p1" value="'.$_SESSION["password"].'" class="passwords"><br>
            <input type="password" name="p2" placeholder="confirmer mot de passe" class="passwords"><br>
            <input type="submit" value="Valider les changements" style="font-size: 20; width: 93%;">
            <input type="submit" value="Se déconnecter" id="logout-btn">
        </form>
        ');
        ?>
    </div>
</div>    

<?php

include("footer.php");

if($_POST != $_SESSION)
{
    if(isset($_SESSION["id"]))
    {
        $_id = $_SESSION["id"];
    }

    if(!isset($_POST["p1"]) && !isset($_POST["p2"]))
    {
        return;
    }

    if($_POST["p1"] == $_POST["p2"])
    {
        $_login = $_POST["login"];
        $_password = $_POST["p1"];

        $db = mysqli_connect("localhost", "root", "", "livreor");
        $query = "UPDATE `utilisateurs` SET `login`='$_login', `password`='$_password', `prenom`='$_name', `nom`='$_lastname' WHERE `id`='$_id'";
        $result = mysqli_query($db, $query, MYSQLI_ASSOC);
        $row = mysqli_fetch_assoc($result);
        header("Location: profil.php");

        if($_SESSION["login"] != $row["login"] || $_SESSION["password"] != $row["password"])
        {
            $query = "SELECT * FROM `utilisateurs` WHERE `id`='$_id'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);

            $_SESSION["login"] = $row["login"];
            $_SESSION["password"] = $row["password"];
        }
    }
}
?>