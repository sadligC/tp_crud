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
    
    if ($_POST ["id"] === "new_id"){
        $sql = "INSERT INTO produit (id, id_famille, designation, prix, vignette) VALUES (NULL, :id_famille, :designation, :prix, :vignette);";  
        $span = "Nouveau produit ajouté";
    } else {
        $id = $_POST ["id"];
        $sql = "UPDATE produit SET id_famille = :id_famille, designation = :designation, prix = :prix, vignette = :vignette WHERE produit.id = $id";
        $span = "Produit modifié";
    }
    
    $stmt =connection () -> prepare ($sql);
    $stmt -> bindParam (':id_famille', $_POST["id_famille"], PDO::PARAM_INT);
    $stmt -> bindParam (':designation', $_POST["designation"], PDO::PARAM_STR);
    $stmt -> bindParam (':prix', $_POST["prix"], PDO::PARAM_INT);
    $stmt -> bindParam (':vignette', $_POST["vignette"], PDO::PARAM_STR);
    $stmt -> execute ();

?>

<body>
    <div class="err">
        <span><?php echo $span ?></span>
    </div>
</body>

