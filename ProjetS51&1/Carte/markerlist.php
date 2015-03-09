<?php
//Flux de donnée représentant les appareils à afficher sur la carte (formalisme particulié à respecter) 
header('Content-type: text/plain');
//Titre des colonnes du tableau à remplir
echo "lon\tlat\ttitle\tdescription\ticon\ticonSize\ticonOffset\n";


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

// Selection des dernières positions de chacun des beteau
$reponse2 = $bdd->query('SELECT h1.longi AS longi, h1.lati AS lati, a.nom AS nom, a.type AS type
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
      $type = $donnees2['type'];
      //Ecriture des dernières posistions pour chaque bateau
      echo $lon."\t".$lat."\t".$nom."\t".$type."\t../images/boat.png\t30,30\t0,0\n"; 
  }
$reponse2->closeCursor();

// Selection des dernières positions de chacun des beteau
$reponse3 = $bdd->query('SELECT h1.longi AS longi, h1.lati AS lati, a.nom AS nom, a.type AS type
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
      $type = $donnees3['type'];
      //Ecriture des dernières posistions pour chaque bouée
      echo $lon."\t".$lat."\t".$nom."\t".$type."\t../images/buoy.png\t40,40\t0,0\n"; 
  }



?>