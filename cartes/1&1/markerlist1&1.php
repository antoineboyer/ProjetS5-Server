<?php
header('Content-type: text/plain');

echo "lon\tlat\ttitle\tdescription\ticon\n";


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
$reponse = $bdd->query('SELECT * FROM Coordonnees3');

while ($donnees = $reponse->fetch())
{
      $nom = $donnees['nom'];
      $lon = $donnees['lon']; 
      $lat = $donnees['lat'];
      echo $lon."\t".$lat."\t".$nom."\tElle est la\tTestProjetS5\bouee.jpeg\n"; 
      

}

$reponse->closeCursor(); 

?>