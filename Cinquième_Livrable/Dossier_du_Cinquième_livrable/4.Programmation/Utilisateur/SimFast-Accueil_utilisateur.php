<?php session_start();
    if(isset($_SESSION['login'])){
?>


<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Accueil Utilisateur</title>
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

        <div class='logo'>
            <img src="../Images/SimFast_logo.png" alt="SimFast_logo">
        </div>

        <div class='texte_description_site'>
            <h3>Bienvenue <?php if(isset($_SESSION["login"])){ echo $_SESSION["login"];} ?> !</h3>
            <h4>Vous pouvez utiliser les modules disponibles sur Simfast à volonté.</h4>
        </div>
    </div>

    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
</body>

</html>
    <?php }
    else{
        header('Location: ../SimFast-Accueil_utilisateur.php');
    }