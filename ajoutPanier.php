<html>

<?php
require_once "db.php";
session_start();

?>

<body>


<?php
    
    if (isset($_SESSION['ID'])) {

        $iduser = $_SESSION['ID'];
        $idarticle = $_GET['prod'];
        $quant = $_GET['quant'];

        echo $iduser;
        echo $idproduct;
        echo $quant;

        $sql = "INSERT INTO `panier` (`ID_PANIER`, `Quantite`, `ID_USER`, `ID_KB`) VALUES (NULL, ".$quant.", ".$iduser.", ".$idarticle.") ";
        mysqli_query($conn,$sql);

        header('Location: panier.php');

    } else {
        header('Location: inscription.php');
    }
?>
    


</body>
</html>