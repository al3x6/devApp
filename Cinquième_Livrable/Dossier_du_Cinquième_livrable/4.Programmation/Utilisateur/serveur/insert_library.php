<?php
session_start();
include '../../Config/database.php';
global $db;

if (isset($_SESSION["texte_chiffre"])) {
    $cle = $_SESSION["cle"];
    $texte = $_SESSION["texte"];
    $texte_chiffre= $_SESSION["texte_chiffre"];
    $login = $_SESSION["login"];

    $reqCle = $db->prepare("SELECT * FROM crypto WHERE login = ? and texte_chiffre = ?");
    $reqCle->execute(array($login,$texte_chiffre));
    $cleExiste = $reqCle->rowCount();
    if ($cleExiste == 0) {
        $insertCles = $db->prepare("INSERT INTO crypto(login,cle,texte,texte_chiffre) VALUES(?,?,?,?)");
        $insertCles->execute(array($login,$cle, $texte, $texte_chiffre));
        header('Location: ../SimFast-Module_Crypto.php?success');
}
    else{
        header('Location: ../SimFast-Module_Crypto.php?err');
    }

}