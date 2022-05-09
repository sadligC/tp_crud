<?php
    require_once("head.php");
    require_once ("../fonctions/connection.php");
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

