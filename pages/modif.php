<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site CRUD</title>
    <link rel="stylesheet" href="../style.css">
</head>

<?php
    require_once("../header.php");
    require_once ("../fonctions/connection.php");
    require_once ("../fonctions/droits_admin.php");

    $id_produit = $_GET ["id"];

    if ($id_produit === "ajout") {
        $produit = [
            "id" => "new_id",
            "id_famille" => "",
            "designation" => "",
            "prix" => "",
            "vignette" => ""
        ];
        $action = "Ajouter";
    } else {
        $sql = "SELECT * FROM produit WHERE produit.id = $id_produit";
        $stmt =connection () -> prepare ($sql);
        $stmt -> execute ();
        $produit = $stmt -> fetch (PDO::FETCH_ASSOC);
        $action = "Modifier";
    }

?>

<body>

<div class="formulaire">
    <form action="update.php" method="POST">
        <legend><?php echo $action ?> le produit</legend>
        <div>
            <label for="id">id produit</label>
            <input type="text" name="id" value="<?php echo $produit["id"];?>" readonly>
        </div>
        <div>
            <label for="id_famille">id Famille</label>
            <input type="text" name="id_famille" value="<?php echo $produit["id_famille"];?>">
        </div>
        <div>
            <label for="designation">Désignation</label>
            <input type="text" name="designation" value="<?php echo $produit["designation"];?>">
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="text" name="prix" value="<?php echo $produit["prix"];?>">
        </div>
        <div>
            <label for="vignette">Vignette</label>
            <input type="text" name="vignette" value="<?php echo $produit["vignette"];?>">
        </div>
        <div>
            <input class="btn" type="submit" value="<?php echo $action ?>">
            <a href="modif.php?id=ajout">
                <input class="btn bleu" id="ajout" type="button" value="Nouveau produit">
            </a>
        </div>
    </form>
</div>
    
</body>

