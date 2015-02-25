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
//$reponse = $bdd->query('SELECT * FROM Coordonnees3');

// Pour récupérer la derniere date en cours
$reponse = $bdd->query('SELECT * FROM Coordonnees3 ORDER BY date DESC limit 1');
while ($donnees = $reponse->fetch())
{

      $nom = $donnees['nom'];
      $lon = $donnees['lon']; 
      $lat = $donnees['lat'];
      echo $lon."\t".$lat."\t".$nom."\tElle est la\timage/bouee.jpeg\n"; 
      

}

//$reponse->closeCursor(); 

//Test
$response1 = $bdd->query('SELECT * FROM Device1');
while ($donnees = $response1->fetch())
{
	$id = $donnees['id'];
	echo $id;
	echo "coucou";
}

?>