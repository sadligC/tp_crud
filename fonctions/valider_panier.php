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

try {
    session_start ();
    require_once ("connection.php");
    $connect = connection ();
    $connect -> beginTransaction ();
    $id_utilisateur = $_SESSION ["utilisateur_id"];
    
    $sql = "INSERT INTO `commande` (`id`, `id_utilisateur`, `commande_date`) VALUES (NULL, $id_utilisateur, current_timestamp())";
    $stmt = $connect -> prepare ($sql);
    $stmt -> execute ();
    $commande_id = $connect -> lastInsertId();

    foreach ($_SESSION ["panier"] as $val){
        $sql = "INSERT INTO contient (id_commande, id_produit) VALUES (?,?);";
        $stmt = $connect -> prepare ($sql);
        $stmt -> execute (array($commande_id, $val));
    }

    $connect -> commit ();
} 
catch (PDOException $e) {
    echo "database error: ". $e -> getMessage ();
    $connect -> rollback();
}
?>

<body>
    <div class="err">
        <span>Panier validé</span>
    </div>
</body>

