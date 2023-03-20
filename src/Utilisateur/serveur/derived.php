<?php
session_start();
include '../../Config/database.php';
global $db;

if (isset($_POST["valider"])) {
    $updatemot_dernier_module = $db->prepare("UPDATE utilisateur SET dernier_module = ? where login=?");
    $updatemot_dernier_module->execute(array("Derivée", $_SESSION['login']));

    $fonction = $_POST['fonction'];

    //$derivee ="/usr/bin/python3  ../python/derivee.py";

    //$derivee ="C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe ..\python\derivee.py";

    $derivee = "C:\Users\alexi\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe  ../python/derivee.py";

    //$derivee = "C:\Users/ninop\AppData\Local\Microsoft\WindowsApps\python.exe ..\python\derivee.py" ;

    //$derivee = "C:\Users/j-lbz\AppData\Local\Microsoft\WindowsApps\python.exe ..\python\derivee.py" ;


    $result = exec($derivee . ' ' . $fonction);
    header("Location: ../SimFast-Module_Derivee.php?result=$result");
}
