<?php session_start();
include '../Config/database.php';
global $db;
if (isset($_SESSION['login'])) {
?>

<!Doctype html>
<html lang="fr">
<head>
    <title>SimFast - Bibliothèque de clés</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Alexis Araujo">
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
        } ?>
    </h1>

    <form action="serveur/suppression.php" method="post">
        <div class="Table_gestion">
            <table>
                <tr>
                    <th>Clé</th>
                    <th>Texte</th>
                    <th>Texte Chiffré</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                $login = htmlspecialchars($_SESSION['login']);
                $req = $db->prepare("SELECT * FROM crypto WHERE login= '$login'");
                $req->execute();
                while ($resultat = $req->fetch(PDO::FETCH_ASSOC)){ // On créer des colonnes tant qu'il y a des utilisateurs
                    ?>
                    <tr>
                        <td><?= $resultat['cle'] ?></td>
                        <td><?= $resultat['texte'] ?></td>
                        <td><?= $resultat['texte_chiffre'] ?></td>
                        <td><input type="checkbox" name="tSuppression[]" value="<?= $resultat['texte_chiffre'] ?>"></td>
                    </tr><?php } ?>
            </table>
        </div>
        <div class="gestion_bouton_supprimer">
            <input class="Valide_suppression" type="submit" name="suppression" value="Supprimer">
        </div>

    </form>
</div>
<footer>
    <?php include '../Serveur/footer.php'; ?>
</footer>
</body>
</html>
<?php
} else{
    header('Location: ../index.php');
}