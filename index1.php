<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site CRUD</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>

<?php
require_once ("header.php");
require_once ("fonctions/debug.php");
require_once ("fonctions/connection.php");

$sql = "SELECT famille.famille, produit.id, produit.designation, produit.prix, produit.vignette FROM produit, famille
WHERE produit.id_famille = famille.id";
$produits = requete ($sql);

if (!empty($_GET["fam"])) { ?>

    <div class="prods">
        <?php foreach ($produits as $key => $val){ 
            if ($val["famille"] === $_GET["fam"]) { ?>
                <div class="fiche">
                    <h2><?php echo $val ["designation"] ?></h2>
                    <img src="images/<?php echo $val ["vignette"] ?>.png" alt="<?php echo $val ["vignette"] ?>">
                    <p><?php echo $val ["prix"] ?> €</p>
                    <a href="pages/panier.php?produit=<?php echo $val ["id"] ?>">Ajouter au panier</a>
                </div><?php
            }
        
    
        } ?>
    </div><?php

} else { ?>

    <div class="diapo">        
        <div class="photo">
            <img class="image image-1" src="images/photo_01.jpg" alt="windsurf">
            <img class="image image-2" src="images/photo_02.jpg" alt="kitesurf" hidden>
            <img class="image image-3" src="images/photo_03.jpg" alt="surfwear" hidden>
        </div>
        <div class="info">Notre gamme</div>
        <div class="slide">
            <div class="gche">&#8249</div>
            <div class="drte">&#8250</div>
        </div>
    </div><?php

}?>

<script>
let i = 2;
let tabSlide = document.querySelectorAll (".image");
let slider = setInterval(() => {
  $(".image").hide();
  $(`.image-${i}`).toggle();
  if (i < tabSlide.length) {
    i ++;
  } else {
    i = 1;
  }
    
}, 4000);
</script>

</body>
</html>