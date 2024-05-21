<?php
require_once "header connecté.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        .imgpa {
            width: 250px;
            
        }
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style> <link rel="stylesheet" href="panier.css" />
</head>
<body>
    <h1>Votre Panier</h1>
    <div id="products">
    <?php
    require_once 'db.php';

    session_start();
    


    if (isset($_SESSION['ID'])) {
        $userId = $_SESSION['ID'];
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
            $product_id = $_POST['product_id'];
            mysqli_query($conn, "DELETE FROM panier WHERE ID_USER = $userId AND ID_KB = $product_id");
            echo "<p style='color: green;'>Le produit a été supprimé du panier.</p>";
        }
        $sql = "SELECT ID_KB, Quantite FROM panier WHERE ID_USER = $userId";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        $prixb = 0;
        ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom de l'article</th>
                    <th>Prix de l'article</th>
                    <th>Quantité(s)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $test = $row["ID_KB"];
                    $sql2 = "SELECT nom, prix, promo FROM produit WHERE ID_KB = $test";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($result2);
                    $img = "img/" . $test . ".png";
                    $nom = $row2["nom"];
                    $prix = $row2["prix"];
                    $promo = $row2["promo"];
                    $quantite = $row["Quantite"];
                    $prixa = $prix * $quantite;
                    $prixb += $prixa;
                    if ($promo !== null){
                        $prix = $prix * ($promo / 100);
                    }
                ?>
                    <tr>
                        <td><img src="<?php echo $img; ?>" class="imgpa"/></td>
                        <td><?php echo $nom ?></td>
                        <td>
                            <?php 
                                if ($promo !== null){
                                    echo $prix . " € -25%";
                                }else{
                                    echo $prix . " €";
                                } 
                            ?>
                        </td>
                        <td><?php echo $quantite; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $test; ?>">
                                <button type="submit" name="delete_product">Supprimer</button>
                            </form>
                        </td>
                    </tr>
        <?php   }   ?>
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>TOTAL :</strong></td>
                        <td> <h3><?php echo $prixb . " €"; ?></h3></td>
                        <td></td>
                    </tr>
            </tbody>
        </table>
    <br>
    <button onclick="location.href='achat.php'">Commander</button>

        <?php           
        } else {
            echo 'Votre panier est vide.';
        }
    }

        // ferme connexion à la base de données
    mysqli_close($conn);
        ?>
    </div>
</body>
</html>
