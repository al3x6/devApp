<?php
session_start();
if(isset($_GET["success"])){
    $success = "Votre compte a bien été crée";
}

if(isset($_GET["error0"])){
    $err = "Veuillez remplir tous les champs";
}

if(isset($_GET["error1"])){
    $err = "Nom d'utilisateur / Mot de passe incorrect";
    if(isset($_SESSION["login_incorrect"]) && isset($_SESSION["mdp_incorrect"])){
        $login_incorrect = $_SESSION['login_incorrect'];
        $mdp_incorrect = $_SESSION['mdp_incorrect'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $failed_login_log = 'Administrateur/log/echecs_connexion.log';
        $log_file = fopen($failed_login_log, "a") or die("Impossible d'ouvrir le fichier");
        fwrite($log_file, $login_incorrect. " " . $mdp_incorrect. " " . $ip . " ". date("Y-m-d H:i:s") . "\n");
        fclose($log_file);
    }
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
    <link rel="stylesheet" href="Css/style.css">
</head>

<body>
    <div class="contenu">

        <div class="logo">
            <a href="index.php" title="Aller au menu">
                <img src="Images/SimFast_logo.png" alt="SimFast_logo">
            </a>
        </div>

        <div class="rectangle_blanc">
            <h3>SE CONNECTER</h3>
            <form action="Serveur/connection.php" method="post">
                <div class="rectangle_blanc_content">
                    <label for="Nom d'utilisateur"> Nom d'utilisateur</label>
                    <input class="textfield" type="text" id="Nom d'utilisateur" name="login" placeholder="Nom d'utilisateur / Adresse email" value="<?php if(isset($_POST['login'])){echo $_POST['login'];} ?>">
                    <br>
                    <label for="Mot de passe"> Mot de passe</label>
                    <input class="textfield" id="Mot de passe" type="password" name="mdp" placeholder="Mot de passe">
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
    <?php include 'Serveur/footer.php'; ?>
</footer>
</body>
</html>
