<?php
include 'Config/database.php';
global $db;

    if(!empty($_POST['login']) AND !empty($_POST['email'] AND !empty($_POST['mdp'])) AND !empty($_POST['mdp_confirme'])){
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $mot_de_passe = htmlspecialchars($_POST['mdp']);
        $cmot_de_passe = htmlspecialchars($_POST['mdp_confirme']);

        if(strlen($login) < 30){
            $reqLogin = $db->prepare("SELECT * FROM utilisateur WHERE login = ?");
            $reqLogin->execute(array($login));
            $loginExist=$reqLogin->rowCount();
            if($loginExist == 0) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $db->prepare("SELECT * FROM utilisateur WHERE email = ?");
                    $reqmail->execute(array($email));
                    $mailexist = $reqmail->rowCount();
                    if ($mailexist == 0) {
                        if ($mot_de_passe == $cmot_de_passe) {
                            $options = ['cost' => 12,];
                            $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT, $options);

                            $insertUtilisateur = $db->prepare("INSERT INTO utilisateur(login,email,mdp) VALUES(?,?,?)");
                            $insertUtilisateur->execute(array($login, $email, $mot_de_passe));
                            header('Location: SimFast-Connexion.php?success');

                        } else {
                            header('Location: SimFast-Inscription.php?error5');
                        }
                    } else {
                        header('Location: SimFast-Inscription.php?error4');
                    }
                } else {
                    header('Location: SimFast-Inscription.php?error3');
                }
            } else{
                header('Location: SimFast-Inscription.php?error2');
            }
        } else{
            header('Location: SimFast-Inscription.php?error1');
        }
    } else{
        header('Location: SimFast-Inscription.php?error0');
    }
?>