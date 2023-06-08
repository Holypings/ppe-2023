<?php
require_once "db.php";
session_start();

?>
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
    <div class="centre">
    <div id="titre_principal">
    <h2>CONNEXION</h2>
    </div>

    <div id="iden">
    <h3>VOS IDENTIFIANTS :</h3> </div>


    <!-- action="" -->
    <form name= "fo" method="POST">
        <div class="input">
        <input type="email" name="mail" placeholder="Mail" />
        </div>

        <div class="input">

        <input type="password" name="mdp" placeholder="Mot de passe" id="mdp" /> <br>
        <input type="checkbox" id="showPassword" name="mdp" />
        <label for="showPassword">Afficher mot de passe</label>
        </div>
        <input type="submit" value="Connexion" name="submit"/>

        <a href="deconnexion.php">Déconnexion</a>

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
    <?php require_once "footer.php"
?>
</footer>
</html>




</body>
</html>