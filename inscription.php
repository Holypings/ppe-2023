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

    if($mail && $mdp && $conmdp && $prenom && $nom && $adresse && $dateden)
    {
        // Vérification du mot de passe
        $sql = "SELECT * FROM user WHERE mail='$mail'";
        $result1 = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result1) > 0){
            echo "Cet email est déjà enregistré.";
            die();
        }

        
        if(strlen($mdp) < 12) {
            echo "Le mot de passe doit contenir au moins 12 caractères.";
            die();
        }
        elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/', $mdp)) {
            echo "Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
            die();
        }
        elseif ($mdp != $conmdp) {
            echo "Les deux mots de passe sont différents.";
            die();
        }
       else {
            $sql="INSERT INTO user VALUES (null,'" . $nom ."','". $prenom ."','". $mdp ."','". $adresse ."','". $dateden ."','". $mail ."')";
            $result = mysqli_query($conn, $sql);
            echo "Envoi effectué.";
            die();
        }
    }
    else {
        echo "Des champs sont incomplets.";
        die();
    }
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
    <form method="POST" onsubmit="return isValidMDP($mdp)">
        <input type="email" name="mail" placeholder="Email" /> <br>
        <input type="password" id ="mdp"name="mdp" placeholder="Mot de passe"  /><br>

        <input type="password"id ="conmdp" name="conmdp" placeholder="Confirmer" /><br>
        <input type="checkbox" id="showPassword" name="Mot de passe" />
        <label for="showPassword">Afficher mot de passe</label>
        
        <script>
        document.getElementById('showPassword').onclick = function() {
    if ( this.checked ) {
       document.getElementById('mdp').type = "text";
       document.getElementById('conmdp').type = "text";
    } else {
       document.getElementById('mdp').type = "password";
       document.getElementById('conmdp').type = "password";
    }
};
  
    </script>
        
       

    </div>    



        <div id="infopers">
        <h3>VOS INFORMATIONS PERSONNELLES :</h3></div>
        <form action="Inscrire.exe" method="POST">
        <input type="text" name="prenom" placeholder="Prénom" /><br>
        <input type="text" name="nom" placeholder="Nom" /><br>
        <input type="text" name="adresse" placeholder="adresse" /><br>
        <input type="date" name="dateden" placeholder="Votre anniversaire" /><br>
        <input type="checkbox" name="valider"/>J'accepte les conditions<br>

        <input type="submit" value="S'inscrire" name="submit"/>
        <br>
        <a href="connexion.php">Vous avez déjà un compte?</a>
        </div>       

    </form>
    </div>

</body>


<footer>
    <?php require_once("footer.php")
    ?>
</footer>
</html>