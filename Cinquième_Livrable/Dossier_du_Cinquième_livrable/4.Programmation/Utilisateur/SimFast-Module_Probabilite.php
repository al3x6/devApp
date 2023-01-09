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
                <form action="normal_law.php" method="post">
                    <table>
                        <tr>
                            <td>μ (mu)</td>
                            <td><input class="Proba_input_text" type="text" name="mu"></td>

                            <td>t (quantile)</td>
                            <td><input class="Proba_input_text" type="text" name="t"></td>
                        </tr>
                        <tr>
                            <td>σ (sigma)</td>
                            <td><input class="Proba_input_text" type="text" name="sigma"></td>
                            <td><input type="submit" name="valider" value="valider"></td>
                        </tr>
                    </table>
            </div>

            <div class="Proba_Resultat">
                    <?php if(isset($_GET["result"]))
                        echo "<img src='graphe.png' alt='graphe'>";
                    else
                        echo "<div class='rectangle_vide'></div>"; ?>
                <p> P(X < t) <?php if(isset($_GET["result"]))echo " = " . $_GET["result"]?> </p>
                    <select name="methode" id="methode">
                        <option value="methode_rectangle_droit">methode rectangles droits</option>
                        <option value="methode_rectangle_gauche">methode rectangles gauches</option>
                        <option value="methode_trapeze">methode trapèzes</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
</body>

</html>
<?php }
else{
    header('Location: ../SimFast-Accueil_utilisateur.php');
}