<!DOCTYPE html>
<html lang="en">
<?php
require_once "db.php";
session_start();

?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/article.css" />
    <title>recherche</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
</head>

<body>
<div>
    <?php
            include "header connecté.php";
    ?>
</div>
<div>
<form action="recherche.php" method="post">
        <label for="nom">Nom du Produit:</label>
        <input type="text" name="nom" id="nom">

        <label for="prix">Prix supérieur à:</label>
        <select name="prix" id="prix">
                <option value="0">----------</option>
                <option value="30">20</option>
                <option value="70">50</option>
                <option value="150">100</option>
                <option value="250">250</option>
                <option value="300">400</option>
        </select>

        <label for="cable">Cable :</label>
        <select name="cable" id="cable">
                <option value="0">----------</option>
                <option value="0">Non</option>
                <option value="1">Oui</option>
        </select>

        <label for="paveNum">Pavé numérique :</label>
        <select name="paveNum" id="paveNum">
                <option value="0">----------</option>
                <option value="0">Non</option>
                <option value="1">Oui</option>
        </select>

        <label for="RGB">RGB :</label>
        <select name="RGB" id="RGB">
                <option value="0">----------</option>
                <option value="0">Non</option>
                <option value="1">Oui</option>
        </select>

            <input type="submit" value="Rechercher">
        </form>
</div>

<div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$paveNum = $_POST['paveNum'];
$cable = $_POST['cable'];
$RGB = $_POST['RGB'];

$sql = "SELECT * FROM produit WHERE 1=1";

if (!empty($nom)) {
    $sql .= " AND nom LIKE '%$nom%'";
}

if ($prix > 0) {
    $sql .= " AND prix > $prix";
}

if ($paveNum > 0) {
    $sql .= " AND paveNum = $paveNum";
}

if ($cable > 0) {
    $sql .= " AND cable = $cable";
}

if ($RGB > 0) {
    $sql .= " AND RGB = $RGB";
}

$resultat = $conn->query($sql);

if ($resultat->num_rows > 0) {
    while ($row = $resultat->fetch_assoc()) {
        echo "<a href='Article.php?id=" . $row['ID_KB'] . "'><img src=img/" . $row['ID_KB'] . ".png width = '300' height = '300' />Nom :" . $row['nom'] . " | Prix: " . $row['prix'] . " | Taille: " . $row['taille'] . "<br><margin-top= 5px/a>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

$conn->close();
}
?>

    

    </body>
    </html>

    </div>
</div>



</body>


</html>
<?php
require_once "footer.php"
?>
