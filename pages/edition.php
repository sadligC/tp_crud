<?php
require_once ("head.php");
require_once ("../header.php");
require_once ("../fonctions/connection.php");
require_once ("../fonctions/debug.php");

$sql = "SELECT * FROM produit ;";
$stmt = connection () -> prepare ($sql);
$stmt -> execute ();
$produits = $stmt -> fetchall (PDO::FETCH_ASSOC);

$sql = "SELECT * FROM famille ;";
$stmt = connection () -> prepare ($sql);
$stmt -> execute ();
$famille = $stmt -> fetchall (PDO::FETCH_ASSOC);

?>

<body>
<table>
    <tr>
        <td>id</td>
        <td>famille</td>
        <td>designation</td>
        <td>prix</td>
        <td>vignette</td>
    </tr>
    <?php
    foreach ($produits as $key => $val){ ?>
    <tr>
        <td><?php echo $val["id"] ?></td>;
        <td><?php 
            foreach ($famille as $k => $v){
                if ($val["id_famille"] == $v ["id"]) {
                    echo $v["famille"];
                }
            }   ?>
        </td>
        <td><?php echo $val["designation"] ?></td>;
        <td><?php echo $val["prix"] ?></td>;
        <td><?php echo $val["vignette"] ?></td>;
        <td><a href="modif.php?id=<?php echo $val["id"] ?>"><input type="button" class="btn" value="Modifier"></a></td>
        <td><a href="suppr.php?id=<?php echo $val["id"] ?>"><input type="button" class="btn" value="Supprimer"></a></td>
    </tr><?php
    }
    ?>
    
</table>
</body>

</html>