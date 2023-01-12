<?php session_start();
include '../Config/database.php';
global $db;

?>


<!Doctype html>
<html lang="fr">
<head>
    <title>SimFast - Gestion des utilisateurs</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Alexis Araujo">
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
                <li><a href='SimFast-Module_Crypto.php'>Retour</a></li>
            </ul>
        </nav>
    </div>

    <div class="Titre_module">
        <h3>Bibliothèque</h3>
    </div>

    <h1><?php if (isset($_SESSION['status'])) {
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        } ?></h1>

    <form action="../Gestionnaire/Suppression.php" method="post">
        <div class="Table_gestion_utilisateurs">
            <table>
                <tr>
                    <th>Clé</th>
                    <th>Texte</th>
                    <th>Texte Chiffré</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                $req = $db->prepare("SELECT * FROM crypto");
                $req->execute();
                while ($resultat = $req->fetch(PDO::FETCH_ASSOC)){ // On créer des colonnes tant qu'il y a des utilisateurs
                    ?>
                    <tr>
                        <td><?= $resultat['cle'] ?></td>
                        <td><?= $resultat['texte'] ?></td>
                        <td><?= $resultat['texte_chiffre'] ?></td>
                        <td><input type="checkbox" name="uSuppression[]" value="<?= $resultat['login'] ?>"></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="gestion_bouton_supprimer">
            <input class="Valide_suppression" type="submit" name="suppression" value="Supprimer">
        </div>

    </form>
</div>
<footer>
    <?php include '../Footer.php'; ?>
</footer>
</body>

</html>