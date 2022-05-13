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

require_once ("connection.php");
    
if (!empty($_POST["email"]) && !empty($_POST["password"]) ){
    $email = $_POST ["email"];
    $password = password_hash ($_POST ["password"], PASSWORD_DEFAULT);
    $nom = $_POST ["nom"];
    $prenom = $_POST ["prenom"];
    $id_bureau = substr ($_POST ["bureau"], -1);

    
    $sql = "INSERT INTO utilisateur (email, password, nom, prenom, id_bureau, id_role) VALUES ('$email', '$password', '$nom', '$prenom', $id_bureau, 2);";
    
    connection () -> exec ($sql);

    header('Location:../index1.php');
} else {
    echo "<div class=\"err\">Veuillez saisir un email et un mdp</div>";
}
    

?>
</body>
</html>