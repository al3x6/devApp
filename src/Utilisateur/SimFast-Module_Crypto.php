<?php
session_start();
if (isset($_SESSION['login'])) {
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
        <link rel="stylesheet" href="../Css/style.css">

    </head>

    <body>
    <div class="contenu">
        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='../Serveur/deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='modules_navigation'>
            <?php include 'serveur/menu-utilisateur.php'; ?>
        </div>
        <div class="Titre_module">
            <h3>Cryptographie</h3>
        </div>
        <div class="Module_Crypto">
            <div class="Crypto_content">
                <div class="Crypto_chiffrage">
                    <form action="serveur/encrypt.php" method="post">
                        <h4>Chiffrement</h4>
                        <div class="Crypto_output">
                            <input class="Crypto_textfiel_input" type="text" name="cle" placeholder="Clés"
                                   value="<?php if (isset($_SESSION["cle"])) echo $_SESSION["cle"]; ?>">
                            <span>
                            <input class="Crypto_textfiel_input" type="text" name="texte" placeholder="Texte"
                                   value="<?php if (isset($_SESSION["texte"])) echo $_SESSION["texte"]; ?>">
                            <select name="choix_chiffrement" class="">
                                <option value="Chiffrage">Chiffrage</option>
                                <option value="dechiffrage">Dechiffrage</option>
                            </select>
                            </span>
                            <span>
                            <input type="submit" name="chiffrage" value="valider">
                            <a href="serveur/insert_library.php"><input type="button" value="enregistrer"></a>
                            </span>
                            <p class="error"><?php if (isset($err)) echo $err; ?></p>
                        </div>
                    </form>
                    <!--Partie enregistrement dans la bibliothèque-->
                    <?php
                    if (isset($_GET["result"]))
                        echo "<p> Suite chiffrée : " . $_GET["result"] . "</p>";
                    if (isset($_GET["err"]))
                        echo "<p class='error'> La clé est déjà dans la bibliothèque</p>";
                    if (isset($_GET["success"]))
                        echo "<p class='success'> Enregistré</p>";
                    ?>
                </div>
                <a href="SimFast-Module_Crypto_Biblio.php" class="bibliotheque">Accéder à la bibliothèque</a>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>
    </body>

    </html>
    <?php
} else {
    header('Location: ../index.php');
}