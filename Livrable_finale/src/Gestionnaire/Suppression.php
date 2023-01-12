<?php
session_start();
include '../Config/database.php';
include '../functions.php';
global $db;
$connexion = mysqli_connect("localhost","root","","simfast");

if(isset($_POST['suppression'])){
    $listeLogin = $_POST['uSuppression'];
    $rowCount = count($_POST["uSuppression"]);
    for ($i = 0; $i < $rowCount; $i ++) {
        $query = $db->prepare("DELETE FROM utilisateur WHERE login= :login");
        $query->execute(['login' => $listeLogin[$i]]);
    }
    $_SESSION['status'] = "Suppression réussi";
    header("Location: SimFast-Gestion_utilisateurs.php");

}