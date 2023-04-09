<?php session_start();
if(isset($_SESSION['login'])){
    if (isset($_GET["numerotation"])){
        $erreur= "Veuillez séléctionner deux numérotations différentes";
    }
    if (isset($_GET["binaire"])){
        $erreur= "Veuillez entrer des valeurs valides";
    }
    if (isset($_GET["decimal"])){
        $erreur= "Veuillez entrer des nombres";
    }
?>


<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Conversion décimal hexadecimal binaire</title>
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
            <h3>Conversion</h3>
        </div>
        <div class="Module_Conversion">
                <div class="Conversion_Input">
                    <form action="serveur/conversion.php" method="post">
                        <select class="input_select" name="choix_conversion1">
                            <option value="decimal" <?php if(isset($_SESSION["choix1"]) && $_SESSION["choix1"] =="decimal"){ echo "selected";}?>>décimal</option>
                            <option value="hexadecimal" <?php if(isset($_SESSION["choix1"]) && $_SESSION["choix1"] =="hexadecimal"){ echo "selected";}?>>hexadécimal</option>
                            <option value="binaire" <?php if(isset($_SESSION["choix1"]) && $_SESSION["choix1"] =="binaire"){ echo "selected";}?>>binaire</option>
                        </select>
                        <input class="Conversion_reverse" id="Conversion_retour" type="submit" name="reverse" value="⇆">
                            <select class="input_select" name="choix_conversion2">
                                <option value="decimal" <?php if(isset($_SESSION["choix2"]) && $_SESSION["choix2"] =="decimal"){ echo "selected";}?> >décimal</option>
                                <option value="hexadecimal" <?php if(isset($_SESSION["choix2"]) && $_SESSION["choix2"] =="hexadecimal"){ echo "selected";}?>>hexadécimal </option>
                                <option value="binaire" <?php if(isset($_SESSION["choix2"]) && $_SESSION["choix2"] =="binaire"){ echo "selected";}?>>binaire</option>
                            </select>
                    </div>
                    <div class="Conversion_output">
                        <label for="Conversion"></label>
                        <input class="output_valeurs" id="Conversion" type="text" name="output_val" value="<?php if(isset($_SESSION["valeur"])){ echo $_SESSION["valeur"];}?>">
                        <label for="Conversion_retour"></label>
                        <input class="output_valeurs unmodifiable" id="Conversion_retour" type="text" value="<?php if(isset($_GET["conversion"])){ echo $_GET["conversion"];}?>">
                        <input type="submit" value="convertir" name="convertir" class="bouton_valider">
                    </div>
                    </form>
            <p class="error"><?php if(isset($erreur)){echo $erreur;} ?></p>
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