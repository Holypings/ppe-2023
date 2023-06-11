<!DOCTYPE html>
<?php
require_once "db.php";
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
   
    <title>Accueil</title>
</head>




<body class="body">
    <?php

if (isset($_SESSION['ID'])) {
    include "header connecté.php";
} else {
    include "header.php";}

?>

<?php
require_once "test carousel.php"
?>


                 <H1 class="incroyable">Nouveaux arrivages </H1>

                <div class="ensemble">
                <?php
$sql = "SELECT * FROM produit";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $id = $row["ID_KB"];
    $nom = $row["nom"];
    $prix = $row["prix"];
    echo "<div class='item'>";
    $prod = "<div class='nom'>" . $nom . "</div>";
    echo "<a href='Article.php?id=" . $id . "'>" . $prod . "</a>";
    echo "<div class='prix'>" . $prix . ' €' . "</div>";
    $img = "img/" . $id . ".png";
    echo "<div class='img'><img src=" . $img . " width = '300' /></div>";
    echo "  <button type='button'>Ajouter au panier</button>";
    echo "</div>";
}
?>
            </div>
        </div>


<H1 class="incroyable">Categories </H1>
 
<img src="img/cat1.png" id = "cat1" width="600" /> 
<img src="img/cat2.png" id = "cat2" width="590" /> 
</body>

<footer>
<?php
require_once "footer.php"
?>
</footer>

</html>