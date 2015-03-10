<?php

	$data0=$_POST["type"];
	$data1=$_POST["nom"];
	$data2=$_POST["latitude"];
	$data3=$_POST["longitude"];
	$data4=$_POST["heure"];
	$data5=$_POST["batterie"];
	$data6=$_POST["precision"];
	$data7=$_POST["id"];

	$db = mysqli_connect('db565998775.db.1and1.com','dbo565998775','orionbrest','db565998775') or die ("Erreur : " . mysqli_error($db));
	$sql1 = "SELECT * FROM Appareil";
	$req1 = mysqli_query($db,$sql1);
	$jeton = False;
	while($row = mysqli_fetch_assoc($req1)) {
		if($data7 === $row['id']){
			$jeton = True;
		}
		echo $row['freq'] . ";" . $row['emissionGPS'] . ";" . $row['emissionSonore'] . ";";
	}

	if($jeton === False){
		$sql2 = "INSERT INTO Appareil(id,nom,type,freq,batterie,emissionSonore,emissionGPS) VALUES ('$data7', '$data1', '$data0', \"1000\", '$data5', '0', '1')";
		$req2 = mysqli_query($db,$sql2);
	} else {
		$sql2 = "UPDATE Appareil SET nom = '$data1' , batterie = '$data5' , type = 'data0' WHERE id = '$data7' ";
		$req2 = mysqli_query($db,$sql2);
	}

	if($data0 === "Bateau") {
			$sql3 = "INSERT INTO HistBateau(idEtranger,lati,longi,precisi,dateheure) VALUES ('$data7', '$data2' , '$data3' , '$data6' , '$data4')";
			$req3 = mysqli_query($db,$sql3);
		} else {
			$sql3 = "INSERT INTO HistBouee(idEtranger,lati,longi,precisi,dateheure) VALUES ('$data7', '$data2' , '$data3' , '$data6' , '$data4')";
			$req3 = mysqli_query($db,$sql3);
		}

?>