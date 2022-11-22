<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Profile</title>
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

        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='SimFast-Accueil.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>
        <div class='modules_navigation'>
            <a href="SimFast-Accueil_utilisateur.php" title="Aller au menu">
                <img class="logo_miniature" src="Images/SimFast_logo.png" alt="SimFast_logo">
            </a>
            <nav>
                <ul>
                    <li><a href='SimFast-Module_Probabilite.php'>Calculateur de loi normale</a></li>
                    <li><a href='SimFast-Module_Conversion.php'>Convertisseur décimal, hexadécimal, binaire</a></li>
                    <li><a href='SimFast-Module_Amortissement.php'>Calcul d'amortissement</a></li>
                </ul>
            </nav>
        </div>
        <div class="rectangle_blanc">
            <h3>PROFIL</h3>
            <div class="rectangle_blanc_content">
                <input class="textfield" type="text" name="login" placeholder="Nom d'utilisateur">
                <br>
                <input class="textfield" type="text" name="login" placeholder="Adresse email">
                <br>
                <input class="textfield" type="password" name="mdp" placeholder="Mot de passe">
                <a class="crayon" href="SimFast-Changer_mdp.php" title="Changer de mot de passe">
                    ✏️
                </a>
            </div>
        </div>
    </div>
    <footer>
        © 2022 - SimFast - TOUS DROITS RÉSERVÉS - PHOTOS NON CONTRACTUELLES - ALL RIGHTS RESERVED.
    </footer>

</body>


</html>
