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

// Donnée bateau - GROUP BY veut dire qu'il ne va retourner qu'une ligne par nom ici
$reponse2 = $bdd->query('SELECT h1.longi AS longi, h1.lati AS lati, a.nom AS nom
                         FROM  Appareil a, HistBateau h1
                         INNER JOIN (
                          SELECT h.idEtranger, MAX(h.dateheure) AS MaxDateTime
                          FROM HistBateau h
                          GROUP BY h.idEtranger ) h2
                         ON h1.idEtranger = h2.idEtranger
                         AND h1.dateheure = h2.MaxDateTime
                         WHERE a.id=h1.idEtranger
                         ');

  while ($donnees2 = $reponse2->fetch())
  {
      $nom = $donnees2['nom'];
      $lon = $donnees2['longi']; 
      $lat = $donnees2['lati'];
      echo $lon."\t".$lat."\t".$nom."\tElle est la\t../images/dessinBateau.jpg\n"; 
  }
$reponse2->closeCursor();

// Donnée bouée
$reponse3 = $bdd->query('SELECT h1.longi AS longi, h1.lati AS lati, a.nom AS nom
                         FROM  Appareil a, HistBouee h1
                         INNER JOIN (
                          SELECT h.idEtranger, MAX(h.dateheure) AS MaxDateTime
                          FROM HistBouee h
                          GROUP BY h.idEtranger ) h2
                         ON h1.idEtranger = h2.idEtranger
                         AND h1.dateheure = h2.MaxDateTime
                         WHERE a.id=h1.idEtranger');
  while ($donnees3 = $reponse3->fetch())
  {
      $nom = $donnees3['nom'];
      $lon = $donnees3['longi']; 
      $lat = $donnees3['lati'];
      echo $lon."\t".$lat."\t".$nom."\tElle est la\t../images/bouee.jpeg\n"; 
  }



?>