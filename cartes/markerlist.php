<?php
header('Content-type: text/plain');

echo "lon\tlat\ttitle\tdescription\ticon\n";


try
{
   // On se connecte à MySQL
   $bdd = new PDO('mysql:host=localhost;dbname=testcarte;charset=utf8', 'root', 'root');
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
      echo $lon."\t".$lat."\t".$nom."\tElle est la\timage/bouee.jpeg\n"; 
      

}

$reponse->closeCursor(); 

?>