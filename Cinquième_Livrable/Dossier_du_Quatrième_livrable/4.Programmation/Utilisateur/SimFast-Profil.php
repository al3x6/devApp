<?php session_start(); ?>


<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Profile</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Antoine Bazire">
    <!-- Nom de l'auteur du site -->
    <link rel="shortcut icon" href="../Images/SimFast_logo.png" type="image/x-icon">
    <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <div class="contenu">

        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='../deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='modules_navigation'>
            <?php include 'Menu-Utilisateur.php'; ?>
        </div>

        <div class="rectangle_blanc">
            <h3>PROFIL</h3>
            <div class="rectangle_blanc_content">
                <input class="textfield unmodifiable" type="text" name="login" placeholder="<?= $_SESSION["login"] ?>">
                <br>
                <input class="textfield unmodifiable" type="text" name="login" placeholder="<?= $_SESSION["email"] ?>">
                <br>
                <input class="textfield unmodifiable" type="password" name="mdp" placeholder="Mot de passe">
                <a class="crayon" href="SimFast-Changer_mdp.php" title="Changer de mot de passe">
                    ✏️
                </a>
            </div>
        </div>
    </div>

    <footer>
        <?php include '../Footer.php'; ?>
    </footer>

</body>


</html>
