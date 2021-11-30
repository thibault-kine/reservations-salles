<?php
session_start();

$canRegister = false;

include("header.php");
?>
    <div id="welcome">
        <h1>~ Inscrivez-vous afin d'écrire sur Golden Book ~</h1>
    </div>
    <div id="inscription">

    <h1>Inscription :</h1>
    <?php
    if(!$canRegister)
    {
        echo("<form action=\"\" method=\"post\">");
    }
    else
    {
        echo("<form action=\"connexion.php\" method=\"post\">");
    }
    ?>
        <div class="field">
        <label for="login">Nom d'utilisateur : </label>
        <input type="text" name="login"><br>
        </div>
        <div class="field">
        <label for="password">Mot de passe : </label>
        <input type="password" name="p1"><br>
        </div>  
        <div class="field">
        <label for="password">Confirmation du mot de passe : </label>
        <input type="password" name="p2"><br>
        </div>
        
        <?php
        if($_POST != null)
        {
            if($_POST["login"] != "" && $_POST["p1"] != "" && $_POST["p2"] != "")
            {
                if($_POST["p1"] == $_POST["p2"])
                {
                    $canRegister = true;
                }
            }
        }
        ?>

        <input type="submit" value="Je m'inscris !" class="btn">
        <br>
        <a href="connexion.php" style="font-family: Arial; font-size: 16;">Vous avez déjà un compte ? Connectez-vous ici.</a>
    </form>

    </div>

<?php
include("footer.php");

if($canRegister)
{
    $_login = $_POST["login"];
    $_password = $_POST["p1"];

    $_SESSION["login"] = $_login;
    $_SESSION["password"] = $_password;

    $bdd = mysqli_connect("localhost", "root", "", "livreor");

    $query = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ('$_login', '$_password');";

    $inscription = mysqli_query($bdd, $query);

    header("location:connexion.php");
}
?>