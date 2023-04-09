<?php
session_start();
if(isset($_SESSION['login'])){
    if(isset($_GET["success"])){
        $success = "Le mot de passe a été modifié";
    }

    if(isset($_GET["error0"])){
        $err = "Veuillez remplir tous les champs";
    }

    if(isset($_GET["error1"])){
        $err = "Vos de mots de passe ne correspondent pas !";
    }

    if(isset($_GET["error2"])){
        $err = "Veuillez entrer un mot de passe différent du précédent";
    }
?>

<!Doctype html>
<html lang="fr">

<head>
    <title>SimFast - Changer de mot de passe</title>
    <!-- Titre de la page -->
    <meta charset="utf-8">
    <!-- Permet au navigateur de traduire en une autre langue le site -->
    <meta name="author" content="Antoine Bazire">
    <!-- Nom de l'auteur du site -->
    <link rel="shortcut icon" href="../Images/SimFast_logo.png" type="image/x-icon">
    <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
    <link rel="stylesheet" href="../Css/style.css">
</head>

<body>
    <div class="contenu">

        <div class="logo">
            <a href="SimFast-Accueil_utilisateur.php" title="Aller au menu">
                <img src="../Images/SimFast_logo.png" alt="SimFast_logo">
            </a>
        </div>

        <div class="rectangle_blanc">
            <h3>Changer de mot de passe</h3>
            <form action= "serveur/password-change.php" method="post">
                <div class="rectangle_blanc_content">
                    <input class="textfield" type="password" name="newmdp" placeholder="Nouveau mot de passe">
                    <br>
                    <input class="textfield" type="password" name="cnewmdp" placeholder="Confirmation mot de passe">
                    <br>
                    <input class="bouton_valider" type="submit" name="mdpChange" value="Valider">
                </div>
            </form>
            <p class="success"><?php if(isset($success)){echo $success;} ?></p>
            <p class="error"> <?php if(isset($err)){echo $err;} ?></p>
        </div>
    </div>
    <footer>
        <?php include '../Serveur/footer.php'; ?>
    </footer>
</body>

</html>
<?php }
else{
    header('Location: ../index.php');
}