<?php session_start(); ?>


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
            <h3>Probabilité en loi normale</h3>
        </div>
        <div class="Module_proba">
            <div class="Proba_valeurs">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>valeur 1 </td>
                            <td><input class="Proba_input_text" type="text" name="val_1"></td>
                            <td>valeur 3 </td>
                            <td><input class="Proba_input_text" type="text" name="val_3"></td>
                        </tr>
                        <tr>
                            <td>valeur 2 </td>
                            <td><input class="Proba_input_text" type="text" name="val_2"></td>
                            <td>valeur 4 </td>
                            <td><input class="Proba_input_text" type="text" name="val_4"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="Proba_Resultat">
                <div class="Proba_div_TextArea">
                    <textarea class="Proba_TextArea" name="Proba_inferieur" id="" cols="30" rows="10"></textarea>
                    <textarea class="Proba_TextArea" name="Proba_superieur" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="Proba_p">
                    <p>La probabilité qu'elle soit inférieur à</p>
                    <p>La probabilité qu'elle soit supérieur à</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
</body>

</html>
