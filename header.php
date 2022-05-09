

<?php session_start (); ?>
    
<header>

    <a href="http://localhost/afpa_dwwm/back_end_01/php_sql/tp_crud/index1.php"><h1>CRUD</h1></a>

    <menu>
        <ul>
            <li><a href="pages/produits1.php">produit</a></li>
             <li><a href="pages/produits2.php">produit</a></li>
            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == 1) {
             echo "<li><a href=\"pages/edition.php\">modifier</a></li>";
                } ?>
        </ul>
    </menu>

    <div id="connection">
    <?php  
        if (isset ($_SESSION["role"])) {  ?> 

        <div><?php echo $_SESSION ["prenom"] ?></div>
        <div class ="btn" id="signout"><a href="fonctions/signout.php">Me déconnecter</a></div><?php

        }  else { ?>

        <div class ="btn" id="signin"><a href="pages/signin.php">Me connecter</a></div><?php   

        }  ?>

    </div> 

</header> 
            
        
    
    
