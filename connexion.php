<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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

    if($mail&&$mdp&&$conmdp)
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
    <h2>CONNEXION</h2>
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
        <input type="submit" value="Connexion" name="submit"/>

    </div>    

    </form>
    </div>

</body>


<footer>
    <?php require_once("footer.php")
    ?>
</footer>
</html>



    
</body>
</html>