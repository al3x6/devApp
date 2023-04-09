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

        <div class="Titre_module">
            <h3>Cryptographie</h3>
            <br>
        </div>

        <div class="Module_Crypto">
            <div class="Crypto_content">
                <div class="Crypto_chiffrage">
                    <form action="serveur/encrypt.php" method="post">
                        <h4>Chiffrement</h4>
                        <div class="Crypto_output">
                            <label for="Cle">Entrer une clé :</label>
                            <input class="Crypto_textfiel_input" id="Cle" type="text" name="cle" placeholder="Clé"
                                   value="<?php if (isset($_SESSION["cle"])) echo $_SESSION["cle"]; ?>">
                            <br>
                            <label for="texte">Entrer un texte :</label>
                            <input class="Crypto_textfiel_input" id="texte" type="text" name="texte" placeholder="Texte"
                                   value="<?php if (isset($_SESSION["texte"])) echo $_SESSION["texte"]; ?>">

                            <select name="choix_chiffrement" class="Crypto_select_input">
                                <option value="Chiffrage">Chiffrage</option>
                                <option value="dechiffrage">Déchiffrage</option>
                            </select>

                            <br>
                            <div class="Crypto_button_container">
                                <input type="submit" name="chiffrage" value="Valider" class="bouton_valider">
                                <a href="serveur/insert_library.php"><input type="button" class="bouton_valider"
                                                                            value="Enregistrer" ></a>
                            </div>
                            <p class="Crypto_error_message"><?php if (isset($err)) echo $err; ?></p>
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
    <script type="text/javascript" src="javaScript/menu_vertical.js"></script>
    </body>

    </html>
    <?php
} else {
    header('Location: ../index.php');
}