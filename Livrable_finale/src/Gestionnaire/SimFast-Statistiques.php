<?php session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    include '../Config/database.php';
    global $db;
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

        <div class="Titre_module">
            <h3>Statistiques</h3>
        </div>
        <div class="Statistiques_content">
            <div class="Statistiques_graphe">
                <textarea class="stats_visite_graphe" name="stats_visite_graphe"></textarea>
                <textarea class="stats_modules_graphe" name="stats_modules_graphe"></textarea>
            </div>
            <?php
            //Statistiques visiteurs
            $stat_visite = $db->prepare("SELECT * FROM stats_visite");
            $stat_visite->execute();
            $nbr_visiteurs_totaux = 0;
            $nbr_visiteurs_jour = 0;
            $nbr_visiteurs_semaine = 0;
            while ($resultat = $stat_visite->fetch(PDO::FETCH_ASSOC)):
                if ($resultat["date"] == "aujourd'hui")
                    $nbr_visiteurs_jour += 1;
                if ($resultat["date"] <= "cette semaine")
                    $nbr_visiteurs_semaine += 1;
                $nbr_visiteurs_totaux += 1;
            endwhile;

            //            //Statistiques modules
            //            $stat_module=$db->prepare("SELECT * FROM stats_module");
            //            $stat_module->execute();
            //            $nbr_visiteurs_totaux = 0;
            //            $nbr_visiteurs_jour = 0;
            //            $nbr_visiteurs_semaine = 0;
            //            while($resultat = $stat_module->fetch(PDO::FETCH_ASSOC)):
            //                if($resultat["date"] == "aujourd'hui")
            //                    $nbr_visiteurs_jour +=1;
            //                if($resultat["date"] <= "cette semaine")
            //                    $nbr_visiteurs_semaine +=1;
            //                $nbr_visiteurs_totaux+=1;
            //            endwhile;
            //
            ?>

            <div class="Statistiques_p">
                <p>Nombre de visiteurs différents aujourd'hui : <?= $nbr_visiteurs_totaux ?> </p>
                <!--                <p>Nombre de visiteurs différents cette semaine : --><?//=$nbr_visiteurs
                ?><!--</p>-->
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>
    </body>

    </html>
<?php } else {
    header('Location: ../index.php');
}