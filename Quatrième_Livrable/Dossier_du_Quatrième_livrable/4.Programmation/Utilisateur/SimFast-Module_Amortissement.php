<?php session_start(); ?>


<!Doctype html>
<html lang="fr">

<head>

    <title>SimFast - Calcul d'amortissement</title>
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

    </footer><?php include '../Footer.php'; ?>
</body>

</html>
