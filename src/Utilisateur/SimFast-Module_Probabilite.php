<?php session_start();
if(isset($_SESSION['login'])){
?>


<!Doctype html>
<html lang="fr">

<head>
    <title>SimFast - Module_Probabilité en loi normale</title>
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
            <h3>Probabilité en loi normale</h3>
        </div>

        <div class="Module_proba">
            <div class="Proba_valeurs">
                <form action="serveur/normal_law.php" method="post">
                    <table>
                        <tr>
                            <td><label for="mu">μ (mu)</label></td>
                            <td><input class="Proba_input_text" id="mu" type="text" name="mu"></td>

                            <td><label for="quantile">t (quantile)</label></td>
                            <td><input class="Proba_input_text" id="quantile" type="text" name="t"></td>
                        </tr>
                        <tr>
                            <td><label for="sigma">σ (sigma)</label></td>
                            <td><input class="Proba_input_text" id="sigma" type="text" name="sigma"></td>
                            <td><input type="submit" name="valider" value="valider"></td>
                        </tr>
                    </table>
            </div>

            <div class="Proba_Resultat">
                    <?php if(isset($_GET["result"]))
                        echo "<img src='img/graphe.png' alt='graphe'>";
                    else
                        echo "<div class='rectangle_vide'></div>"; ?>
                <p> P(X < t) <?php if(isset($_GET["result"]))echo " = " . $_GET["result"]?> </p>
                    <select name="methode" id="methode">
                        <option value="methode_rectangle">methode des rectangles droits</option>
                        <option value="methode_trapeze">methode des trapèzes</option>
                        <option value="methode_simpson">methode de simpson</option>
                    </select>
                </form>
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
?>