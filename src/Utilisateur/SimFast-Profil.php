<?php session_start();
if(isset($_SESSION['login'])){
?>



<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Profile</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Antoine Bazire">
    <!-- Nom de l'auteur du site -->
    <link rel="shortcut icon" href="../Images/SimFast_logo.png" type="image/x-icon">
    <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
    <link rel="stylesheet" href="../Css/style.css">
    <script src="javaScript/search_module.js"></script>

</head>

<body>
    <div class="contenu">

        <div class='navigation'>
            <nav>
                <ul>
                    <div class="toggle_btn">
                        <!-- image pour le bouton du menu -->
                        <span></span>
                    </div>
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='../Serveur/deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class="menu_vertical nav_vertical">
            <h4 class="titre_menu_vertical">Matières</h4>
            <p>Mathématiques</p>
            <button onclick="window.location.href='SimFast-Module_Probabilite.php'">Probabilités</button>
            <button onclick="window.location.href='SimFast-Module_Derivee.php'">Dérivée</button>
            <p> Informatique </p>
            <button onclick="window.location.href='SimFast-Module_Crypto.php'">Chiffrement</button>
            <button onclick="window.location.href='SimFast-Module_Conversion.php'">Convertisseur</button>
            <p>Gestion</p>
            <button onclick="window.location.href='SimFast-Module_Amortissement.php'">Amortissement</button>
        </div>

        <div class='modules_navigation'>
            <?php include 'serveur/menu-utilisateur.php'; ?>
        </div>

        <div class="rectangle_blanc">
            <h3>PROFIL</h3>
            <div class="rectangle_blanc_content">
                <input class="textfield unmodifiable" type="text" name="login" placeholder="<?= $_SESSION["login"] ?>">
                <br>
                <input class="textfield unmodifiable" type="text" name="login" placeholder="<?= $_SESSION["email"] ?>">
                <br>
                <input class="textfield unmodifiable" type="password" name="mdp" placeholder="Mot de passe">
                <a class="crayon" href="SimFast-Changer_mdp.php" title="Changer de mot de passe">
                    ✏️
                </a>
            </div>
        </div>
    </div>

    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>
    <script type="text/javascript" src="javaScript/menu_vertical.js"></script>
</body>


</html>
<?php }
else{
    header('Location: ../index.php');
}