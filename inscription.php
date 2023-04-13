<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <link rel="stylesheet" href="styleinscri.css" />    

</head>

<header>
<?php
require_once("header.php")
?>
</header>

<?php
if(!empty($_POST)){
    if(
        isset($_POST["mail"],$_POST["pwd"],$_POST["conpwd"],$_POST["prenom"],$_POST["nom"],$_POST["lieu"],$_POST["age"])
        && !empty($_POST["mail"]) && !empty($_POST["pwd"]) && !empty($_POST["conpwd"]) && !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["lieu"]) && !empty($_POST["age"])

    ){

    }else{
        die("le formulaire n'est pas complet");
    }
} 

require_once("db.php");

// $prenom = $_POST["prenom"];
// $nom = $_POST["nom"];
// $mail = $_POST["mail"];
// $adresse = $_POST["lieu"];
// $dateden = $_POST["age"];
// $mdp = $_POST["pwd"];

// $sql = "INSERT INTO user VALUES (null,'" . $prenom . "','" . $nom  . "','" . 
//     $mail . "','" . $adresse . "','" . $dateden . "','" . $mdp . "')"; 

?>
<body>
    <div class="centre">
    <div id="titre_principal">
    <h2>CRÉATION DE COMPTE</h2>
    </div>

    <div id="idf">
    <h3>VOS IDENTIFIANTS :</h3> </div>
    
    <div id="formu">
    <!-- action="" -->
    <form method="POST">
        <input type="email" name="mail" placeholder="Email" /> <br>
        <input type="password" name="pwd" placeholder="Mot de passe"  /><br>
        <input type="password" name="conpwd" placeholder="Confirmer" /><br>
        <input type="checkbox" name="Aff" />Afficher le mot de passe

    </div>    



        <div id="infopers">
        <h3>VOS INFORMATIONS PERSONNELLES :</h3></div>
        <form action="Inscrire.exe" method="GET">
        <input type="text" name="prenom" placeholder="Prénom" /><br>
        <input type="text" name="nom" placeholder="Nom" /><br>
        <input type="text" name="lieu" placeholder="adresse" /><br>
        <input type="date" name="age" placeholder="Votre anniversaire" /><br>
        <input type="checkbox" name="valider"/>J'accepte les conditions<br>

        <input type="submit" />
        </div>       

    </form>
    </div>

</body>


<footer>
    <?php require_once("footer.php")
    ?>
</footer>
</html>