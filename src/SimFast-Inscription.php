<?php

//Liste de toutes les conditions non respectées. Si l'utilisateur ne remplit pas toute les conditions, on récupère une erreur depuis l'url, et on l'affiche sur la page
if (isset($_GET['error0'])) {
    $err = "Tous les champs n'ont pas été saisis !";
}
if (isset($_GET['error01'])) {
    $err = "captcha fausse";
}
if (isset($_GET['error1'])) {
    $err = "Le nom d'utilisateur est trop long";
}
if (isset($_GET['error2'])) {
    $err = "Ce nom d'utilisateur existe déjà";
}
if (isset($_GET['error3'])) {
    $err = "Cet email n'est pas valide";
}
if (isset($_GET['error4'])) {
    $err = "Cet email est déjà enregistré";
}
if (isset($_GET['error5'])) {
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
        <h3>S'INSCRIRE</h3>
        <form action="Serveur/insert.php" method="post">
            <div class="rectangle_blanc_content">
                <label for="Nom d'utilisateur">Nom d'utilisateur</label>
                <input class="textfield" id="Nom d'utilisateur" type="text" name="login" placeholder="Nom d'utilisateur"
                       value="<?php if(isset($_POST['login'])) {
                           echo $_POST['login'];
                       } ?>">
                <br>
                <label for="Adresse email">Adresse email</label>
                <input class="textfield" id="Adresse email" type="email" name="email" placeholder="Adresse email"
                       value="<?php if(isset($_POST['email'])) {
                           echo $_POST['email'];
                       } ?>">
                <br>
                <label for="Mot de passe">Mot de passe</label>
                <input class="textfield" id="Mot de passe" type="password" name="mdp" placeholder="Mot de passe">
                <br>
                <label for="Mot de passe à confirmer">Mot de passe à confirmer</label>
                <input class="textfield" id="Mot de passe à confirmer" type="password" name="mdp_confirme" placeholder="Confirmation mot de passe">
                <br>
                <h3>Captcha</h3>
                <?php
                $prem = rand(0, 10);
                $deux = rand(0, 10);
                echo " Combien font : " . $prem . " X " . $deux;
                $resultat = $prem * $deux;
                ?>

                <input type="hidden" name="resultat" value="<?php echo $resultat;?>"/>
                <br>
                <label for="Resultat">Resultat</label>
                <input class="textfield" id="Resultat" name="captcha" type="text" placeholder="Resultat">
                <br>
                <input class="bouton_submit" type="submit" name="inscription" value="Valider">
            </div>
        </form>

        <div class="footer_rectangle_blanc">
            <a class="redirection" href="SimFast-Connexion.php">Se connecter</a>
            <p class="error"><?php if (isset($err))echo $err;?></p>
        </div>
    </div>
</div>

<footer>
    <?php include 'Serveur/footer.php'; ?>
</footer>
</body>
</html>
