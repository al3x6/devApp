<?php session_start();
if (isset($_SESSION['login'])) {
    if (isset($_GET['vide'])) {
        $err = "Veuillez remplir tous les champs";
    }
    if (isset($_GET['duree'])) {
        $err = "Veuillez entrer une durée d'au moins 3 ans";
    }
    ?>


    <!Doctype html>
    <html lang="fr">

    <head>

        <title>SimFast - Chiffrement RC4</title>
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
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='../deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='modules_navigation'>
            <?php include 'Menu-Utilisateur.php'; ?>
        </div>
        <div class="Titre_module">
            <h3>Cryptographie</h3>
        </div>
        <div class="Module_Crypto">
            <div class="Crypto_content">
                <div class="Crypto_chiffrage">
                    <form action="encrypt.php" method="post">
                        <h4>Chiffrement</h4>
                        <input class="Crypto_textfiel_input" type="text" name="cle" placeholder="Clés" value="<?php if(isset($_SESSION["cle"]))echo $_SESSION["cle"]; ?>">
                        <input class="Crypto_textfiel_input" type="text" name="texte" placeholder="Texte" value="<?php if(isset($_SESSION["texte"]))echo $_SESSION["texte"]; ?>">
                        <input type="submit" name="chiffrage" value="valider">
                        <select name="choix_chiffrement" class="">
                            <option value="Chiffrage">Chiffrage</option>
                            <option value="dechiffrage">Dechiffrage</option>
                        </select>
                        <p class="error"><?php if (isset($err)) echo $err; ?></p>
                    </form>
                    <p><?php if(isset($_GET["result"])) echo "Suite chiffrée : " . $_GET["result"]?> </p>
                </div>
            </div>
        </div>


    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
    </body>

    </html>
<?php } else {
    header('Location: ../SimFast-Accueil_utilisateur.php');
}