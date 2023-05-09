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
    <title>Accueil</title>
</head>




<body class="body">
    <?php

if (isset($_SESSION['ID'])) {
    include "header connecté.php";
} else {
    include "header.php";}

?>

       <!-- <div>

            <img src="img/test3.png">
            <div class="chevau"> -->
                <H1 class="incroyable">Nouveaux arrivage </H1> </div>

                <div class="carousel">
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
    echo "</div>";
}
?>
            </div>
        </div>

    </section>

</body>

<footer>
<?php
require_once "footer.php"
?>
</footer>

</html>