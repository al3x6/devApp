<?php
if(isset($_GET['error0'])){
    $err = "Tous les champs n'ont pas été saisis !";
}
if(isset($_GET['error1'])){
    $err = "Le nom d'utilisateur est trop long";
}
if(isset($_GET['error2'])){
    $err = "Ce nom d'utilisateur existe déjà";
}
if(isset($_GET['error3'])){
    $err = "Cet email n'est pas valide";
}
if(isset($_GET['error4'])){
    $err = "Cet email est déjà enregistré";
}
if(isset($_GET['error5'])){
    $err = "Vos mots de passe ne correspondent pas";
}
?>

<!Doctype html>
<html lang="fr">
<head>
    <title>SimFast - Inscription</title>
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
            <h3>S'INSCRIRE</h3>
            <form action="Insert.php" method="post">
                <div class="rectangle_blanc_content">
                    <input class="textfield" type="text" name="login" placeholder="Nom d'utilisateur" value="<?php if(isset($_POST['login'])){echo $_POST['login'];} ?>">
                    <br>
                    <input class="textfield" type="email" name="email" placeholder="Adresse email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                    <br>
                    <input class="textfield" type="password" name="mdp" placeholder="Mot de passe">
                    <br>
                    <input class="textfield" type="password" name="mdp_confirme" placeholder="Confirmation mot de passe">
                    <br>
                    <h3>Captcha</h3>
                    <img src="captcha.php" style="vertical-align: middle;"/>
                    <input name="captcha" type="text">
                    <br>
                    <input class="bouton_submit" type="submit" name="inscription" value="Valider">
                </div>
            </form>

            <div class="footer_rectangle_blanc">
                <a class="redirection" href="SimFast-Connexion.php">Se connecter</a>
                <p class="error"><?php if(isset($err)){echo $err;} ?></p>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'Footer.php'; ?>
    </footer>
</body>
</html>
