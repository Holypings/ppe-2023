<!DOCTYPE html>
<?php
    require_once("db.php");
    session_start()
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" />
    <title>Article</title>
</head>




<body class="body">
    <?php
    require_once("header.php")
    ?>
    <?php
        GET 
        $sql = "SELECT * FROM produit"
    ?>
</body>

<footer>
<?php
require_once("footer.php")
?>
</footer>

</html>