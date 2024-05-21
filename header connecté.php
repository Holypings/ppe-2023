<!DOCTYPE html>
<?php require_once("db.php"); ?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="logo couleur.png" />
</head>

<header>
<div id="logob">
    <a href="index.php"><img src="img/logo contour blanc.png" width="130" /></a>
</div>
<div id="recherche">
    <a href="recherche.php"> <img src="img/search.png" width="50" /></a>  
</div>
<?php if (isset($_SESSION['ID'])) { ?>
    <div id="panier">
        <a href="panier.php"> <img src="img/panier.png" width="50" /></a> 
    </div>
<?php }else{ ?>
    <div id="panier">   
        <a><img src="img/panier.png" title="Vous devez être connecté" width="50"/></a>
    </div>
<?php }  ?>
<?php if (isset($_SESSION['ID'])) { ?>
    <div id="exit">
        <a href="deconnexion.php"> <img src="img/exit.png" width="70" /></a>
    </div>
<?php } ?>
<div id="user">
    <a href="connexion.php"> <img src="img/user.png" width="60"></a>
</div>
</header>
