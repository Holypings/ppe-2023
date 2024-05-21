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
    <title>Article</title>
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


<?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }
    else{
        $id=1;
    };
    $img = "img/" . $id . ".png";
    echo "<img src=" . $img . " class = 'img'/>";
    
?>


<div class="product">
    <?php
        
        try {
            if (!isset($_GET["id"]) || empty($_GET["id"])) {
                throw new Exception("ID vide");
            }
            $id = $_GET["id"];
        } catch (Exception $errid) {
            header('Location: index.php');
        }
        
        
        $sql = "SELECT nom, prix, description, paveNum, taille, cable,RGB , ID_COULEUR,ID_COULED , ID_SWITCH, promo FROM produit WHERE ID_KB = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $nom = $row["nom"];
        $prix = $row["prix"];
        $desc = $row["description"];
        $paveNum = $row["paveNum"];
        $taille = $row["taille"];
        $cable = $row["cable"];
        $RGB = $row["RGB"];
        $coulmem = $row["ID_COULEUR"];
        $ledmem = $row["ID_COULED"];
        $switchmem = $row["ID_SWITCH"];
        $promo = $row["promo"];
        $prixmem = $prix;

        $sql1 = "SELECT couleurkb FROM couleurkb WHERE ID_COULEUR = $coulmem";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $couleur = $row1["couleurkb"];

        $sql2 = "SELECT couleurled FROM couleurled WHERE ID_COULED = $ledmem";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($result2);
        $led = $row2["couleurled"];

        $sql3 = "SELECT modele, Fabriquant, couleur FROM switch WHERE ID_SWITCH = $switchmem";
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_array($result3);
        $switchmod =$row3["modele"];
        $switchfab =$row3["Fabriquant"];
        $switchcoul =$row3["couleur"];

        echo "<div class='nom'>" . $nom . "</div>";
        
        echo "<div class='description'>" . $desc . "</div>";
    
        if ($paveNum == 1){
            echo "<div class='paveNum'> Pavé Numérique : Oui </div>";
        }
        else{
            echo "<div class='paveNum'> Pavé Numérique : Non </div>";
        }

        if ($cable == 1){
            echo "<div class='cable'> Cablé : Oui </div>";
        }
        else{
            echo "<div class='cable'> Cablé : Non </div>";
        }

        echo "<div class='RGB'> RGB :" . $RGB . " </div>";
        echo "<div class='taille'> Taille : " . $taille . "</div>";
        echo "<div class='couleur'> Couleur : " . $couleur . "</div>";
        echo "<div class='led'>Led : " . $led . "</div>";
        echo "<div class='switch'> Switch : " . $switchmod ." ". $switchcoul ." ". $switchfab . "</div>";


        if ($promo == null) {
            echo "<div class='prix'>" . $prix . ' €' . "</div>";
        } else {
            $prixmem = $prix;
            $prix = $prix * (1 - ($promo / 100));
        
            echo "<div class='prix'> prix normal: " . $prixmem . '€' . "</div>";
            echo "<div class='prix'> " . $prix . '€ - ' . $promo . '%' . "</div>";
        }
        
    ?>
    

    <div class='formPanier'>
    <?php
        if(isset($_GET["id"])){
            $id=$_GET["id"];
        }
        else{
            $id=1;
        };
        echo "
            <form action='ajoutPanier.php'>
                <input id='prod' name='prod' type='hidden' value=".$id.">
                <label class='selectQuant' for='quant'>Quantitée : </label>
                <select id='quant' name='quant'>
                    <option value= '1'> 1 </option>
                    <option value= '2'> 2 </option>
                    <option value= '3'> 3 </option>
                    <option value= '4'> 4 </option>
                    <option value= '5'> 5 </option>
                </select>
                <input class='ajoutPanier' type='submit' value='Ajouter au panier'>
            </form>";
    ?>    
    </div>
</div>



</body>


</html>

<?php
require_once "footer.php"
?>
