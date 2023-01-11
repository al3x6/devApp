<?php
session_start();

if(isset($_POST["cle"]) && isset($_POST["texte"])){
    $cle = $_POST["cle"];
    $texte = $_POST["texte"];
    $choix = $_POST["choix_chiffrement"];
    $_SESSION["cle"] = $_POST["cle"];
    $_SESSION["texte"] = $_POST["texte"];

    if($choix == "Chiffrage"){
//        $chiffrement = exec("C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe  chiffrage.py". ' '. $texte . " " . $cle);
        $chiffrement = exec("/usr/bin/python3  chiffrage.py". ' '. $texte . " " . $cle);
        header("Location: SimFast-Module_Crypto.php?result=$chiffrement");
    }
    else{
//        $chiffrement = exec("C:\Users\mlaat\AppData\Local\Programs\Python\Python310\python.exe  dechiffrage.py". ' '. $texte . " " . $cle);
        $chiffrement = exec("/usr/bin/python3  dechiffrage.py". ' '. $texte . " " . $cle);
        print_r($chiffrement);
        header("Location: SimFast-Module_Crypto.php?result=$chiffrement");
    }
}

else{
    header("Location: SimFast-Module_Crypto.php");
}
