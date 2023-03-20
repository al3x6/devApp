<?php
session_start();
include 'Config/database.php';
global $db;

if (isset($_SESSION['login'])) {
//    Empêche les utilisateurs déjà connecter de pénétrer dans l'accueil
    if ($_SESSION['login'] == 'admin')
        header("Location: Gestionnaire/SimFast-Accueil_gestionnaire.php");
    else
        header("Location: Utilisateur/SimFast-Accueil_utilisateur.php");
} else {
//    Va incrémenter le nombre de visiteurs du site dans la base de données
    $incremente_nbr_visiteurs = $db->prepare("INSERT INTO stats_visite(adresse_ip) VALUES(?)");
    $incremente_nbr_visiteurs->execute(array($_SERVER['REMOTE_ADDR']));
    ?>


    <!Doctype html>
    <html lang="fr">
    <head>
        <title>SimFast - Accueil</title>
        <!-- Titre de la page -->
        <meta charset="utf-8">
        <!-- Permet au navigateur de traduire en une autre langue le site -->
        <meta name="author" content="Antoine Bazire">
        <!-- Nom de l'auteur du site -->
        <meta name="description" content="site web sae 3">
        <!-- Description du site (recherche plus facilement en fonction des mots dedans) -->
        <meta name="keywords" content="SimFast">
        <!-- Mot clé facilitant la recherche du site -->
        <link rel="shortcut icon" href="Images/SimFast_logo.png" type="image/x-icon">
        <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
        <link rel="stylesheet" href="Css/style.css">
    </head>

    <body>
    <div class="contenu">
        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='SimFast-Inscription.php'>S'inscrire</a></li>
                    <li><a href='SimFast-Connexion.php'>Se connecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='logo'>
            <img src="Images/SimFast_logo.png" alt="SimFast_logo">
        </div>

        <div class='texte_description_site'>
            <h3>Bienvenue !</h3>
            <p>Simfast est une application web permettant à ses utilisateurs d'effectuer des simulations de calculs
                facilement et rapidement ! Une fois inscrit (situé en haut à droite de la page) vous pourrez profiter de
                toutes les fonctionnalités
                de Simfast : Simuler des calculs d'amortissement pour vos projets, convertir des sommes en
                décimal, hexadécimal, binaire ou encore faire des calculs utilisant la Loi Normale.
                <br><br> Si vous souhaitez vous faire une idée de ce qu'est Simfast vous pouvez visionner la vidéo de
                présentation ci-dessous. A bientôt !
            </p>
        </div>
        <div class="video_presentation">
            <video width="auto" height="auto" controls poster="Images/SimFast_logo.png">
                <source src="Vidéos/Video_presentation.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <footer>
        <?php include 'Serveur/footer.php'; ?>
    </footer>
    </body>


    </html>
<?php } ?>