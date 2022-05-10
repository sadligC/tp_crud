<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
require_once ("header.php");
require_once ("fonctions/debug.php");
require_once ("fonctions/connection.php");

$sql = "SELECT famille.famille, produit.designation, produit.prix, produit.vignette FROM produit, famille
WHERE produit.id_famille = famille.id";
$produits = requete ($sql);

if (!empty($_GET["fam"])) { ?>

    <div class="prods">
        <?php foreach ($produits as $key => $val){ 
            if ($val["famille"] === $_GET["fam"]) { ?>
                <div class="fiche">
                    <h2><?php echo $val ["designation"] ?></h2>
                    <img src="images/<?php echo $val ["vignette"] ?>.jpg" alt="<?php echo $val ["vignette"] ?>">
                    <p><?php echo $val ["prix"] ?> €</p>
                </div><?php
            }
        
    
        } ?>
    </div><?php

} ?>

</body>
</html>