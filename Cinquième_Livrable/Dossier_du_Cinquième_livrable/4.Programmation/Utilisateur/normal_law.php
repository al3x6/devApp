<?php

if(isset($_POST["valider"])){
    $methode_choisie = $_POST['methode'];
    $mu = $_POST['mu'];
    $sigma = $_POST['sigma'];
    $t = $_POST['t'];
    $loi_normale ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe loi_normale.py 2>&1";
    $methode_rectangles ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe methode_rectangles.py 2>&1";
    $methode_trapezes ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe methode_trapezes.py 2>&1";
//  2>&1 à la fin du nom de la commande pour afficher et debugger les problèmes si il y en a

    if($methode_choisie=="methode_rectangle_droit")
        $result = exec($methode_rectangles . escapeshellarg($mu) . ' ' . escapeshellarg($sigma). ' ' . escapeshellarg($t));
    else
        $result = exec($methode_trapezes . escapeshellarg($mu) . ' ' . escapeshellarg($sigma). ' ' . escapeshellarg($t));
    header("Location: SimFast-Module_Probabilite.php?result=$result");
}