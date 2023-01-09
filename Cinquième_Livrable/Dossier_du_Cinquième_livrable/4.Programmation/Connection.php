<?php
session_start();
include 'Config/database.php';
global $db;

if (!empty($_POST['login']) and !empty($_POST['mdp'])) {
    $login = htmlspecialchars($_POST['login']);
    $mot_de_passe = htmlspecialchars($_POST['mdp']);

    /* Recherche d'un utilisateur par le login */
    $connexion = $db->prepare("SELECT * FROM utilisateur WHERE login = :login");
    $connexion->execute(['login' => $login]);
    $resultLogin = $connexion->fetch();  //Convertit le résultat en un tableau

    /* Recherche d'un utilisateur par l'email */
    $connexion = $db->prepare("SELECT * FROM utilisateur WHERE email = :email");
    $connexion->execute(['email' => $login]);
    $resultEmail = $connexion->fetch();  //Convertit le résultat en un tableau

    if ($resultLogin or $resultEmail) {   // Crée la variable $result si l'utilisateur existe
        if ($resultLogin) {
            $result = $resultLogin;
        } else {
            $result = $resultEmail;
        }
        $hashpassword = $result['mdp'];
        if (password_verify($mot_de_passe, $hashpassword)) {
            if ($login == "admin" or $login == "admin@gmail.com") {
                $_SESSION['login'] = $result['login'];
                header("Location: Gestionnaire/SimFast-Accueil_gestionnaire.php");
            } else {
                $_SESSION['login'] = $result['login'];
                $_SESSION['email'] = $result['email'];
                header("Location: Utilisateur/SimFast-Accueil_utilisateur.php");
                exit;
            }
        } else {
            $_SESSION['login_incorrect'] = $_POST['login'];
            $_SESSION['mdp_incorrect'] = $_POST['mdp'];
            header('Location: SimFast-Connexion.php?error1');
        }
    } else {

        header('Location: SimFast-Connexion.php?error1');
    }
} else {
    header('Location: SimFast-Connexion.php?error0');
}
?>