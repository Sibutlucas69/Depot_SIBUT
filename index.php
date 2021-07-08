<?php



include('BDD/bddConnector.php');



?>
<!DOCTYPE html>
<html lang="fr" xmlns:visibility="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css"/>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" id="acceuil" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-md-auto">

            <?php
            if (!isset($_SESSION['id'])){}
            ?>

            <?php
            //  }else{
            ?>
            <li class="nav-item">
                <a class="nav-link" href="client.php"></a>
            </li>
            <?php
            //}
            ?>
        </ul>

        <ul class="navbar-nav ml-md-auto">

            <?php
            // if(!isset($_SESSION['id'])){
            ?>


            <?php
            //  }else{

            ?>
            <li class="nav-item">
                <a class="nav-link" style="visibility: hidden" href="logout.php">Se déconnecter </a>
            </li>
            <li class="nav-item">


                <?php
                if (!isset($_SESSION['session'])) {
                    echo '<a class="nav-link" id="connect" href="identification.php">Connexion</a>';
                }else{
                    echo '<a class="nav-link" href="logout.php">Se déconnecter </a>';
                }


                ?>


            </li>
            <li class="nav-item">
                <a class="nav-link" id="inscript" href="register.php">Inscription</a>
            </li>

            <?php
            //}
            ?>
        </ul>
    </div>
</nav>

<img src="img/indexphoto_modif.jpg" class="imgacceuil" height="1080px" width="1920px" style=>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
</html>