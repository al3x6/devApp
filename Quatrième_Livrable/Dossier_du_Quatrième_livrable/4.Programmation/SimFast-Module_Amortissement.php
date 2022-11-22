<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Calcul d'amortissement</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Antoine Bazire">
    <!-- Nom de l'auteur du site -->
    <link rel="shortcut icon" href="Images/SimFast_logo.png" type="image/x-icon">
    <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="contenu">
        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='SimFast-Accueil.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>
        <div class='modules_navigation'>
            <a href="SimFast-Accueil_utilisateur.php" title="Aller au menu">
                <img class="logo_miniature" src="Images/SimFast_logo.png" alt="SimFast_logo">
            </a>
            <nav>
                <ul>
                    <li><a href='SimFast-Module_Probabilite.php'>Calculateur de loi normale</a></li>
                    <li><a href='SimFast-Module_Conversion.php'>Convertisseur décimal, hexadécimal, binaire</a></li>
                    <li><a href='SimFast-Module_Amortissement.php'>Calcul d'amortissement</a></li>
                </ul>
            </nav>
        </div>

        <div class="Titre_module">
            <h3>Calcul d'amortissement</h3>
        </div>
        <div class="Module_Amortissement">

            <div class="Amortissement_content">
                <div class="Amortissement_input">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Montant à amortir:</td>
                                <td><input class="Amortissement_textfiel_input" type="text" name="montant_amortir"></td>
                            </tr>
                            <tr>
                                <td>Durée d'utilisation du bien:</td>
                                <td><input class="Amortissement_textfiel_input" type="text" name="montant_amortir"></td>
                            </tr>
                            <tr>
                                <td>Date de début de l'amortissement:</td>
                                <td><input class="Amortissement_textfiel_input" type="text" name="montant_amortir"></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <div class="Amortissement_output">
                    <p>Estimation</p>
                    <textarea class="Amortissement_TextArea" name="Amortissement_TextArea"></textarea>
                </div>
            </div>
        </div>
    </div>
    <footer>
        © 2022 - SimFast - TOUS DROITS RÉSERVÉS - PHOTOS NON CONTRACTUELLES - ALL RIGHTS RESERVED.
    </footer>
</body>

</html>
