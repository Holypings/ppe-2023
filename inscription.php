<!DOCTYPE html>
<html lang="en">
<?php
require_once("db.php");

?>

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
if(isset($_POST['submit']))
{

$mail = htmlentities(trim($_POST['mail']));
$mdp = htmlentities(trim($_POST['mdp']));
$conmdp = htmlentities(trim($_POST['conmdp']));
$prenom = htmlentities(trim($_POST['prenom']));
$nom = htmlentities(trim($_POST['nom']));
$adresse = htmlentities(trim($_POST['adresse']));
$dateden = htmlentities(trim($_POST['dateden']));
    if($mail&&$mdp&&$conmdp&&$prenom&&$nom&&$adresse&&$dateden)
    {
        if ($mdp==$conmdp)
        {
            $sql="INSERT INTO user VALUES (null,'" . $nom ."','". $prenom ."','". $mdp ."','". $adresse ."','". $dateden ."','". $mail ."')";
            $result = mysqli_query($conn, $sql);
            
            echo $sql ;
            die();
        
        }else echo "Les deux mots de passe son différent";
    }else echo"Des champs son incomplets";
// aa
}

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
        <input type="password" name="mdp" placeholder="Mot de passe"  /><br>
        <input type="password" name="conmdp" placeholder="Confirmer" /><br>
        <input type="checkbox" name="Aff" />Afficher le mot de passe

    </div>    



        <div id="infopers">
        <h3>VOS INFORMATIONS PERSONNELLES :</h3></div>
        <form action="Inscrire.exe" method="GET">
        <input type="text" name="prenom" placeholder="Prénom" /><br>
        <input type="text" name="nom" placeholder="Nom" /><br>
        <input type="text" name="adresse" placeholder="adresse" /><br>
        <input type="date" name="dateden" placeholder="Votre anniversaire" /><br>
        <input type="checkbox" name="valider"/>J'accepte les conditions<br>

        <input type="submit" value="S'inscrire" name="submit"/>
        <a href="connexion.php" > J'ai déja un compte </a>
        </div>       

    </form>
    </div>

</body>


<footer>
    <?php require_once("footer.php")
    ?>
</footer>
</html>