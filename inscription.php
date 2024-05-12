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
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">    

</head>

<header>
<?php
require_once("header connecté.php")
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
            echo "<H1>Cet email est déjà enregistré.</H1>";
            header("refresh:2; url=inscription.php");
            
        }

        
        if(strlen($mdp) < 12) {
            echo "<H1>Le mot de passe doit contenir au moins 12 caractères.</H1>";
            header("refresh:2; url=inscription.php");
            
        }
        elseif(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/', $mdp)) {
            echo "<H1>Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.</H1>";
            header("refresh:3; url=inscription.php");
            
        }
        elseif ($mdp != $conmdp) {
            echo "<H1>Les deux mots de passe sont différents.</H1>";
            header("refresh:2; url=inscription.php");
           
        }
       else {
            $sql="INSERT INTO user VALUES (null,'" . $nom ."','". $prenom ."','". $mdp ."','". $adresse ."','". $dateden ."','". $mail ."')";
            $result = mysqli_query($conn, $sql);
            echo "<H1>Envoi effectué.</H1>";
           
        }
    }
    else {
        echo "<H1>Des champs sont incomplets </h1>";
        header("refresh:2; url=inscription.php");
        
    }
}


?>
<body>

<img src="img/inscri formu.png" id = "inscri-formu" width="800" /> 

    
<span class="inscri" id="inscri">Inscription</span>




 
<!-- <p id="idf"> Vos Identifiant : </p> -->
    <!-- action="" -->
    <form id="for" method="POST" onsubmit="return isValidMDP($mdp)">
    <div class="input-container">
            <input type="mail"  name="mail" />
            <label>Email</label>
        </div>
        <div class="input-container">
            <input type="password"  id="mdp" name="mdp"/>
            <label>Mot de passe</label>
        </div>

        
        <div class="input-container">
            <input type="password"  id="conmdp" name="conmdp"/>
            <label>Confirmer</label>
        </div>
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
        
       

       


          
        
        <form action="Inscrire.exe" method="POST">
        <div class="input-container">
            <input type="text"  id="prenom" name="prenom"/>
            <label>Prénom</label>
        </div>
        
        <div class="input-container">
            <input type="text"  id="nom" name="nom"/>
            <label>Nom</label>
        </div>
        <div class="input-container">
            <input type="text"  id="adresse" name="adresse"/>
            <label>Adresse</label>
        </div>
        <div class="input-container">
            <input type="date"  id="dateden" name="dateden"/>
            <label>Votre anniversaire</label>
        </div>
        
        
        <input type="checkbox" id="valid" name="valider"/>J'accepte les conditions<br>
        

        <input type="submit" value="S'inscrire" name="submit"/>


        <br>
       
        <a id="deja" href="connexion.php">Vous avez déjà un compte?</a>

        

    </form>
    </div>

</body>


<footer>
    <?php require_once("footer.php")
    ?>
</footer>
</html>
