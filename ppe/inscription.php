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


<body>
    <div class="centre">
    <div id="titre_principal">
    <h2>CRÉATION DE COMPTE</h2>
    </div>

    <div id="idf">
    <h3>VOS IDENTIFIANTS :</h3> </div>
    
    <div id="formu">
    <form action="" method="get">
        <input type="email" name="mail" placeholder="Email" required/> <br>
        <input type="password" name="pwd" placeholder="Mot de passe" required /><br>
        <input type="password" name="conpwd" placeholder="Confirmer" required/><br>
        <input type="checkbox" name="Aff" />Afficher le mot de passe
        
        </form>

    </div>    



        <div id="infopers"> 
        <h3>VOS INFORMATIONS PERSONNELLES :</h3></div>

        <div id="formu2">
        <form action="Inscrire.exe" method="GET">
        <input type="text" name="prenom" placeholder="Prénom" required/><br>
        <input type="text" name="nom" placeholder="Nom"required /><br>
        <input type="text" name="lieu" placeholder="adresse"required /><br>
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