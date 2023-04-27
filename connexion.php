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



// Récupération des informations de connexion du formulaire
$mail = htmlentities(trim($_POST['mail']));
$mdp = htmlentities(trim($_POST['mdp']));

// Vérification des informations de connexion dans la base de données
$sql = "SELECT * FROM user WHERE mail='$mail' AND mdp='$mdp'";
$result = $conn->query($conn, $sql);

if ($result->num_rows > 0) {
    echo "Vous êtes connecté avec succès.";
} else {
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}



?>
<body>
    <div class="centre">
    <div id="titre_principal">
    <h2>CONNEXION</h2>
    </div>

    <div id="iden">
    <h3>VOS IDENTIFIANTS :</h3> </div>
    
    
    <!-- action="" -->
    <form name= "fo" method="POST">
        <div class="input">
        <input type="email" name="mail" placeholder="Email" /> 
        </div>
        
        <div class="input">
        
<input type="password" name="mot de passe" placeholder="Mot de passe" id="mdp" /> <br>
<input type="checkbox" id="showPassword" name="Mot de passe" />
<label for="showPassword">Afficher mot de passe</label>
        </div>
        <input type="submit" value="Connexion" name="submit"/>


    </form>
    <script>
        document.getElementById('showPassword').onclick = function() {
    if ( this.checked ) {
       document.getElementById('mdp').type = "text";
    } else {
       document.getElementById('mdp').type = "password";
    }
};
  
    </script>
    
    

</body>


<footer>
    <?php require_once("footer.php")
    ?>
</footer>
</html>



    
</body>
</html>