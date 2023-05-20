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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Accueil</title>
</head>




<body class="body">
    <?php

if (isset($_SESSION['ID'])) {
    include "header connecté.php";
} else {
    include "header.php";}

?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/6.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/7.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/8.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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