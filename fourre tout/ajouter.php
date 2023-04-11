<?php
require_once("db.php");

$prenom = $_GET["prenom"];
$nom = $_GET["nom"];
$mail = $_GET["mail"];
$adresse = $_GET["adresse"]
$naissance = $_GET["age"];

$sql = "INSERT INTO user VALUES (null,'" . $prenom . "','" . $nom  . "','" . 
    $mail . "','" . $adresse . "','" . $naissance . "')";    

$result = mysqli_query($conn, $sql);
    
header("Location: user.php");

