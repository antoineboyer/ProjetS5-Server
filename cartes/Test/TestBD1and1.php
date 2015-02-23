<?php

echo "Voici le premier test BD 1&1\n";
echo "lala";

try
{
   // On se connecte à MySQL
   $bdd = new PDO('mysql:host=db565998775.db.1and1.com;dbname=db565998775;charset=utf8', 'dbo565998775', 'orionbrest');
}
catch(Exception $e)
{
   // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM Test');

while ($donnees = $reponse->fetch())
{
      
      echo $donnees['colonne']; 
      

}

$reponse->closeCursor(); 

?>