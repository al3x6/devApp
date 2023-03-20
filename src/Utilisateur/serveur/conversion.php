<?php
session_start();
include '../../Config/database.php';
global $db;


if(isset($_POST["convertir"])){
    $updatemot_dernier_module = $db->prepare("UPDATE utilisateur SET dernier_module = ? where login=?");
    $updatemot_dernier_module->execute(array("Informatique", $_SESSION['login']));

    $choix1= $_POST["choix_conversion1"];
    $choix2= $_POST["choix_conversion2"];
    $valeur = $_POST["output_val"];

    $_SESSION["choix1"] = $choix1;
    $_SESSION["choix2"] = $choix2;
    $_SESSION["valeur"] = $valeur;

    if($choix1 == "binaire"){ /* On convertit si c'est du binaire qu'on a */
        if(is_numeric($valeur)){
            for($i =0; $i < strlen($valeur); $i++){
                if($valeur[$i] != "0" && $valeur[$i] != "1"){
                    header("Location: ../SimFast-Module_Conversion.php?binaire");
                }
            }

            if($choix2 == "decimal"){
                $conversion = bindec($valeur);
                header("Location: ../SimFast-Module_Conversion.php?conversion=$conversion");
            }
            elseif ($choix2 == "hexadecimal"){
                $conversion = bindec($valeur);
                $conversion = dechex($conversion);
                header("Location: ../SimFast-Module_Conversion.php?conversion=$conversion");
            }
            else{
                header("Location: ../SimFast-Module_Conversion.php?numerotation"); /* meme numerotation */
            }
        }
        else
            header("Location: ../SimFast-Module_Conversion.php?binaire"); /* Pas du binaire */
    }

    else if ($choix1 == "decimal"){
        if(is_numeric($valeur)){
            if($choix2 == "binaire"){
                $conversion = decbin($valeur);
                header("Location: ../SimFast-Module_Conversion.php?conversion=$conversion");
            }
            elseif ($choix2 == "hexadecimal"){
                $conversion = dechex($valeur);
                header("Location: ../SimFast-Module_Conversion.php?conversion=$conversion");
            }
            else{
                header("Location: ../SimFast-Module_Conversion.php?numerotation"); /* meme numerotation */
            }
        }
        else
            header("Location: ../SimFast-Module_Conversion.php?decimal"); /* Pas du decimal */
    }

    elseif ($choix1 == "hexadecimal"){
        if($choix2 == "binaire"){
            $conversion = hexdec($valeur);
            $conversion = decbin($conversion);
            header("Location: ../SimFast-Module_Conversion.php?conversion=$conversion");
        }
        elseif ($choix2 == "decimal"){
            $conversion = hexdec($valeur);
            header("Location: ../SimFast-Module_Conversion.php?conversion=$conversion");
        }
        else{
            header("Location: ../SimFast-Module_Conversion.php?numerotation"); /* meme numerotation */
        }
    }
}
else
    header("Location: ../SimFast-Module_Conversion.php"); /* rien a faire sur cette page*/
?>