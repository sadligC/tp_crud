<?php

require_once ("debug.php");
// si les champs du formulaire ne sont pas vides
if (!empty ($_POST ["email"]) && !empty ($_POST ["password"])) {
    
    // récupère les valeurs saisies par l'utilisateur
    $email = $_POST ["email"];
    $password = $_POST ["password"];
    
    // lance une requete SQL pour email=email dans la base utilisateur
    $connection = new PDO ("mysql:host=localhost;dbname=tp_crud","root","");
    $sql = "SELECT password, prenom, id_role FROM `utilisateur` WHERE email = '$email';";
    $stmt = $connection -> prepare ($sql);
    $stmt -> execute();
    $id_connection = $stmt -> fetch (PDO::FETCH_ASSOC) ;
 
    
    // si la requete a aboutit
    if ($id_connection) {
        
        if ($id_connection ["password"] === $password){ // compare le mot de passe saisi et le mdp de la base
            
            session_start ();
            $_SESSION ["role"] = $id_connection["id_role"]; //si ça marche, enregistre les infos dans une session
            $_SESSION ["prenom"] = $id_connection["prenom"];
            header ('Location: ../index1.php');
            
        } else {
            echo "mdp non reconnu";
        }
    } else {
        echo "email non reconnu";
    }

} else {
    echo "veuillez renseigner votre email et mdp";
}



?>