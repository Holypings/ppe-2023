<?php
require_once "db.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css" />
   
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>


<header>

    <?php
    if (isset($_SESSION['ID'])) {
        include "header connecté.php";
    } else {
        include "header.php";}
    ?>

</header>

<?php
require_once "db.php";
?>

<?php

if (isset($_POST['submit'])) {

    $mail = htmlentities(trim($_POST['mail']));
    $mdp = htmlentities(trim($_POST['mdp']));

    $sql = "SELECT * FROM user WHERE mail='$mail' AND mdp='$mdp'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    if ($row == null) {

        echo "<H1>Identifiants incorrect </h1>";
        header("refresh:3; url=connexion.php");

    } else {
        $id = $row["ID_USER"];
        echo $id;

        $_SESSION["ID"] = $id;
        header("Location: index.php");
    }
}




// Fermez la connexion à la base de données MySQL
$conn->close();

?>

<body>

<img src="img/connexion formu.png" id = "co-formu" width="800" /> 

<span class="text-center" id="titre principal">Connexion</span>

<div class="box">
    <form id= "fo" method="POST">
        <div class="input-container">
            <input type="mail"  name="mail" />
            <label>Email</label>
        </div>



        <div class="input-container">
            <input type="password"  id="mdp" name="mdp"/>
            <label>Mot de passe</label>
        </div>

        
            <input type="checkbox" id="showPassword" name="mdp" />
            <label for="showPassword">Afficher mot de passe</label>
        

        <div class="boutons">
             <input type="submit" value="Connexion" name="submit"/>
        </div>
        <input type="button" onclick="window.location.href = 'deconnexion.php';" value="Deconnexion" />
        


    <!-- afficher mdp avec checkbox -->
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

<?php 
require_once "footer.php"
?>

</footer>
</html>





</html>