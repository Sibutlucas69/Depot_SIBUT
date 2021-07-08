<?php


include('BDD/bddConnector.php');
session_start();


$bdd = new bddConnector("localhost", "enerdis_em111", "root", "");

// On fait une requête pour savoir si le couple mail / mot de passe existe bien car
// le mail est unique !


function verifLogin($bdd,$mail,$password)
{
    $boolean = $bdd->queryLogin($mail,$password);

    $name = $bdd->getName();


    if($boolean == true){
        echo 'Connecté';
        creationSession($name);


        echo "Bienvenue" . $_SESSION['session'];
        header('Location: index.php');


        ?>




<?php

    }else{
        echo 'Erreur dans le mail ou mdp';
        header('Location:identification.php');
        exit;
    }
}



function creationSession($name)
{

    $_SESSION['session'] = $name;




}


?>




<html lang="fr">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>

</head>
<?php

if (isset($_POST['connexion'])) {
    verifLogin($bdd,$_POST["mail"],$_POST['mdp']);
}

?>


<body>

<div>Se connecter</div>

<form method="post" action="identification.php" >

    <label>
        <input type="email" placeholder="Adresse mail" name="mail" value="" required>

    </label>
        <div></div>

    <label>
        <input type="password" placeholder="Mot de passe" name="mdp" value="" required>

    </label>
    <input type="submit" name="connexion">

</form>

</body>
</html>
