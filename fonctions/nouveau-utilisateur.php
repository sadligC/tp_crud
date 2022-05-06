<?php

    $email = $_POST ["email"];
    $password = $_POST ["password"];
    $nom = $_POST ["nom"];
    $prenom = $_POST ["prenom"];
    $id_bureau = substr ($_POST ["bureau"], -1);

    $connection = new PDO ("mysql:host=localhost;dbname=tp_crud","root","");
    $sql = "INSERT INTO utilisateur (email, password, nom, prenom, id_bureau, id_role) VALUES ('$email', $password, '$nom', '$prenom', $id_bureau, 2);";
    
    $connection -> exec ($sql);

    header('Location:../index1.php');

?>
