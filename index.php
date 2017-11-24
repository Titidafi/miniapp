<?php

include("config/config.php");
include("config/bd.php"); // commentaire
include("divers/balises.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées


?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Livre de têtes</title>

        <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!--<link href="./css/ie10.css" rel="stylesheet">-->


        <!-- Ma feuille de style à moi -->
        <link href="css/style.css" rel="stylesheet">

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>



</head>

<body>
    <div id="container">
        <?php
        if (isset($_SESSION['info'])) {
            echo "<div class='alert alert-info alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>
            <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
            unset($_SESSION['info']);
        }
        ?>


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Livre de têtes</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="
                    <?php
                    if(isset($_GET['action'])) {
                        if ($_GET['action'] == 'accueil') {
                            echo 'active';
                        } else {
                        }
                    }else{
                        echo 'active';
                    }
                    ?>">
                        <a href="./">Accueil</a></li>
                    <?php
                    if(isset($_SESSION["id"])&&isset($_SESSION["login"])){
                       echo "<li class=' ";
                       echo activeLink("invitations");
                       echo  "'><a href='invitations'>Invitations</a> </li>";
                    }
                    ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
                    <?php
                    if (isset($_SESSION['id']) && isset($_SESSION['login'])) {
                        echo "<li><a  href='#'>Bonjour " . $_SESSION['login'] . " !</a></li>";
                        echo "<li><a href='index.php?action=deconnexion'>Deconnexion</a></li>";
                    } else {
                        echo "<li><a href='login'>Connexion</a></li>";
                        echo "<li><a href='index.php?action=creationCompte'>Créer un compte</a></li>";

                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div id="contenu">
        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->

                    <?php

                    // Quelle est l'action à faire ?
                    if (isset($_GET["action"])) {
                        $action = $_GET["action"];
                        if ($action=="profil" && isset($_GET['action']) && is_numeric($_GET['action'])){

                        }
                    } else {
                        $action = "accueil";
                    }

                    // Est ce que cette action existe dans la liste des actions
                    if (array_key_exists($action, $listeDesActions) == false) {
                        include("vues/404.php"); // NON : page 404
                    } else {
                        if ($action=="profil" && isset($_GET['id'])){
                           include($listeDesActions[$action]);
                        }else{
                            if ($action!="profil" && isset($action)){
                                include($listeDesActions[$action]); // Oui, on la charge
                            }else{
                                header("location:/");
                            }
                        }

                    }
                    if(isset($_SESSION["id"])&& isset($_SESSION["login"])&& $action!="profil") {
                        include('coleft.php');
                    }
                    ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
                    ?>


            </div>
        </div>
        </div>

    </div>
    <footer>Le pied de page</footer>
    <script src="js/script.js"></script>
</body>
</html>
