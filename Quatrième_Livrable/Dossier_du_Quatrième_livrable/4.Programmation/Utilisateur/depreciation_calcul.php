<?php
session_start();
if (isset($_POST["amortir"])) {
    if(isset($_POST["montant"]))
        $_SESSION["montant"] = $_POST["montant"];

    if(isset($_POST["duree"]))
        $_SESSION["duree"] = $_POST["duree"];

    if(isset($_POST["date"]))
        $_SESSION["date"] = $_POST["date"];

    if (!empty($_POST["montant"]) && !empty($_POST["duree"]) && !empty($_POST["date"])) {
        if ($_POST["duree"] >= 3) {
            $montant = $_POST['montant'];
            $duree_utilisation = $_POST['duree'];
            $date_debut_utilisation = $_POST['date'];
            $annee = substr($date_debut_utilisation, 0, 4);
            $mois = substr($date_debut_utilisation, 5, 2);
            $jour = substr($date_debut_utilisation, 8, 2);

            //Calcul Amortissement linéaire
            $taux_l = (100 / $duree_utilisation) / 100; // (taux)/100 pour l'avoir en pourcentage
            $prorata_temporis_l = ((12 - $mois) * 30) + (30 - $jour); // (nbrMois x 30 jours) + nbrJour
            $_SESSION["premiere_annuite_l"] = $montant * $taux_l * ($prorata_temporis_l / 360);
            $_SESSION["annuite_pleine_l"] = $montant * $taux_l;
            $_SESSION["derniere_annuite_l"] = $_SESSION["annuite_pleine_l"] - $_SESSION["premiere_annuite_l"];

            // Calcul Amortissement dégressif
            if ($duree_utilisation <= 4)
                $coef = 1.25;
            elseif ($duree_utilisation <= 6)
                $coef = 1.75;
            else
                $coef = 2.25;


            $taux_d = ((100 / $duree_utilisation) * $coef) / 100;
            $prorata_temporis_d = 12 - ($mois - 1);
            $taux_d_l = 100 / ($taux_d * 100);  // On calcul le taux linéaire
            $taux_d_l = substr($taux_d_l, 0, 1); // On récupère le chiffre avant la virgule
            $_SESSION["premiere_annuite_d"] = $montant * $taux_d * ($prorata_temporis_d / 12);
            $_SESSION["annuite_pleine_d"] = $_SESSION["premiere_annuite_d"];
            $_SESSION["derniere_annuite_d"] = $_SESSION["annuite_pleine_d"] - $_SESSION["premiere_annuite_d"];
            $_SESSION["montant_d"] = $montant;
            $_SESSION["taux_d"] = $taux_d;
            $_SESSION["taux_d_l"] = $taux_d_l;

            $_SESSION["amortir"] = true;
            $_SESSION["annee"] = $annee;
            $_SESSION["duree"] = $duree_utilisation;

            header("Location: SimFast-Module_Amortissement");
        }
        else{
            header("Location: SimFast-Module_Amortissement?duree");
            $_SESSION["amortir"] = false;
        }
    } else {
        header("Location: SimFast-Module_Amortissement?vide");
        $_SESSION["amortir"] = false;
    }
}
else{
    header("Location: SimFast-Module_Amortissement");
    $_SESSION["amortir"] = false;
}