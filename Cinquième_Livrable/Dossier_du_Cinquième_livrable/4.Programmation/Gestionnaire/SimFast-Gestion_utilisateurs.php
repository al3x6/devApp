<?php session_start();
include '../Config/database.php';
global $db;
if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin' ){
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
            <h3>Gérer les utilisateurs</h3>
        </div>

        <h1><?php if(isset($_SESSION['status'])){echo $_SESSION['status']; unset($_SESSION['status']);}?></h1>

        <form action="Suppression.php" method="post">
            <div class="Table_gestion_utilisateurs">
                <table>
                    <tr>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Historique</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                    $req=$db->prepare("SELECT * FROM utilisateur");
                    $req->execute();
                    while($resultat = $req->fetch(PDO::FETCH_ASSOC)): // On créer des colonnes tant qu'il y a des utilisateurs
                        if ($resultat['login'] != "admin"){?>
                            <tr>
                                <td><?= $resultat['login']?></td>
                                <td><?= $resultat['email']?></td>
                                <td>dernier module utilisé</td>
                                <td><input type="checkbox" name="uSuppression[]" value="<?= $resultat['login']?>"></td>
                            </tr>
                    <?php } endwhile ?>
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
    <script>
        function Deleteqry(id){
            if(confirm("Etes-vous sûr de vouloir supprimer cette annonce ?")==true)
                window.location="admin_produit.php?id_produit="+id;
            return false;
        }
    </script>
</body>

</html>
<?php }
else{
    header('Location: ../SimFast-Accueil.php');
}