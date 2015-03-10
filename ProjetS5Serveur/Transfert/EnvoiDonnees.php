<?php

	$data0=$_POST["id"];
	
	$db = mysqli_connect('db565998775.db.1and1.com', 'dbo565998775', 'orionbrest', 'db565998775') or die ("Error " . mysqli_error($db));
	$sql = "SELECT *  FROM Appareil WHERE id = '$data0' ";
	$req = mysqli_query($db,$sql);

	while($row = mysqli_fetch_assoc($req))
  		echo $row['freq'] . ";" . $row['emissionGPS'] . ";" . $row['emissionSonore'] . ";";
  
?>