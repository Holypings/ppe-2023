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
require_once("header connecté.php");
?>
</header>

<?php
function isValidMDP($mdp) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/', $mdp);
}

if(isset($_POST['submit'])){
    $mail = htmlentities(trim($_POST['mail']));
    $mdp = htmlentities(trim($_POST['mdp']));
    $conmdp = htmlentities(trim($_POST['conmdp']));
    $prenom = htmlentities(trim($_POST['prenom']));
    $nom = htmlentities(trim($_POST['nom']));
    $adresse = htmlentities(trim($_POST['adresse']));
    $dateden = htmlentities(trim($_POST['dateden']));

    if($mail && $mdp && $conmdp && $prenom && $nom && $adresse && $dateden){

        $sql = "SELECT * FROM user WHERE mail='$mail'";
        $result1 = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result1) > 0){
            echo "<h1>Cet email est déjà enregistré.</h1>";
            header("refresh:2; url=inscription.php");
            exit();
        }

        if (!isValidMDP($mdp)) {
            echo "<h1>Le mot de passe n'est pas valide.</h1>";
            header("refresh:2; url=inscription.php");
            exit();
        }

        $sql = "INSERT INTO user VALUES (null, '$nom', '$prenom', '$mdp', '$dateden', '$adresse' , '$mail', 1)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<h1>Envoi effectué.</h1>";
        } else {
            echo "<h1>Erreur lors de l'enregistrement: " . mysqli_error($conn) . "</h1>";
        }
    } else {
        echo "<h1>Des champs sont incomplets.</h1>";
        header("refresh:2; url=inscription.php");
    }
}
?>

<body>
    <img src="img/inscri formu.png" id="inscri-formu" width="800" /> 
    <span class="inscri" id="inscri">Inscription</span>

    <form id="for" method="POST" action="inscription.php" onsubmit="return verifMDP()">

        <div class="input-container">
            <input type="mail" name="mail" />
            <label>Email</label>
        </div>

        <div class="input-container">
            <input type="password" id="mdp" name="mdp"/>
            <label>Mot de passe</label>
        </div>

        <div class="input-container">
            <input type="password" id="conmdp" name="conmdp"/>
            <label>Confirmer</label>
        </div>

        <input type="checkbox" id="showPassword" name="showPassword" />
        <label for="showPassword">Afficher mot de passe</label>

        <script>
            document.getElementById('showPassword').onclick = function() {
                if (this.checked) {
                    document.getElementById('mdp').type = "text";
                    document.getElementById('conmdp').type = "text";
                } else {
                    document.getElementById('mdp').type = "password";
                    document.getElementById('conmdp').type = "password";
                }
            }

            function verifMDP() {
                const mdp = document.getElementById('mdp').value;
                const conmdp = document.getElementById('conmdp').value;
                const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/;

                if (!regex.test(mdp)) {
                    alert("Le mot de passe doit contenir au moins 12 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.");
                    return false;
                }

                if (mdp !== conmdp) {
                    alert("Les deux mots de passe sont différents.");
                    return false;
                }

                return true;
            }
        </script>

        <div class="input-container">
            <input type="text" id="prenom" name="prenom"/>
            <label>Prénom</label>
        </div>

        <div class="input-container">
            <input type="text" id="nom" name="nom"/>
            <label>Nom</label>
        </div>

        <div class="input-container">
            <input type="text" id="adresse" name="adresse"/>
            <label>Adresse</label>
        </div>

        <div class="input-container">
            <input type="date" id="dateden" name="dateden"/>
            <label>Votre anniversaire</label>
        </div>

        <input type="checkbox" id="valid" name="valider"/>J'accepte les conditions<br>

        <input type="submit" value="S'inscrire" name="submit"/>

        <br>

        <a id="deja" href="connexion.php">Vous avez déjà un compte?</a>

    </form>

</body>

<footer>
    <?php require_once("footer.php"); ?>
</footer>
</html>
