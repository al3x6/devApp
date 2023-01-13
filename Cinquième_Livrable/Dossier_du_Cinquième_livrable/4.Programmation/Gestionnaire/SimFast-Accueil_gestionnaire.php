<?php session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin' ){
?>

<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Accueil Gestionnaire</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Antoine Bazire">
    <!-- Nom de l'auteur du site -->
    <link rel="shortcut icon" href="../Images/SimFast_logo.png" type="image/x-icon">
    <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
    <link rel="stylesheet" href="../Css/style.css">

</head>

<body>
    <div class="contenu">
        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='../Serveur/deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='modules_navigation'>
            <?php include 'serveur/menu-gestionnaire.php'; ?>
        </div>

        <div class='logo'>
            <img src="../Images/SimFast_logo.png" alt="SimFast_logo">
        </div>
        <div class='texte_description_site'>
            <h3>Bienvenue Gestionnaire!</h3>
            <h4>Vous pouvez gérer les utilisateurs dans l'onglet "Utilisateurs" ainsi que visionner des statistiques recueillies sur les différents modules dans l'onglet "Statistiques".</h4>
        </div>
    </div>

    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>
</body>

</html>

<?php }
else{
    header('Location: ../index.php');
}