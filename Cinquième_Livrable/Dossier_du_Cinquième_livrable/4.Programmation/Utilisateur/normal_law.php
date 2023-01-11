<?php
session_start();
include '../Config/database.php';
global $db;

if(isset($_POST["valider"])){
    $updatemot_dernier_module = $db->prepare("UPDATE utilisateur SET dernier_module = ? where login=?");
    $updatemot_dernier_module->execute(array("Probabilite", $_SESSION['login']));

    $methode_choisie = $_POST['methode'];
    $mu = $_POST['mu'];
    $sigma = $_POST['sigma'];
    $t = $_POST['t'];

   $loi_normale ="/usr/bin/python3 /var/www/html/Utilisateur/loi_normale.py";
   $methode_rectangles ="python3 /var/www/html/Utilisateur/methode_rectangles.py";
   $methode_trapezes ="/usr/bin/python3 methode_trapezes.py 2>&1";

//     $loi_normale ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe loi_normale.py 2>&1";
//     $methode_rectangles ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe methode_rectangles.py 2>&1";
//     $methode_trapezes ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe methode_trapezes.py 2>&1";

//  2>&1 à la fin du nom de la commande pour afficher et debugger les problèmes si il y en a

    if($methode_choisie=="methode_rectangle_droit"){
	    $result = exec($methode_rectangles. ' '. $mu .' '. $sigma . ' ' . $t);
    }elseif ($methode_choisie=="methode_rectangle_gauche"){
	    $result = "Méthode en cours de construction";
    }
    else{
        $result = exec($methode_trapezes . $mu . ' ' . $sigma. ' ' . $t);
    }
    header("Location: SimFast-Module_Probabilite.php?result=$result");
}
