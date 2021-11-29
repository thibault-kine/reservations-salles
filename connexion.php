<?php
include("header.php");

if(!isset($_POST))
{
    return;
}
?>

<form action="profil.php" method="post" class="login-form">
    <h1>Connectez-vous :</h1>   
    <div class="field">
        <label for="login">Nom d'utilisateur :</label>
        <input type="text" name="login">
    </div>
    <div class="field">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password">
    </div>
    <input type="submit" class="btn">
    <a href="connexion.php" id="redirect">Vous n'avez pas encore de compte ?</a>
</form>

<?php
include("footer.php");
?>