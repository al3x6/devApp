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

        <div class='logo'>
            <img src="Images/SimFast_logo.png" alt="SimFast_logo">
        </div>
        <div class="rectangle_blanc">
            <h3>SE CONNECTER</h3>
            <form action="SimFast-Accueil_utilisateur.php" method="post">
                <div class="rectangle_blanc_content">
                    <input class="textfield" type="text" name="login" placeholder="Nom d'utilisateur / Adresse email">
                    <br>
                    <input class="textfield" type="password" name="mdp" placeholder="Mot de passe">
                    <br>
                    <input class="bouton_submit" type="submit" name="Valider" value="Valider">
                </div>
            </form>
            <div class="footer_rectangle_blanc">
                <a class="redirection" href="SimFast-Inscription.php">Créer un compte</a>
                <br>
                <a class="lien_mdp_oublie" href="SimFast-Mdp_oublie.php">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>
    <footer>
        © 2022 - SimFast - TOUS DROITS RÉSERVÉS - PHOTOS NON CONTRACTUELLES - ALL RIGHTS RESERVED.
    </footer>
</body>

</html>
