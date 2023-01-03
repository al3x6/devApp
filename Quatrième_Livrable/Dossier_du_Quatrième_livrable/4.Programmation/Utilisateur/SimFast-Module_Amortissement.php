<?php session_start();
if (isset($_SESSION['login'])) {
    if (isset($_GET['vide'])) {
        $err = "Veuillez remplir tous les champs";
    }
    if (isset($_GET['duree'])) {
        $err = "Veuillez entrer une durée d'au moins 3 ans";
    }
    ?>


    <!Doctype html>
    <html lang="fr">

    <head>

        <title>SimFast - Calcul d'amortissement</title>
        <!-- Titre de la page -->
        <meta charset="utf-8">
        <!-- Permet au navigateur de traduire en une autre langue le site -->
        <meta name="author" content="Antoine Bazire">
        <!-- Nom de l'auteur du site -->
        <link rel="shortcut icon" href="../Images/SimFast_logo.png" type="image/x-icon">
        <!-- Mettre une icon du site (photo dans le répertoire courant et preferable .ico)-->
        <link rel="stylesheet" href="../style.css">

    </head>

    <body>
    <div class="contenu">
        <div class='navigation'>
            <nav>
                <ul>
                    <li><a href='SimFast-Profil.php'>Profil</a></li>
                    <li><a href='../deconnexion.php'>Se déconnecter</a></li>
                </ul>
            </nav>
        </div>

        <div class='modules_navigation'>
            <?php include 'Menu-Utilisateur.php'; ?>
        </div>

        <div class="Titre_module">
            <h3>Calcul d'amortissement</h3>
        </div>
        <div class="Module_Amortissement">

            <div class="Amortissement_content">
                <div class="Amortissement_input">
                    <form action="depreciation_calcul.php" method="post">
                        <table>
                            <tr>
                                <td>Montant à amortir:</td>
                                <td><input class="Amortissement_textfiel_input" type="text" name="montant" value="<?php if(isset($_SESSION["montant"]))echo $_SESSION["montant"]; ?>"></td>
                            </tr>
                            <tr>
                                <td>Durée d'utilisation du bien:</td>
                                <td><input class="Amortissement_textfiel_input" type="text" name="duree" value="<?php if(isset($_SESSION["duree"]))echo $_SESSION["duree"]; ?>"></td>
                            </tr>
                            <tr>
                                <td>Date de début de l'amortissement:</td>
                                <td><input class="Amortissement_textfiel_input" type="date" name="date" value="<?php if(isset($_SESSION["date"]))echo $_SESSION["date"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="amortir" value="amortir"></td>
                            </tr>
                        </table>
                        <p class="error"><?php if (isset($err)) echo $err; ?></p>
                    </form>
                </div>

                <div class="Amortissement_output">
                    <!--Partie amortissement linéaire  -->
                    <?php if (isset($_SESSION["amortir"]) && $_SESSION["amortir"]){ ?>
                    <table>
                        <tr>
                            <th>Année</th>
                            <th>Linéaire</th>
                        </tr>

                        <?php for ($i = 0; $i <= $_SESSION["duree"]; $i++) {
                            if ($i < 1) {
                                ?>
                                <tr>
                                    <td><?= $_SESSION["annee"] ?></td>
                                    <td><?= number_format($_SESSION["premiere_annuite_l"], 2) ?></td>
                                </tr>

                            <?php } elseif ($i == $_SESSION["duree"]) { ?>
                                <tr>
                                    <td><?= $_SESSION["annee"] + $i ?></td>
                                    <td><?= number_format($_SESSION["derniere_annuite_l"], 2)?></td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?= $_SESSION["annee"] + $i ?></td>
                                    <td><?= number_format($_SESSION["annuite_pleine_l"], 2) ?></td>
                                </tr>
                            <?php }
                        }
                        } ?>

                    </table>

                    <!--Partie amortissement dégressif  -->
                    <?php if (isset($_SESSION["amortir"]) && $_SESSION["amortir"]){?>
                    <table>
                        <tr>
                            <th>Dégressif</th>
                        </tr>
                        <?php for ($i = 0; $i <= $_SESSION["duree"]; $i++) {
                            if ($i < 1) {?>
                                <tr>
                                    <td><?= number_format($_SESSION["premiere_annuite_d"], 2) ?></td>
                                </tr>

                            <?php } elseif ($i >= $_SESSION["duree"]) { ?>
                                <tr>
                                    <td><?= 0 ?></td>
                                </tr>

                            <?php } elseif ($i >= $_SESSION["duree"] - $_SESSION["taux_d_l"]) {?>
                                <tr>
                                    <?php $a = $_SESSION["montant_d"] - $_SESSION["annuite_pleine_d"] ;
                                    ?>
                                    <td><?= number_format($a / 2, 2) ?></td>
                                </tr>

                            <?php } else { ?>
                                <tr> <?php $_SESSION["montant_d"] = $_SESSION["montant_d"] - $_SESSION["annuite_pleine_d"];
                                           $_SESSION["annuite_pleine_d"] = $_SESSION["montant_d"] * $_SESSION["taux_d"];
                                           ?>
                                    <td><?= number_format($_SESSION["annuite_pleine_d"], 2) ?></td>
                                </tr>
                            <?php }

                        }
                        } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <footer>
        <?php include '../Footer.php'; ?>
    </footer>
    </body>

    </html>
<?php } else {
    header('Location: ../SimFast-Accueil_utilisateur.php');
}