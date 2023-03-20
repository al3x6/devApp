<?php session_start();
if (isset($_SESSION['login'])) {
    ?>


    <!Doctype html>
    <html lang="fr">

    <head>
        <title>SimFast - Module_derivée calcul de dérivée</title>
        <!-- Titre de la page -->
        <meta charset="utf-8">
        <!-- Permet au navigateur de traduire en une autre langue le site -->
        <meta name="author" content="Alexis Araujo">
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
            <h3>Calcul de dérivée</h3>
        </div>
        <div class="Module_deriv">
            <div class="Deriv_valeurs">
                <form action="serveur/derived.php" method="post">
                    <table>
                        <tr>
                            <td>entrer une fonction f(x)=</td>
                            <td><input class="Deriv_input_text" type="text" name="fonction"></td>
                            <td><input type="submit" name="valider" value="valider"></td>
                        </tr>
                    </table>
            </div>

            <div class="Deriv_Resultat">
                <?php if (isset($_GET["result"]))
                    echo "<img src='img/courbe.png' alt='derivee'>";
                else
                    echo "<div class='rectangle_vide'></div>"; ?>
                <p> f'(x) <?php if (isset($_GET["result"])) echo " = " . $_GET["result"] ?> </p>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>
    </body>
    </html>
<?php } else {
    header('Location: ../index.php');
}
?>