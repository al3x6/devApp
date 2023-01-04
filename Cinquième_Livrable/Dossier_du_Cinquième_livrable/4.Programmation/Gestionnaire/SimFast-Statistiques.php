<?php session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin' ){
?>


<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Statistiques</title>
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
                    <li><a href='../deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='modules_navigation'>
            <?php include 'Menu-Gestionnaire.php'; ?>
        </div>

        <div class="Titre_module">
            <h3>Statistiques</h3>
        </div>
        <div class="Statistiques_content">
            <div class="Statistiques_graphe">
                <textarea class="stats_visite_graphe" name="stats_visite_graphe"></textarea>
                <textarea class="stats_modules_graphe" name="stats_modules_graphe"></textarea>
            </div>

            <div class="Statistiques_p">
                <p>Statistiques des visites</p>
                <p>Statistiques des modules utilisés</p>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
</body>

</html>
<?php }
else{
    header('Location: ../SimFast-Accueil.php');
}