
<!-- Script PHP permettant la création du tableau regroupant les données concernant les bateaux -->
<table class="table">
	<caption>Les données des bateaux</caption>
	<thead>
		<tr>
			<th> Id </th>
			<th> Nom </th>
			<th> latitude </th>
			<th> longitude </th>
			<th> freq </th>
			<th> batterie </th>
			<th> Derniere Modif </th>
			<th> Bouton Zoom </th>
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
	//Ici, récupération des différentes colonnes de la table Device, (c'est un test)
	$response1 = $bdd->query('SELECT * FROM Device');
	while ($donnees1 = $response1->fetch())
	{
		$id1 = $donnees1['id'];
	}
	
	//Ici, récupération des données en commun de DataBoat et de Device
	$response2 = $bdd->query('SELECT * 
							  FROM DataBoat
							  INNER JOIN Device WHERE DataBoat.idEtranger = Device.id');
	while ($donnees2 = $response2->fetch())
	{
		//$id2 = $donnees2['id'];
		//echo $id2 . " ";
		//$lati = $donnees2['lati'];
		//echo $lati . " ";
		//$test =print_r ($donnees2);
?>
	
	<tr>
		<th> <?php echo $donnees2['id']?> </th>
		<th> <?php echo $nom = $donnees2['nom']?> </th>
		<th> <?php echo $lati = $donnees2['lati']?> </th>
		<th> <?php echo $longi = $donnees2['longi']?> </th>
		<th> <?php echo $donnees2['freq']?> </th>
		<th> <?php echo $donnees2['batterie']?> </th>
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
                                                         map.setCenter(new OpenLayers.LonLat(lati, longi).transform(new OpenLayers.Projection("EPSG:4326"),map.getProjectionObject()), 7);
                                                      
                                                      },false);
               </script> 
		 </th>
	</tr>
<?php

	}

?>
</tbody>
</table>