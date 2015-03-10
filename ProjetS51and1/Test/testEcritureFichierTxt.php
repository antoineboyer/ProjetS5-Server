<?php

$markerlist2 = fopen('markerlist3.txt','r+');
ftruncate($markerlist3,0);
fputs($markerlist3,"lon\tlat\ttitle\tdescription\ticon\n");

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
$reponse = $bdd->query('SELECT * FROM Coordonnees');

while ($donnees = $reponse->fetch())
{
	  echo $donnees['lon'];
      $lon = $donnees['lon']; 
      $lat = $donnees['lat']; 
      echo $lon;
      fputs($markerlist3, $lon."\t".$lat."\tBoue\tElle est la\tmarker_red.png\n");

}

$reponse->closeCursor(); // Termine le traitement de la requête

fclose($markerlist3);



?>