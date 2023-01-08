<?php
if(isset($_POST["valider"])){
    $methode_choisie = $_POST['methode'];
    $mu = $_POST['mu'];
    $sigma = $_POST['sigma'];
    $t = $_POST['t'];
    $sortie_result;
    $etat_result;
    $loi_normale ="/usr/bin/python3 /var/www/html/Utilisateur/loi_normale.py";
    $methode_rectangles ="python3 /var/www/html/Utilisateur/methode_rectangles.py";
    $methode_trapezes ="/usr/bin/python3 methode_trapezes.py 2>&1";
//  2>&1 à la fin du nom de la commande pour afficher et debugger les problèmes si il y en a

    if($methode_choisie=="methode_rectangle_droit"){
	    exec($methode_rectangles. ' '. $mu .' '. $sigma . ' ' . $t, $sortie_result, $etat_result);
    }else{
	    //$result = exec($methode_trapezes . escapeshellarg($mu) . ' ' . escapeshellarg($sigma). ' ' . escapeshellarg($t));
    }
    $result = $sortie_result[0];
    header("Location: SimFast-Module_Probabilite.php?result=$result");
    #echo $result;
}
