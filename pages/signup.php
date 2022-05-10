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

    $sql = "SELECT id FROM bureau ;";
    $bureaux = requete($sql);
?>

<body>
<div class="formulaire">
    <form action="../fonctions/nouveau-utilisateur.php" method="POST">
            
        <legend>CREER MON COMPTE</legend>
            <div>
                <label for="email">Votre identifiant (email)</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Votre mdp</label>
                <input type="password" name="password">
            </div>
            <div>
                <label for="nom">Votre nom</label>
                <input type="text" name="nom">
            </div>
            <div>
                <label for="prenom">Votre prénom</label>
                <input type="text" name="prenom">
            </div>
            <div>
                <label for="bureau">Votre bureau</label>
                <select name="bureau"><?php
                foreach ($bureaux as $key => $value) { ?>
                    <option value="<?php echo $value ["id"] ?>">Bureau n° <?php echo $value ["id"] ?></option><?php
                }
                ?></select>
            </div>
            
        <input class= "btn" type="submit" value="Créer">
    </form>
</div>
    
</body>
</html>