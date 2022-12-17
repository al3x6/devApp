<?php
if(isset($_GET["success"])){
    $success = "Votre compte a bien été crée";
}

if(isset($_GET["error0"])){
$err = "Veuillez remplir tous les champs";
}

if(isset($_GET["error1"])){
$err = "Nom d'utilisateur / Mot de passe incorrect";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SimFast - Connexion</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Antoine Bazire">
    <!-- Nom de l'auteur du site -->
    <link rel="shortcut icon" href="Images/SimFast_logo.png" type="image/x-icon">
    <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contenu">

        <div class="logo">
            <a href="SimFast-Accueil.php" title="Aller au menu">
                <img src="Images/SimFast_logo.png" alt="SimFast_logo">
            </a>
        </div>

        <div class="rectangle_blanc">
            <h3>SE CONNECTER</h3>
            <form action="Connection.php" method="post">
                <div class="rectangle_blanc_content">
                    <input class="textfield" type="text" name="login" placeholder="Nom d'utilisateur / Adresse email" value="<?php if(isset($_POST['login'])){echo $_POST['login'];} ?>">
                    <br>
                    <input class="textfield" type="password" name="mdp" placeholder="Mot de passe">
                    <br>
                    <input class="bouton_submit" type="submit" name="connexion" value="Valider">
                </div>
            </form>

            <div class="footer_rectangle_blanc">
                <a class="redirection" href="SimFast-Inscription.php">Créer un compte</a>
                <br>
                <a class="lien_mdp_oublie redirection" href="SimFast-Mdp_oublie.php">Mot de passe oublié ?</a>
                <p class="success"> <?php if(isset($success)){echo $success;} ?></p>
                <p class="error"> <?php if(isset($err)){echo $err;} ?></p>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'Footer.php'; ?>
    </footer>
</body>
</html>
