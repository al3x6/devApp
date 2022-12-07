<?php session_start();

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
            <h3>Conversion</h3>
        </div>
        <div class="Module_Conversion">
                <div class="Conversion_Input">
                    <form action="conversion.php" method="post">
                        <select class="input_select" name="choix_conversion1">
                            <option value="decimal" <?php if(isset($_SESSION["choix1"]) && $_SESSION["choix1"] =="decimal"){ echo "selected";}?>>décimal</option>
                            <option value="hexadecimal" <?php if(isset($_SESSION["choix1"]) && $_SESSION["choix1"] =="hexadecimal"){ echo "selected";}?>>hexadécimal</option>
                            <option value="binaire" <?php if(isset($_SESSION["choix1"]) && $_SESSION["choix1"] =="binaire"){ echo "selected";}?>>binaire</option>
                        </select>
                        <input class="Conversion_reverse" type="submit" name="reverse" value="⇆">
                            <select class="input_select" name="choix_conversion2">
                                <option value="decimal" <?php if(isset($_SESSION["choix2"]) && $_SESSION["choix2"] =="decimal"){ echo "selected";}?> >décimal</option>
                                <option value="hexadecimal" <?php if(isset($_SESSION["choix2"]) && $_SESSION["choix2"] =="hexadecimal"){ echo "selected";}?>>hexadécimal </option>
                                <option value="binaire" <?php if(isset($_SESSION["choix2"]) && $_SESSION["choix2"] =="binaire"){ echo "selected";}?>>binaire</option>
                            </select>
                    </div>
                    <div class="Conversion_output">
                        <input class="output_valeurs" type="text" name="output_val" value="<?php if(isset($_SESSION["valeur"])){ echo $_SESSION["valeur"];}?>">
                        <input class="output_valeurs unmodifiable" type="text" value="<?php if(isset($_GET["conversion"])){ echo $_GET["conversion"];}?>">
                        <input type="submit" value="convertir" name="convertir">
                    </div>
                    </form>
            <p class="error"><?php if(isset($erreur)){echo $erreur;} ?></p>
        </div>
    </div>
    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
</body>

</html>
