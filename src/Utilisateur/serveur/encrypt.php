<?php
session_start();
include '../../Config/database.php';
global $db;

if(isset($_POST["cle"]) && isset($_POST["texte"])){
    $updatemot_dernier_module = $db->prepare("UPDATE utilisateur SET dernier_module = ? where login=?");
    $updatemot_dernier_module->execute(array("Cryptage", $_SESSION['login']));

    $cle = $_POST["cle"];
    $texte = $_POST["texte"];
    $choix = $_POST["choix_chiffrement"];
    $_SESSION["cle"] = $_POST["cle"];
    $_SESSION["texte"] = $_POST["texte"];

    if($choix == "Chiffrage"){
        //$chiffrement = exec("C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe  ..\python\chiffrage.py". ' '. $texte . " " . $cle);
        //$chiffrement=exec("C:\Users\alexi\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe ..\python\chiffrage.py". ' '. $texte . " " . $cle);
        $chiffrement = exec("/usr/bin/python3  python\chiffrage.py". ' '. $texte . " " . $cle);
        //$chiffrement = exec("C:\Users/ninop\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/chiffrage.py". ' '. $texte . " " . $cle);
        //$chiffrement = exec("C:\Users/j-lbz\AppData\Local\Microsoft\WindowsApps\python.exe ..\python\chiffrage.py". ' '. $texte . " " . $cle);
        $_SESSION["texte_chiffre"] = $chiffrement;
        header("Location: ../SimFast-Module_Crypto.php?result=$chiffrement");

    }
    else{
        //$chiffrement = exec("C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe  python\dechiffrage.py". ' '. $texte . " " . $cle);
        //$chiffrement = exec("C:\Users\alexi\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe  ..\python\dechiffrage.py". ' '. $texte . " " . $cle);
        $chiffrement = exec("/usr/bin/python3  python\dechiffrage.py". ' '. $texte . " " . $cle);
        //$chiffrement = exec("C:\Users/ninop\AppData\Local\Microsoft\WindowsApps\python.exe ..\python/dechiffrage.py". ' '. $texte . " " . $cle);
        //$chiffrement = exec("C:\Users/j-lbz\AppData\Local\Microsoft\WindowsApps\python.exe ..\python\dechiffrage.py". ' '. $texte . " " . $cle);

        header("Location: ../SimFast-Module_Crypto.php?result=$chiffrement");
    }
}

else{
    header("Location: ../SimFast-Module_Crypto.php");
}
?>