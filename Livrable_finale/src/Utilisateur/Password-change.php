<?php
include '../Config/database.php';
session_start();
global $db;

if(isset($_POST["mdpChange"])){
    if(isset($_SESSION['login'])) {
        $requser = $db->prepare("SELECT * FROM  utilisateur WHERE login=?");
        $requser->execute(array($_SESSION['login']));
        $user = $requser->fetch();

        if (isset($_POST['newmdp']) and !empty($_POST['newmdp']) and isset($_POST['cnewmdp']) and !empty($_POST['cnewmdp'])) {
            $mot_de_passe = htmlspecialchars($_POST['newmdp']);
            $cmot_de_passe = htmlspecialchars($_POST['cnewmdp']);
            if ($mot_de_passe == $cmot_de_passe) {
                if (!password_verify($mot_de_passe, $user['mdp'])) {
                    $options = ['cost' => 12,];
                    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT, $options);
                    $updatemot_de_passe = $db->prepare("UPDATE utilisateur SET mdp = ? where login=?");
                    $updatemot_de_passe->execute(array($mot_de_passe, $_SESSION['login']));
                    header('Location: SimFast-Changer_mdp.php?success');
                } else {
                    header('Location: SimFast-Changer_mdp.php?error2');
                }
            } else {
                header('Location: SimFast-Changer_mdp.php?error1');
            }
        }else {
            header('Location: Simfast-Changer_mdp.php?error0');
        }
    }else{
        header('Location: SimFast-Profil.php');
    }
}
else{
    header('Location: SimFast-Profil.php');
}