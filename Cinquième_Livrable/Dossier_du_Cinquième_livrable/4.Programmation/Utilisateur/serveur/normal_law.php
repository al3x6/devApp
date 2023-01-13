<?php
session_start();
include '../../Config/database.php';
global $db;

if(isset($_POST["valider"])){
    $updatemot_dernier_module = $db->prepare("UPDATE utilisateur SET dernier_module = ? where login=?");
    $updatemot_dernier_module->execute(array("Probabilite", $_SESSION['login']));

    $methode_choisie = $_POST['methode'];
    $mu = $_POST['mu'];
    $sigma = $_POST['sigma'];
    $t = $_POST['t'];

//    $loi_normale ="/usr/bin/python3 python/loi_normale.py";
//    $methode_rectangles ="/usr/bin/python3  python/methode_rectangles.py";
//    $methode_trapezes ="/usr/bin/python3 python/methode_trapezes.py";
//    $methode_simpsons="/usr/bin/python3 python/methode_simpson.py";

     $loi_normale ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ../python/loi_normale.py";
     $methode_rectangles ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ../python/methode_rectangles.py";
     $methode_trapezes ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ../python/methode_trapezes.py";
    $methode_simpsons="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ../python/methode_simpson.py";

    if($methode_choisie=="methode_rectangle"){
	    $result = exec($methode_rectangles. ' '. $mu .' '. $sigma . ' ' . $t);
    }elseif ($methode_choisie=="methode_trapeze"){
        $result = exec($methode_trapezes. ' '. $mu .' '. $sigma. ' ' . $t);
    }
    else{
        $result = exec($methode_simpsons. ' '. $mu .' '. $sigma. ' ' . $t);
    }
    print_r($mu);
    print_r($sigma);
    print_r($t);
//    header("Location: ../SimFast-Module_Probabilite.php?result=$result");
}
