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

    $connection = new PDO ("mysql:host=localhost;dbname=tp_crud","root","");
    $sql = "SELECT id FROM bureau ;";
    $stmt = $connection -> prepare ($sql);
    $stmt -> execute ();
    $bureaux = $stmt -> fetchall (PDO::FETCH_ASSOC);
?>

<div>
    <form action="../fonctions/nouveau-utilisateur.php" method="POST">
        <fieldset>
            <legend>nouvel utilisateur</legend>
            <label for="email">Votre identifiant (email)</label><input type="email" name="email">
            <label for="password">Votre mdp</label><input type="password" name="password">
            <label for="nom">Votre nom</label><input type="text" name="nom">
            <label for="prenom">Votre prénom</label><input type="text" name="prenom">
            <label for="bureau">Votre bureau</label><select name="bureau"><?php
                foreach ($bureaux as $key => $value) { ?>
                    <option value="<?php echo $value ["id"] ?>">Bureau n° <?php echo $value ["id"] ?></option><?php
                }
                ?></select>
        </fieldset>
        <input type="submit" value="OK">
    </form>
</div>
    
</body>
</html>