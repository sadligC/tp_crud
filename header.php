<?php 
session_start ();
require_once ("fonctions/connection.php");
$sql = "SELECT famille FROM famille";
$familles = requete ($sql);
?>
    
<header>

    <a href="http://localhost/afpa_dwwm/back_end_01/php_sql/tp_crud/index1.php"><h1>CRUD</h1></a>

    <menu>
        <ul>
            <!-- création d'un menu avec les différentes familles de produits -->
            <?php 
            foreach ($familles as  $val) { ?>
                <li><a href="http://localhost/afpa_dwwm/back_end_01/php_sql/tp_crud/index1.php?fam=<?php echo $val ["famille"] ?>"><?php echo $val ["famille"] ?></a></li>
                <?php
            } 
            // création d'un lien accessible uniquement aux admin pour la modification des produits
            if (isset($_SESSION["role"]) && $_SESSION["role"] == 1) { ?>
                <li><a href="http://localhost/afpa_dwwm/back_end_01/php_sql/tp_crud/pages/edition.php">modifier</a></li><?php
            } ?>

        </ul>
    </menu>

    <div id="connection">
        <!-- création dun bouton login/logout -->
    <?php  
        // si la session est ouverte
        if (isset ($_SESSION["role"])) {  ?> 
        <!-- affichage du prénom de l'utlisateur et le boutton logout -->
        <div><?php echo $_SESSION ["prenom"] ?></div>
        <a href="http://localhost/afpa_dwwm/back_end_01/php_sql/tp_crud/fonctions/signout.php"><input type="button" class="btn bleu" value="Me déconnecter"></a><?php
        // sinon, affichage du boutton login
        }  else { ?>
        <a href="pages/signin.php"><input type="button" class="btn" value="Me connecter"></a><?php   
        }  ?>

    </div> 

</header> 