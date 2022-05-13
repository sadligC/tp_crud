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
require_once ("../fonctions/debug.php");
require_once ("../fonctions/connection.php");
// si les champs du formulaire ne sont pas vides
if (!empty ($_POST ["email"]) && !empty ($_POST ["password"])) {
    
    // récupère les valeurs saisies par l'utilisateur
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    
    // lance une requete SQL pour email=email dans la base utilisateur
    $sql = "SELECT id, password, prenom, id_role FROM `utilisateur` WHERE email = '$email';";
    $stmt = connection () -> prepare ($sql);
    $stmt -> execute();
    $id_connection = $stmt -> fetch (PDO::FETCH_ASSOC) ;
 
    
    // si la requete a aboutit
    if ($id_connection) {
        $verify = password_verify ($password, $id_connection ["password"]);
        var_dump ($verify);
        var_dump ($id_connection ["password"]);
        var_dump ($password);
        if ($id_connection ["password"] === $password || $verify){ // compare le mot de passe saisi et le mdp de la base
            
            session_start ();
            $_SESSION ["role"] = $id_connection["id_role"]; //si ça marche, enregistre les infos dans une session
            $_SESSION ["prenom"] = $id_connection["prenom"];
            $_SESSION ["utilisateur_id"] = $id_connection["id"];
            header ('Location: ../index1.php');
            
        } else {
            echo "<div class=\"err\">mdp non reconnu</div>";
        }
    } else {
        echo "<div class=\"err\">email non reconnu</div>";
    }

} else {
    echo "<div class=\"err\">Veuillez renseigner votre email et mdp</div>";
}

?>

</body>
</html>