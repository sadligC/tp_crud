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
    $sql = "DELETE FROM produit WHERE `produit`.`id` = $id_produit";
    $stmt =connection () -> prepare ($sql);
    $stmt -> execute ();

?>

<body>
    <div class="err">
        <span>Produit supprimé</span>
    </div>
</body>

