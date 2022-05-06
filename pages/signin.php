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

<div class="connection">
    <form  action="../fonctions/verif-sigin.php" method="POST">
    
        <legend>MON ESPACE</legend>
        <div>
            <label for="email">email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">mdp</label>
            <input type="password" name="password">
        </div>
        <div>
            <input class="btn" type="submit" value="Se connecter">
            <a href="signup.php">
                <input class="btn" id="signup" type="button" value="Créer un compte">   
            </a>
        </div>
        
    </form>
</div>    
    
</body>
</html>