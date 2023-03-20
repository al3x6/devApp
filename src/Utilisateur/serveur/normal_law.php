<?php
session_start();
include '../../Config/database.php';
global $db;

if (isset($_POST["valider"])) {
    $updatemot_dernier_module = $db->prepare("UPDATE utilisateur SET dernier_module = ? where login=?");
    $updatemot_dernier_module->execute(array("Probabilite", $_SESSION['login']));

    $methode_choisie = $_POST['methode'];
    $mu = $_POST['mu'];
    $sigma = $_POST['sigma'];
    $t = $_POST['t'];

    //$methode_rectangles ="/usr/bin/python3  ../python/methode_rectangles.py";
    //$methode_trapezes ="/usr/bin/python3 ../python/methode_trapezes.py";
    //$methode_simpsons="/usr/bin/python3 ../python/methode_simpson.py";

    //$methode_rectangles ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ..\python\methode_rectangles.py";
    //$methode_trapezes ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ..\python\methode_trapezes.py";
    //$methode_simpsons="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ..\python\methode_simpson.py";
    $methode_rectangles = "C:\Users\alexi\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe  ../python/methode_rectangles.py";
    $methode_trapezes = "C:\Users\alexi\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe ../python/methode_trapezes.py";
    $methode_simpsons = "C:\Users\alexi\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe ../python/methode_simpson.py";
    //$methode_rectangles = "C:\Users/ninop\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/methode_rectangles.py";
    //$methode_trapezes = "C:\Users/ninop\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/methode_trapezes.py";
    //$methode_simpsons = "C:\Users/ninop\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/methode_simpson.py";

    //$methode_rectangles = "C:\Users/j-lbz\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/methode_rectangles.py";
    //$methode_trapezes = "C:\Users/j-lbz\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/methode_trapezes.py";
    //$methode_simpsons = "C:\Users/j-lbz\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/methode_simpson.py";


    if ($methode_choisie == "methode_rectangle") {
        $result = exec($methode_rectangles . ' ' . $mu . ' ' . $sigma . ' ' . $t);
    } elseif ($methode_choisie == "methode_trapeze") {
        $result = exec($methode_trapezes . ' ' . $mu . ' ' . $sigma . ' ' . $t);
    } else {
        $result = exec($methode_simpsons . ' ' . $mu . ' ' . $sigma . ' ' . $t);
    }
    header("Location: ../SimFast-Module_Probabilite.php?result=$result");
}
