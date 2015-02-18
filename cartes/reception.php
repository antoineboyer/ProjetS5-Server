<?php
		
		$nom = $_POST["nom"];
		$type = $_POST["type"];
		$lat =  $_POST["latitude"];
		$lon = $_POST["longitude"];
		$db = mysqli_connect('localhost','root','root','testcarte') or die ("Error" . mysqli_error($db));
		$sql = "INSERT INTO Coordonnees3 (nom,type,lat,lon) VALUES ('$nom','$type','$lat','$lon')";
		mysqli_query($db, $sql);

?>