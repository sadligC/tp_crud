<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site CRUD</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php
require_once ("../header.php");
require_once ("../fonctions/connection.php");
require_once ("../fonctions/droits_admin.php");

$sql = "SELECT * FROM produit ";
$produits = requete($sql);

$sql = "SELECT * FROM famille ";
$famille = requete($sql);
?>

<table>
    <thead>
        <td>id</td>
        <td>famille</td>
        <td>designation</td>
        <td>prix</td>
        <td>vignette</td>
    </thead>
    <?php
    foreach ($produits as $key => $val){ ?>
    <tr>
        <td><?php echo $val["id"] ?></td>
        <td><?php 
            foreach ($famille as $k => $v){
                if ($val["id_famille"] == $v ["id"]) {
                    echo $v["famille"];
                }
            }   ?>
        </td>
        <td><?php echo $val["designation"] ?></td>
        <td><?php echo $val["prix"] ?></td>
        <td><?php echo $val["vignette"] ?></td>
        <td><a href="modif.php?id=<?php echo $val["id"] ?>"><input type="button" class="btn" value="Modifier"></a></td>
        <td><a href="suppr.php?id=<?php echo $val["id"] ?>"><input type="button" class="btn bleu" value="Supprimer"></a></td>
    </tr><?php
    }
    ?>
    
</table>

<div class="edition">
    <a href="modif.php?id=ajout"><input class="btn bleu" id="ajout" type="button" value="Nouveau produit"></a>
</div>

</body>

</html>