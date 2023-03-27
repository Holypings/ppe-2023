<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <!-- <link rel="shortcut icon" href="logo.jpg" /> -->
    

</head>

<header>
<?php
require_once("header.php")
?>
</header>


<body>
    <div id="titre_principal">
    <h2>CRÉATION DE COMPTE</h2>
    </div>

    <section>
    <div id="idf">
    <h3>VOS IDENTIFIANTS :</h3> </div>
    
    <div id="formu">
    
    
        <table>

            <tr>
                <td><input type="email" name="email" placeholder="Email" required/></td>
            </tr>



            <tr>
                <td><input type="password" name="password" placeholder="Mot de passe" required /></td>
            </tr>
            <td><input type="password" name="password" placeholder="Confirmer" required/></td>

            </tr>

            <tr>

                <td><input type="checkbox" name="Aff" />Afficher le mot de passe</td>
            </tr>


        </table>

    </div>    


</section>

<section>
        <div id="infopers">
        <h2>VOS INFORMATIONS PERSONNELLES :</h2></div>

        <div id="formu2">
        <form action="Inscrire.exe" method="GET">
        <table>
        <tr>
                <td><input type="email" name="email" placeholder="Email" required/></td>
            </tr>
            <td><input type="text" name="prenom" placeholder="Prénom" required/></td>
            </tr>
            <td><input type="text" name="nom" placeholder="Nom"required /></td>
            </tr>
            <td><select name="pays">
                    <option value="FR">France</option>
                    <option value="BLG">Belgique</option>
                    <option value="QBC">Québec</option>
                    <option value="SUI">Suisse</option>
                    
                    
                </select></td>
            </tr>
            <td><input type="date" name="age" placeholder="Votre anniversaire" /></td>
            </tr>
            <td><input type="checkbox" name="valider"/>J'accepte les conditions</td>
            </tr>
            <td><input type="submit" /></td></div>
            </tr>
            
            
            
        </table>
       

    </form>

</section>


</body>
</html>