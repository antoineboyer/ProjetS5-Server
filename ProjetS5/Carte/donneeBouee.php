
<!-- Script PHP permettant la création du tableau regroupant les données concernant les bouées -->
<table class="table">
	<caption>Les données des bouées</caption>
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Freq</th>
			<th>Modifier Freq</th>
			<th>Batterie</th>
			<th>Son</th>
			<th>Date / Heure</th>
			<th>Centrer sur</th>
		</tr>
	</thead>
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
	
	//Ici, récupération des données en commun de DataBoat et de Device
	$response2 = $bdd->query('SELECT h1.* , h2.*, a.nom, a.freq,a.id AS id , a.batterie AS batterie, a.emissionSonore AS son
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
		//$id2 = $donnees2['id'];
		//echo $id2 . " ";
		//$lati = $donnees2['lati'];
		//echo $lati . " ";
		//$test =print_r ($donnees2);
?>
	
	<tr>
		<th> <?php echo $id = $donnees2['id']?> </th>
		<th> <?php echo $nom = $donnees2['nom']?> </th>
		<th> <?php echo $lati = $donnees2['lati']?> </th>
		<th> <?php echo $longi = $donnees2['longi']?> </th>
		<th> <?php echo $donnees2['freq']?> </th>
		<th> 
			<form method="post" action="modifierFreq.php">
	   		<p>
	       	<input type="hidden" id="id" name="identifiant" value="<?php echo $id ?>">
	       	<input type="number" id="frequence" name="freq"   />
	   		</br>
	       	<input type="submit" value="modifier"/>
	   		</p>
			</form>
		</th>
		<th> <?php echo $donnees2['batterie']?> </th>
		<th> <?php echo $donnees2['son']?> </th>
		<th> <?php echo $donnees2['dateheure']?> </th>
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
                                                         map.setCenter(new OpenLayers.LonLat(longi, lati).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 7);
                                                      
                                                      },false);
               </script> 
		 </th>
	</tr>
<?php

	}

?>
</tbody>
</table>