<!-- Script PHP permettant la création du tableau regroupant les données concernant les bateaux -->
<table class="table table-striped">
	<caption> <h2>Les données des bateaux </h2></caption>
	<thead>
	<!-- Titre des colonnes du tableau-->
		<tr>
			<th>Nom</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Freq</th>
			<th>EmissionGPS</th>
			<th>Batterie</th>
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
	   $bdd = new PDO('mysql:host=****;dbname=****;charset=utf8', '****', '****');
	}
	catch(Exception $e)
	{
	   // En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
	}
	
	//Ici, récupération des dernières données de Appareil et HistBateau dans la base de donnée
	$response2 = $bdd->query("SELECT h1.* , h2.*, a.type, a.nom, a.freq,a.id AS id , a.batterie AS batterie, a.emissionGPS AS GPS
                           	  FROM  Appareil a, HistBateau h1
                              INNER JOIN (
                              	SELECT h.idEtranger, MAX(h.dateheure) AS MaxDateTime
                              	FROM HistBateau h
                              	GROUP BY h.idEtranger ) h2
                              ON h1.idEtranger = h2.idEtranger
                              AND h1.dateheure = h2.MaxDateTime
                              WHERE a.id=h1.idEtranger AND a.type = \"bateau\"
                            ");

	while ($donnees2 = $response2->fetch())
	{
?>
	<!-- Remplissage du tableau, autant de ligne que de bateau-->
	<tr>
		<?php $id =$donnees2['id']?> 
		<!-- Affichage du nom du bateau-->
		<th> <?php echo $nom = $donnees2['nom']?> </th>
		<!-- Affichage de la latitude du bateau-->
		<th> <?php echo $lati = $donnees2['lati']?> </th>
		<!-- Affichage de la longitude du bateau-->
		<th> <?php echo $longi = $donnees2['longi']?> </th>
		<!-- Affichage de la fréquence d'émission -->
		<th> <?php echo $donnees2['freq']?> </th>
		<!-- Affichage de l'émission ou non du GPS du bateau avec possibilité de changement grâce un FORM méthode POST-->
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
		<!-- Affichage de la batterie du bateau-->
		<th> <?php echo $donnees2['batterie']?> </th>
		<!-- Affichage de la dernière mise à jour des données-->
		<th> <?php echo $donnees2['dateheure']?> </th>
		<!-- Affichage d'un bouton permettant de centrer la carte sur le bateau courant'-->
		<th> 
			<input type="button" id="<?php echo $nom  ?>" value="<?php echo $nom ?>"   /> 
			<!-- Le script JS suivant est lié au boutton ci-dessus et permet le Zoom sur le bateau courant-->
	               <script>
	                  var element = document.getElementById("<?php echo $nom; ?>");

	                              element.addEventListener('click',
	                              function()
	                              {
	                                 var lati= '<?php echo $lati; ?>' ;
	                                 var longi= '<?php echo $longi; ?>' ; 
	                                 map.setCenter(new OpenLayers.LonLat(longi, lati).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 18);
	                              	 
	                              },false);
	               </script> 
		 </th>
	</tr>
<?php

	}

?>
</tbody>
</table>