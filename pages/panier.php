<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
require_once ("../fonctions/debug.php");
session_start ();

if (!isset($_SESSION ["role"])) {
    header ('Location: signin.php');
} else {
    if (!isset ($_SESSION ["panier"])){
        $_SESSION ["panier"] = [];
    }
    array_push ($_SESSION ["panier"], $_GET ["produit"]);
    debug ($_SESSION );
     ?>

<a href="../fonctions/valider_panier.php"><input type="button" class="btn" value="Valider le panier"></a><?php
    
}

?>

</body>
</html>