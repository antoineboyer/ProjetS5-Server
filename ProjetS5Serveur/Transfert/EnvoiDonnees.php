<?php
	// Fichier permettant d'envoyer du serveur vers le client les données fréquences, emissionGPS et emissionSonore aux bateaux/bouées

	// Récupération de l'identifiant de l'appareil
	$data0=$_POST["id"];
	
	$db = mysqli_connect('****', '****', '****', '****') or die ("Error " . mysqli_error($db));
	// Récupération des données modifiées dans la table appareil
	$sql = "SELECT *  FROM Appareil WHERE id = '$data0' ";
	$req = mysqli_query($db,$sql);
	// Affichage des données du côté client pour pouvoir les récupérer
	while($row = mysqli_fetch_assoc($req))
		// on renvoie la fréquence d'emission, un "0"/"1" pour l'emission GPS et un "0"/"1" pour l'emission sonore séparés par des ";"
  		echo $row['freq'] . ";" . $row['emissionGPS'] . ";" . $row['emissionSonore'] . ";";
  
?>