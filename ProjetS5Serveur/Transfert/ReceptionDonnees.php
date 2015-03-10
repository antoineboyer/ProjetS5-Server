<?php
	//Fichier permettant au serveur de recevoir les données issus des bateaux/bouées
	$data0=$_POST["type"];
	$data1=$_POST["nom"];
	$data2=$_POST["latitude"];
	$data3=$_POST["longitude"];
	$data4=$_POST["heure"];
	$data5=$_POST["batterie"];
	$data6=$_POST["precision"];
	$data7=$_POST["id"];

	$db = mysqli_connect('****','****','****','****') or die ("Erreur : " . mysqli_error($db));
	$sql1 = "SELECT * FROM Appareil";
	$req1 = mysqli_query($db,$sql1);
	//Le jeton représente la présence de l'appareil dans la BDD, à false il n'est pas dans la BDD, à true, il l'est
	$jeton = False;
	while($row = mysqli_fetch_assoc($req1)) {
		if($data7 === $row['id']){
			$jeton = True;
		}
		echo $row['freq'] . ";" . $row['emissionGPS'] . ";" . $row['emissionSonore'] . ";";
	}
	//Si le jeton est false, on insère le bateau ou la bouée dans la table appareil, sinon on l'update
	if($jeton === False){
		$sql2 = "INSERT INTO Appareil(id,nom,type,freq,batterie,emissionSonore,emissionGPS) VALUES ('$data7', '$data1', '$data0', \"1000\", '$data5', '0', '1')";
		$req2 = mysqli_query($db,$sql2);
	} else {
		$sql2 = "UPDATE Appareil SET nom = '$data1' , batterie = '$data5' , type = '$data0' WHERE id = '$data7' ";
		$req2 = mysqli_query($db,$sql2);
	}
	//Si l'appareil est un bateau, on insère ses coordonnées dans HistBateau, sinon dans HistBouée
	if($data0 === "Bateau") {
			$sql3 = "INSERT INTO HistBateau(idEtranger,lati,longi,precisi,dateheure) VALUES ('$data7', '$data2' , '$data3' , '$data6' , '$data4')";
			$req3 = mysqli_query($db,$sql3);
		} else {
			$sql3 = "INSERT INTO HistBouee(idEtranger,lati,longi,precisi,dateheure) VALUES ('$data7', '$data2' , '$data3' , '$data6' , '$data4')";
			$req3 = mysqli_query($db,$sql3);
		}

?>