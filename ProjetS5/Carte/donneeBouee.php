<?php	
// renvoi la distance en mètres entre 2 appareils
function get_distance_m($lat1, $lng1, $lat2, $lng2) {
  $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
  $rlo1 = deg2rad($lng1);
  $rla1 = deg2rad($lat1);
  $rlo2 = deg2rad($lng2);
  $rla2 = deg2rad($lat2);
  $dlo = ($rlo2 - $rlo1) / 2;
  $dla = ($rla2 - $rla1) / 2;
  $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
  $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
  return ($earth_radius * $d);
}
?>

<!-- Script PHP permettant la création du tableau regroupant les données concernant les bouées -->
<table class="table">
	<caption>Les données des bouées</caption>
	<thead>
	<!-- Titre des colonnes du tableau-->
		<tr>
			<th>Nom</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Freq</th>
			<th>Modifier Freq</th>
			<th>EmissionGPS</th>
			<th>Batterie</th>
			<th>Son</th>
			<th>Date / Heure</th>
			<th>Centrer sur</th>
		</tr>
	</thead>
	<!-- Interieur du tableau-->
	<tbody>
<?php
	
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
	//Array de coordonées des bateaux
	$Tcoordonnees = array();
	//Ici récupération des coordonnées GPS des différents bateaux
	$response = $bdd->query('SELECT bh1.* , bh2.*
                           	 FROM  HistBateau bh1
                             INNER JOIN (
                              	SELECT bh.idEtranger, MAX(bh.dateheure) AS MaxDateTime
                              	FROM HistBateau bh
                              	GROUP BY bh.idEtranger ) bh2
                             ON bh1.idEtranger = bh2.idEtranger
                             AND bh1.dateheure = bh2.MaxDateTime
                            
                            ');
	//Remplissage du tableau Tcoordonees avec les différentes coordonnées des bateaux
	while ($donnees = $response->fetch())
	{
		$lati= $donnees['lati'];
		$longi = $donnees['longi'];
		$tableau = array();
		array_push($tableau,$lati);
		array_push($tableau,$longi);
		array_push($Tcoordonnees,$tableau);
	}
	print_r($Tcoordonnees);
	

	//Ici, récupération des dernières données de Appareil et HistBouee dans la base de donnée
	$response2 = $bdd->query('SELECT h1.* , h2.*, a.nom, a.freq,a.id AS id , a.batterie AS batterie, a.emissionSonore AS son, a.emissionGPS AS GPS
                           	  FROM  Appareil a, HistBouee h1
                              INNER JOIN (
                              	SELECT h.idEtranger, MAX(h.dateheure) AS MaxDateTime
                              	FROM HistBouee h
                              	GROUP BY h.idEtranger ) h2
                              ON h1.idEtranger = h2.idEtranger
                              AND h1.dateheure = h2.MaxDateTime
                              WHERE a.id=h1.idEtranger'
		);
	while ($donnees2 = $response2->fetch())
	{
		
?>
		<!-- Remplissage du tableau, autant de ligne que de bouée-->
	<tr>
		<?php $id = $donnees2['id']?>
		<!-- Affichage du nom de la bouée--> 
		<th> <?php echo $nom = $donnees2['nom']?> </th>
		<!-- Affichage de la latitude de la bouée-->
		<th> <?php echo $lati = $donnees2['lati']?> </th>
		<!-- Affichage de la longitude de la bouée-->
		<th> <?php echo $longi = $donnees2['longi']?> </th>
		<!-- Affichage de la fréquence d'émission avec possibilité de changement grâce un FORM méthode POST-->
		<th> <?php echo $donnees2['freq']?> </th>
		<th> 
			<form method="post" action="update.php">
	   		<p>
	       	<input type="hidden" id="id" name="identifiant" value="<?php echo $id ?>">
	       	<input type="number" id="frequence" name="freq"   />
	   		</br>
	       	<input type="submit" value="modifier"/>
	   		</p>
			</form>
		</th>
		<!-- Affichage de l'émission ou non du GPS de la bouée avec possibilité de changement grâce un FORM méthode POST-->
		<th> 
			<?php echo $GPS = $donnees2['GPS']?>
			</br>
			<form method="post" action="update.php">
	   		<p>
	   		<input type="hidden" id="id" name="identifiant" value="<?php echo $id ?>">
	   		<input type="hidden" id="GPS" name="emission" value="<?php echo $GPS ?>">
	       	<input type="submit" value="On(1)/Off(0)"/>
	   		</p>
			</form>
		</th>
		<!-- Affichage de la batterie de la bouée-->
		<th> <?php echo $donnees2['batterie']?> </th>
		<!-- Affichage de l'émission sonore ou non de la bouée-->
		<th>  
			<?php
               include('distanceBoueeBateau.php');
            ?>
		</th>
		<!-- Affichage de la dernière mise à jour des données-->
		<th> <?php echo $donnees2['dateheure']?> </th>
		<!-- Affichage d'un bouton permettant de centrer la carte sur la bouée courante'-->
		<th> 
		<input type="button" id="<?php echo $nom  ?>" value="<?php echo $nom ?>"   > 
               <script>
                  var element = document.getElementById("<?php echo $nom; ?>");

                              element.addEventListener('click',
                                                      function()
                                                      {
                                                         //var map = init();
                                                         //affichageMap(-4.56854, ++longitude, map);
                                                         //init(-4.56854, 30.35825)
                                                         //var map = document.getElementById("map");
                                                         var lati= '<?php echo $lati; ?>' ;
                                                         var longi= '<?php echo $longi; ?>' ; 
                                                         map.setCenter(new OpenLayers.LonLat(longi, lati).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 16);
                                                      
                                                      },false);
               </script> 
		 </th>
	</tr>
<?php

	}

?>
</tbody>
</table>