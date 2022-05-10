<?php

function connection () {
   return  new PDO ("mysql:host=localhost;dbname=tp_crud","root","");
}

function requete ($req){
   $stmt = connection () -> prepare ($req);
   $stmt -> execute ();
   return $resultat = $stmt -> fetchall (PDO::FETCH_ASSOC);
}

?>