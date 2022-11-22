<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Gestion des utilisateurs</title>
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
                    <li><a href='SimFast-Accueil.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>
        <div class='modules_navigation'>
            <a href="SimFast-Accueil_gestionnaire.php" title="Aller au menu">
                <img class="logo_miniature" src="Images/SimFast_logo.png" alt="SimFast_logo">
            </a>
            <nav>
                <ul>
                    <li><a href='SimFast-Gestion_utilisateurs.php'>Utilisateurs</a></li>
                    <li><a href='SimFast-Statistiques.php'>Statistiques</a></li>
                </ul>
            </nav>
        </div>
        <div class="Titre_module">
            <h3>Gérer les utilisateurs</h3>
        </div>
        <form action="" method="post">
            <div class="Table_gestion_utilisateurs">
                <table>
                    <tr>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Historique</th>
                        <th>Supprimer</th>
                    </tr>
                    <tr>
                        <td>login 1</td>
                        <td>email 1</td>
                        <td>dernier module utilisé</td>
                        <td><input name="utilisateur_supprimer" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input name="utilisateur_supprimer" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input name="utilisateur_supprimer" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input name="utilisateur_supprimer" type="checkbox"></td>
                    </tr>
                </table>
            </div>
            <div class="gestion_bouton_supprimer">
                <input class="Valide_suppression" type="submit" name="Valide_suppression" value="Supprimer">
            </div>
        </form>
    </div>
    <footer>
        © 2022 - SimFast - TOUS DROITS RÉSERVÉS - PHOTOS NON CONTRACTUELLES - ALL RIGHTS RESERVED.
    </footer>
</body>

</html>
