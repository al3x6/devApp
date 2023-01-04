<?php session_start(); ?>


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
            <form action="" method="post">
                <div class="Conversion_Input">
                    <select class="input_select">
                        <option value="decimal">décimal</option>
                        <option value="hexadecimal">hexadécimal</option>
                        <option value="binaire">binaire</option>
                    </select>
                    <input class="Conversion_reverse" type="submit" name="reverse" value="⇆">
                    <select class="input_select">
                        <option value="decimal">décimal</option>
                        <option value="hexadecimal" selected>hexadécimal </option>
                        <option value="binaire">binaire</option>
                    </select>
                </div>
                <div class="Conversion_output">
                    <input class="output_valeurs" type="text" name="output_val1">
                    <input class="output_valeurs" type="text" name="output_val2">
                </div>
            </form>
        </div>
    </div>
    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
</body>

</html>
