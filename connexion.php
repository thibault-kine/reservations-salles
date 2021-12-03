<?php 
session_start();
$canConnect = false; 

include("header.php");
?>

    <div id="welcome">
        <h1>Connectez-vous pour réserver une salle</h1>
    </div>
    <div id="connexion">

    <h1>Connexion :</h1>
    <?php
    if(!$canConnect)
    {
        echo "<form action=\"\" method=\"post\">";
        if(!empty($_POST))
        {
            echo "<p>Login ou mot de passe incorrects</p>";
        }
    }
    elseif($_SESSION["id"] == 1 && $_SESSION["login"] == "admin")
    {
        echo "<form action='admin.php' method='post>";
    }
    else
    {
        echo "<form action=\"profil.php\" method=\"post\">";
    }
    ?>
        <div class="field">
        <label for="login">Nom d'utilisateur :</label>
        <input type="text" name="login"><br>
        </div>
        <div class="field">
        <label for="password">Mot de passe :</label>
        <input type="password" name="p1"><br>
        </div>

        <?php
        if(!empty($_POST)) // si $_POST n'est pas vide
        {
            checkLogin($_POST["login"], $_POST["p1"]);
        }
        ?>
            
        <input type="submit" value="Je me connecte !" class="btn">
    </form>
    </div>

<?php
include("footer.php");

function checkLogin(string $_login, string $_password)
{
    if($_login != "" && $_password != "") // si les champs entrés ne sont pas vides
    {
        $db = mysqli_connect("localhost", "root", "", "reservationsalles");

        $query = "SELECT `login`, `password` FROM `utilisateurs` WHERE '$_login'=`login` AND '$_password'=`password`";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1) // si exactement une entrée correspond
        {
            $query = "SELECT * FROM `utilisateurs` WHERE '$_login'=`login` AND '$_password'=`password`";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);

            $_SESSION["login"] = $row["login"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["id"] = $row["id"];

            header("location:profil.php");
        }
    }
}
?>