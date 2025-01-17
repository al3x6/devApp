<?php session_start();
if (isset($_SESSION['login'])) {
    ?>


    <!Doctype html>
    <html lang="fr">

    <head>

        <title>SimFast - Accueil Utilisateur</title>
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

        <div class='logo'>
            <img src="../Images/SimFast_logo.png" alt="SimFast_logo">
        </div>

        <div class='texte_description_site'>
            <h3>Bienvenue <?php if (isset($_SESSION["login"])) {
                    echo $_SESSION["login"];
                } ?> !</h3>
            <h4>Vous pouvez utiliser les modules disponibles sur Simfast à volonté.</h4>
        </div>

        <div class="barre_recherche">
            <label for="searchbar">Recherche</label>
            <br>
            <input id="searchbar" onkeyup="search_module()" type="text" name="search" placeholder="nom de domaine">
        </div>


        <div class="div_bouton_module">
            <div class="domaine">
                <h5> Mathématiques </h5>
                <button onclick="window.location.href='SimFast-Module_Probabilite.php';">
                    <div class="titre_module">Calculateur de loi normale</div>
                </button>
                <button onclick="window.location.href='SimFast-Module_Derivee.php';">
                    <div class="titre_module">Calcul de dérivée</div>
                </button>
            </div>

            <div class="domaine">
                <h5> Informatique </h5>
                <button onclick="window.location.href='SimFast-Module_Crypto.php';">
                    <div class="titre_module">Chiffrement RC4</div>
                </button>
                <button onclick="window.location.href='SimFast-Module_Conversion.php';">
                    <div class="titre_module">Convertisseur de base</div>
                </button>
            </div>

            <div class="domaine">
                <h5> Gestion </h5>
                <button onclick="window.location.href='SimFast-Module_Amortissement.php';">
                    <div class="titre_module">Calcul d'amortissement</div>
                </button>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>

    <script type="text/javascript" src="javaScript/menu_vertical.js"></script>

    </body>

    </html>
<?php } else {
    header('Location: ../index.php');
}