<?php
session_start();
include '../../Config/database.php';
global $db;

if(isset($_POST['suppression'])){
    $listeTexte = $_POST['tSuppression'];
    $rowCount = count($_POST["tSuppression"]);
    $login = $_SESSION['login'];
    for ($i = 0; $i < $rowCount; $i ++) {
        $query = $db->prepare("DELETE FROM crypto WHERE login = ? and texte_chiffre = ? ");
        $query->execute(array($login,$listeTexte[$i]));
    }
    $_SESSION['status'] = "Suppression réussie";
    header("Location: ../SimFast-Module_Crypto_Biblio.php");

}