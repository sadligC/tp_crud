<?php
require_once("head.php");
?>

<body>

<div class="connection">
    <form  action="verif-sigin.php" method="POST">
    
        <legend>MON COMPTE</legend>
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