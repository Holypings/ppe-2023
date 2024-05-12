<?php
require_once "db.php";
require_once "header connecté.php";
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/achat.css" />
  <title>Achat</title>
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Phase d'achat</h2>
      
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $card_number = $_POST['card_number'];
        $card_name = $_POST['card_name'];
        $expiration_date = $_POST['expiration_date'];
        $cvv = $_POST['cvv'];

        if (empty($card_number) || empty($card_name) || empty($expiration_date) || empty($cvv)) {
          echo "<p style='color: red;'>Veuillez remplir tous les champs.</p>";
        } elseif (!preg_match('/^\d{16}$/', $card_number)) {
          echo "<p style='color: red;'>Le numéro de carte doit contenir 16 chiffres.</p>";
        } elseif (!preg_match('/^[a-zA-Z]+$/', $card_name)) {
          echo "<p style='color: red;'>Le nom du titulaire de la carte ne doit contenir que des lettres.</p>";
        } elseif (!preg_match('/^(0[1-9]|1[0-2])\/(2[3-6])$/', $expiration_date)) {
          echo "<p style='color: red;'>Le format de la date d'expiration doit être MM/YY et être compris entre 01/23 et 12/26.</p>";
        } elseif (!preg_match('/^\d{3}$/', $cvv)) {
          echo "<p style='color: red;'>Le CVV doit contenir exactement 3 chiffres.</p>";
        } else {
          echo "<p style='color: green;'>Merci de votre achat !</p>";
         
          header("Refresh: 2; URL=index.php");
          die();
        }
      }
      ?>
      
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="card_number">Numéro de carte :</label>
        <input type="text" id="card_number" name="card_number" pattern="\d{16}" title="Le numéro de carte doit contenir 16 chiffres" required>
        
        <label for="card_name">Nom du titulaire de la carte :</label>
        <input type="text" id="card_name" name="card_name" pattern="^[^\d]+$" title="Le nom doit contenir uniquement des lettres" required>
        
        <label for="expiration_date">Date d'expiration (MM/YY) :</label>
        <input type="text" id="expiration_date" name="expiration_date" pattern="^(0[1-9]|1[0-2])\/(2[3-6])$" title="Le format de la date d'expiration doit être MM/YY et être compris entre 01/23 et 12/26" required>
        
        <label for="cvv">CVV (3 chiffres) :</label>
        <input type="text" id="cvv" name="cvv" pattern="\d{3}" title="Le CVV doit contenir exactement 3 chiffres" required>
        
        <input type="submit" value="Valider le paiement">
      </form>
    </div>
  </div>

</body>
</html>
<?php
require_once "footer.php";
?>
