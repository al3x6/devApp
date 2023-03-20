<?php session_start();
include '../Config/database.php';
global $db;
if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    ?>
<!Doctype html>
<html lang="fr">
<head>
    <title>SimFast - Gestion des utilisateurs</title>
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
        <h3>Connexions echouées </h3>
    </div>

    <form action="serveur/suppression.php" method="post">
        <div class="Table_gestion">
            <table>
                <tr>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Adresse ip</th>
                    <th>Date</th>
                </tr>
                <?php
                $file = "log/echecs_connexion.log";
                if (file_exists($file)){
                    $fp=fopen($file,"r");
                    while ($ligne= fgets($fp)):
                        $colonne = explode(' ', $ligne); ?>
                        <tr>
                            <td><?= $colonne[0] ?></td>
                            <td><?= $colonne[1] ?></td>
                            <td><?= $colonne[2] ?></td>
                            <td><?= $colonne[3] . " " . $colonne[4]?></td>
                        </tr>
                    <?php endwhile;}?>
            </table>

        </div>
    </form>
</div>

<footer>
    <?php include '../Serveur/footer.php'; ?>
</footer>
</body>
</html>
<?php } else {
    header('Location: ../index.php');
}